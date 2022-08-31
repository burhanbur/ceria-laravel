<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;

use App\Models\Child;
use App\Models\Kelas;

use File;
use Auth;
use Alert;
use Exception;
use Session;

class KelasController extends Controller
{
    public function ortuKelas()
    {
        $data = Kelas::where('status', 1)->get();

        if ($data) {
            $hasClass = true;
        } else {
            $hasClass = false;
        }

        return view('cpanel.kelas.ortu_index', get_defined_vars());
    }

    public function ortuShowKelas($id)
    {
        $data = Kelas::find($id);

        return view('cpanel.kelas.ortu_show', get_defined_vars())->renderSections()['content'];
    }

    public function ortuStoreSiswa(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor_induk_student' => ['required'],
            'nama_student' => ['required'],
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first());

            return redirect()->back();
        }

        DB::beginTransaction();

        try {
            $data = Kelas::find($id);

            $nimStudents = $request->nomor_induk_student;
            $namaStudents = $request->nama_student;

            $dataStudents = [];
            for ($i = 0; $i < count((array) $nimStudents); $i++) {
                $dataStudents[] = [
                    'nomor_induk' => $nimStudents[$i],
                    'nik_parent' => Auth::user()->nomor_induk,
                    'nama' => $namaStudents[$i],
                    'id_kelas' => $data->id,
                ];
            }

            Child::insert($dataStudents);

            DB::commit();
            Session::flash('success', 'Data siswa berhasil disimpan dalam kelas '.$data->kelas);
        } catch (Exception $ex) {
            DB::rollBack();
            Session::flash('error', $ex->getMessage());
        }

        return redirect()->back();
    }

    public function index(Request $request)
    {
    	$user = Auth::user();
    	$data = Kelas::where('nomor_pegawai', $user->nomor_induk)->get();

    	if ($request->ajax()) {
    		return Datatables::of($data)
		        ->addIndexColumn()
		        ->addColumn('status', function($data) {
                    if ($data->status) {
                        $stat = 'Aktif';
                    } else {
                        $stat = 'Tidak aktif';
                    }

                    return $stat;
                })
		        ->addColumn('periode_awal', function($data) {
                    return tanggal($data->periode_awal);
                })
		        ->addColumn('periode_akhir', function($data) {
                    return tanggal($data->periode_akhir);
                })
		        ->addColumn('action', function ($data){
		            return '
                    	<a href="#" value="'.e(route('cpanel.edit.kelas', $data->id)).'" class="btn btn-warning btn-sm modalEdit" title="Edit Kelas" data-toggle="modal" data-target="#modalEdit"><span class="fas fa-pencil-alt"></span></a>
                    	<form style="display: inline;" method="POST" action="'.e(route('cpanel.delete.kelas', $data->id)).'" onsubmit="return confirm('."'Are you sure want to delete this data?'".')"> <input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"> <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> </form>
		            ';
		        })
		        ->toJson();
    	}

        return view('cpanel.kelas.index', get_defined_vars());
    }

    public function create()
    {
    	return view('cpanel.kelas.create', get_defined_vars())->renderSections()['content'];
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'foto' => ['mimes:jpg,png', 'max:2048'],
            'kelas' => ['required'],
            'thn_akademik' => ['required'],
        ]);

        if ($validator->fails()) {
    		Session::flash('error', $validator->errors()->first());

	    	return redirect()->back();
        }

    	DB::beginTransaction();

    	try {
	    	if ($request->status == 'on') {
	    		$status = 1;
	    	} else {
	    		$status = 0;
	    	}

	    	$periode_awal = null;
	        $periode_akhir = null;

	        if ($request->periode) {
	            $periode = explode(' - ', $request->periode);
	            $periode_awal = date('Y-m-d', strtotime($periode[0]));
	            if (isset($periode[1])) {
	                $periode_akhir = date('Y-m-d', strtotime($periode[1]));
	            }
	        }

	    	$data = new Kelas;
	    	$data->kelas = $request->kelas;
	    	$data->thn_akademik = $request->thn_akademik;
	    	$data->status = $status;
	    	$data->nomor_pegawai = Auth::user()->nomor_induk;
	    	$data->deskripsi = $request->deskripsi;
	    	$data->periode_awal = $periode_awal;
	    	$data->periode_akhir = $periode_akhir;

	    	if ($request->file('foto')) {
                $folder = 'files/kelas/'.$request->kelas.'/';
                
                if (!File::isDirectory($folder)) {
                    File::makeDirectory($folder, 0777, TRUE);
                }
                
                $files = $request->file('foto');
                $file_foto = $files->getClientOriginalName();
                $files->move($folder, $file_foto);
                $data->foto = $file_foto;
            }
			
			$data->save();

            $nimStudents = $request->nomor_induk_student;
            $namaStudents = $request->nama_student;
            $parentStudents = $request->nik_parent;

            $dataStudents = [];
            for ($i = 0; $i < count((array) $nimStudents); $i++) {
                $dataStudents[] = [
                    'nomor_induk' => $nimStudents[$i],
                    'nik_parent' => $parentStudents[$i],
                    'nama' => $namaStudents[$i],
                    'id_kelas' => $data->id,
                ];
            }

            Child::insert($dataStudents);

    		DB::commit();
    		Session::flash('success', 'Data kelas berhasil disimpan');
    	} catch (Exception $ex) {
    		DB::rollBack();
    		Session::flash('error', $ex->getMessage());
    	}

    	return redirect()->back();
    }

    public function edit($id)
    {
        $data = Kelas::find($id);

        return view('cpanel.kelas.edit', get_defined_vars())->renderSections()['content'];
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto' => ['mimes:jpg,png', 'max:2048'],
            'kelas' => ['required'],
            'thn_akademik' => ['required'],
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first());

            return redirect()->back();
        }

        DB::beginTransaction();

        try {
            if ($request->status == 'on') {
                $status = 1;
            } else {
                $status = 0;
            }

            $periode_awal = null;
            $periode_akhir = null;

            if ($request->periode) {
                $periode = explode(' - ', $request->periode);
                $periode_awal = date('Y-m-d', strtotime($periode[0]));
                if (isset($periode[1])) {
                    $periode_akhir = date('Y-m-d', strtotime($periode[1]));
                }
            }

            $data = Kelas::find($id);
            $data->kelas = $request->kelas;
            $data->thn_akademik = $request->thn_akademik;
            $data->status = $status;
            $data->nomor_pegawai = Auth::user()->nomor_induk;
            $data->deskripsi = $request->deskripsi;
            $data->periode_awal = $periode_awal;
            $data->periode_akhir = $periode_akhir;

            if ($request->file('foto')) {
                $folder = 'files/kelas/'.$request->kelas.'/';
                
                if (!File::isDirectory($folder)) {
                    File::makeDirectory($folder, 0777, TRUE);
                }

                $files = $request->file('foto');
                $file_foto = $files->getClientOriginalName();
                $files->move($folder, $file_foto);
                $data->foto = $file_foto;
            }
            
            $data->save();

            $nimStudents = $request->nomor_induk_student;
            $namaStudents = $request->nama_student;
            $parentStudents = $request->nik_parent;

            $dataStudents = [];
            for ($i = 0; $i < count((array) $nimStudents); $i++) {
                $dataStudents[] = [
                    'nomor_induk' => $nimStudents[$i],
                    'nik_parent' => $parentStudents[$i],
                    'nama' => $namaStudents[$i],
                    'id_kelas' => $data->id,
                ];
            }

            Child::insert($dataStudents);

            DB::commit();
            Session::flash('success', 'Data kelas berhasil disimpan');
        } catch (Exception $ex) {
            DB::rollBack();
            Session::flash('error', $ex->getMessage());
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            Kelas::find($id)->delete();

            DB::commit();
            Session::flash('success', 'Data kelas berhasil dihapus');
        } catch (Exception $ex) {
            DB::rollBack();
            Session::flash('error', $ex->getMessage());
        }

        return redirect()->back();
    }

    public function deleteStudent($id_kelas, $nomor_induk)
    {
        DB::beginTransaction();

        try {
            Child::where(array('id_kelas' => $id_kelas, 'nomor_induk' => $nomor_induk))->delete();

            DB::commit();
            Session::flash('success', 'Data murid berhasil dihapus');
        } catch (Exception $ex) {
            DB::rollBack();
            Session::flash('error', $ex->getMessage());
        }

        return redirect()->back();
    }
}

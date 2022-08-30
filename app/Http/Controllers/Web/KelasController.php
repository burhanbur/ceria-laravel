<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;

use App\Models\Kelas;

use File;
use Auth;
use Alert;
use Exception;
use Session;

class KelasController extends Controller
{
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
                    	<a href="'.e(route('cpanel.show.kelas', $data->id)).'" class="btn btn-primary btn-sm" title="Detail Kelas"><span class="fas fa-search"></span></a>
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
            'status' => ['required'],
            'thn_akademik' => ['required'],
        ]);

        if ($validator->fails()) {
    		Session::flash('error', $validator->errors()->first());

	    	return redirect()->back();
        }

    	DB::beginTransaction();

    	try {
    		$folder = 'files/kelas/'.$request->kelas.'/';
            
            if (!File::isDirectory($folder)) {
                File::makeDirectory($folder, 0777, TRUE);
            }

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
                $files = $request->file('foto');
                $file_foto = $files->getClientOriginalName();
                $files->move($folder, $file_foto);
                $data->foto = $file_foto;
            }
			
			$data->save();

    		DB::commit();
    		Session::flash('success', 'Data kelas berhasil disimpan');
    	} catch (Exception $ex) {
    		DB::rollBack();
    		Session::flash('error', $ex->getMessage());
    	}

    	return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;

use App\Models\Assignment;
use App\Models\Child;
use App\Models\Kelas;
use App\Models\KelasAssignment;
use App\Models\Submission;

use File;
use Auth;
use Alert;
use Exception;
use Session;

class TugasController extends Controller
{
    public function ortuTugas(Request $request)
    {
        $user = Auth::user();
        $data = DB::select('
            select a.* from assignment as a 
            join class_assignment as ca on ca.id_assignment = a.id 
            join class as c on c.id = ca.id_class 
            join child as ch on ch.id_kelas = c.id 
            where a.isVisible = 1 and ch.nik_parent = ? and NOT EXISTS (select sub.id from submission as sub where nim_siswa = ch.nomor_induk and sub.id_kelas = c.id)
            ', array($user->nomor_induk));

        return view('cpanel.tugas.ortu_index', get_defined_vars());
    }

    public function ortuShowTugas($id)
    {
        $data = Assignment::find($id);

        return view('cpanel.tugas.ortu_show', get_defined_vars())->renderSections()['content'];
    }

    public function ortuStoreTugas(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'files' => ['required','mimes:pdf', 'max:2048'],
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first());

            return redirect()->back();
        }

        DB::beginTransaction();

        try {
            $child = Child::where('nik_parent', Auth::user()->nomor_induk)->first();

            $data = new Submission;
            $data->id_kelas = $child->id_kelas;
            $data->nim_siswa = $child->nomor_induk;
            $data->id_assignment = $id;

            if ($request->file('files')) {
                $folder = 'files/kelas/tugas/'.$child->nomor_induk;
                
                if (!File::isDirectory($folder)) {
                    File::makeDirectory($folder, 0777, TRUE);
                }
                
                $files = $request->file('files');
                $file_foto = $files->getClientOriginalName();
                $files->move($folder, $file_foto);
                $data->files = $file_foto;
            }
            
            $data->save();

            DB::commit();
            Session::flash('success', 'Data tugas berhasil disimpan');
        } catch (Exception $ex) {
            DB::rollBack();
            Session::flash('error', $ex->getMessage());
        }

        return redirect()->back();
    }

    public function index(Request $request)
    {
    	$user = Auth::user();
    	$data = Assignment::where('id_teacher', $user->id)->get();

    	return view('cpanel.tugas.index', get_defined_vars());
    }

    public function create()
    {
    	$user = Auth::user();
    	$kelas = Kelas::where('nomor_pegawai', $user->nomor_induk)->get();

    	return view('cpanel.tugas.create', get_defined_vars())->renderSections()['content'];
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'due_date' => ['required'],
        ]);

        if ($validator->fails()) {
    		Session::flash('error', $validator->errors()->first());

	    	return redirect()->back();
        }

    	DB::beginTransaction();

    	try {
	    	if ($request->isVisible == 'on') {
	    		$status = 1;
	    	} else {
	    		$status = 0;
	    	}

	    	$data = new Assignment;
	    	$data->title = $request->title;
	    	$data->description = $request->description;
	    	$data->isVisible = $status;
	    	$data->id_teacher = Auth::user()->id;
	    	$data->due_date = date('Y-m-d', strtotime($request->due_date));
	    	$data->date_created = date('Y-m-d');
	    	$data->date_update = date('Y-m-d');
	    	$data->user_update = Auth::user()->id;
			
			$data->save();

            $idClass = $request->id_class;

            $dataClass = [];
            for ($i = 0; $i < count((array) $idClass); $i++) {
                $dataClass[] = [
                    'id_class' => $idClass[$i],
                    'id_assignment' => $data->id,
                ];
            }

            KelasAssignment::insert($dataClass);

    		DB::commit();
    		Session::flash('success', 'Data tugas berhasil disimpan');
    	} catch (Exception $ex) {
    		DB::rollBack();
    		Session::flash('error', $ex->getMessage());
    	}

    	return redirect()->back();
    }

    public function edit($id)
    {
    	$user = Auth::user();
    	$data = Assignment::find($id);

    	$kelas = Kelas::where('nomor_pegawai', $user->nomor_induk)->get();

    	return view('cpanel.tugas.edit', get_defined_vars())->renderSections()['content'];
    }

    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'due_date' => ['required'],
        ]);

        if ($validator->fails()) {
    		Session::flash('error', $validator->errors()->first());

	    	return redirect()->back();
        }

    	DB::beginTransaction();

    	try {
	    	if ($request->isVisible == 'on') {
	    		$status = 1;
	    	} else {
	    		$status = 0;
	    	}

	    	$data = Assignment::find($id);
	    	$data->title = $request->title;
	    	$data->description = $request->description;
	    	$data->isVisible = $status;
	    	$data->id_teacher = Auth::user()->id;
	    	$data->due_date = date('Y-m-d', strtotime($request->due_date));
	    	$data->date_update = date('Y-m-d');
	    	$data->user_update = Auth::user()->id;
			
			$data->save();

            $idClass = $request->id_class;

            $dataClass = [];
            for ($i = 0; $i < count((array) $idClass); $i++) {
                $dataClass[] = [
                    'id_class' => $idClass[$i],
                    'id_assignment' => $data->id,
                ];
            }

            KelasAssignment::insert($dataClass);

    		DB::commit();
    		Session::flash('success', 'Data tugas berhasil disimpan');
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
	    	$data = Assignment::find($id);

            DB::commit();
            Session::flash('success', 'Data tugas berhasil dihapus');
        } catch (Exception $ex) {
            DB::rollBack();
            Session::flash('error', $ex->getMessage());
        }

    	return redirect()->back();
    }

    public function deleteKelas($id)
    {
        DB::beginTransaction();
        try {
        	KelasAssignment::find($id)->delete();

            DB::commit();
            Session::flash('success', 'Data tugas kelas berhasil dihapus');
        } catch (Exception $ex) {
            DB::rollBack();
            Session::flash('error', $ex->getMessage());
        }

        return redirect()->back();
    }
}
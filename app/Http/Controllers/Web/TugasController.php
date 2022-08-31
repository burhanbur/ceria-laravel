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
use App\Models\Kelas;
use App\Models\KelasAssignment;

use File;
use Auth;
use Alert;
use Exception;
use Session;

class TugasController extends Controller
{
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
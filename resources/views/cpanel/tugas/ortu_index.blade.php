@extends('layouts.app')

@section('css')
    <link href="{{ asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="modalEditTitle"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <div class="modalError"></div>
              <div id="modalEditContent"></div>
          </div>
      </div>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-primary" style="float: right;">
                    <i class="fab fa-slack"></i> Tugas
                </h3>
            </div>

            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%" class="center">No</th>
                            <th class="center">Judul</th>
                            <th class="center">Kelas</th>
                            <th class="center">Batas Pengumpulan</th>
                            <th class="center">Status</th>
                            <th class="center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach($data as $value)
                            <tr>
                                <td class="center">{{ $no++ }}</td>
                                <td>{{ $value->title }}</td>
                                <td>
                                    <ul style="list-style: none;">
                                        @foreach(\App\Models\KelasAssignment::where('id_assignment', $value->id)->get() as $cl)
                                            <li>{{ $cl->kelas->kelas }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ tanggal($value->due_date) }}</td>
                                <td>{{ ($value->isVisible) ? 'Aktif' : 'Tidak aktif' }}</td>
                                <td class="center">
                                    <a href="#" value="{{ route('cpanel.ortu.show.tugas', $value->id) }}" class="btn btn-warning btn-sm modalEdit" title="Lihat Tugas" data-toggle="modal" data-target="#modalEdit"><span class="fas fa-pencil-alt"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{ asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#table').DataTable();
        });

    	setInterval(function(){
		    $('.modalEdit').off('click').on('click', function () {
		      $('#modalEdit').modal({backdrop: 'static', keyboard: false}) 
		      
		        $('#modalEditContent').load($(this).attr('value'));
		        $('#modalEditTitle').html($(this).attr('title'));
		    });
		}, 500);
    </script>
@endsection
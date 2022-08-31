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

<div class="card card-solid">
    <div class="card-header">
        <h3 class="card-title text-primary">
            <i class="fab fa-servicestack"></i> &nbsp;Kelas Tersedia
        </h3>
    </div>

    <div class="card-body pb-0">
        @if (@$hasClass)
            <div class="row">
                @foreach ($data as $value)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header border-bottom-0" style="background-color: #f9fbfd">
                            <h3 class="lead"><strong>{{ $value->kelas }}</strong></h3>
                        </div>
                        <div class="card-body pt-0" style="background-color: #f9fbfd">
                            <div class="row">
                                <div class="col-md-7">
                                    <h4><i class=""></i>Tahun {{ $value->thn_akademik }}</h4>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class=""><span class="fa-li"><i class="fas fa-user"></i></span>
                                            <p>
                                                Guru: {{ $value->user->name }}
                                            </p>
                                        </li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span>
                                            {{ tanggal($value->periode_awal) }} - {{ tanggal($value->periode_akhir) }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{ asset('images/icon.png') }}" alt="CERIA" style="width: 110px; height: auto;">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
			          			<a href="#" value="{{ route('cpanel.ortu.show.kelas', $value->id) }}" class="btn btn-primary modalEdit" title="Lihat Kelas" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-search"></i> &nbsp;Lihat Kelas</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div style="display: flex; justify-content: center; margin-bottom: 10px">
                <h3>Belum ada kelas yang tersedia</h3>
            </div>
        @endif
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{ asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <script>
    	setInterval(function(){
		    $('.modalEdit').off('click').on('click', function () {
		      $('#modalEdit').modal({backdrop: 'static', keyboard: false}) 
		      
		        $('#modalEditContent').load($(this).attr('value'));
		        $('#modalEditTitle').html($(this).attr('title'));
		    });
		}, 500);
    </script>
@endsection
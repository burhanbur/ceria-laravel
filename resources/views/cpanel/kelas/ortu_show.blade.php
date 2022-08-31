@section('content')
<form method="POST" action="{{ route('cpanel.ortu.daftar.kelas', $data->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

	<div class="modal-body">
		<strong>Nama Kelas</strong>
		<div class="form-group">
			<input type="text" disabled class="form-control" value="{{ $data->kelas }}">
		</div>

		<strong>Deskripsi</strong>
		<div class="form-group">
			<textarea class="form-control" disabled>{{ $data->deskripsi }}</textarea>
		</div>

		<strong>Tahun</strong>
		<div class="form-group">
			<input type="text" disabled class="form-control" value="{{ $data->thn_akademik }}">
		</div>

		<div class="row">
			<div class="col-md-4">
				<strong>Periode</strong>
					<div class="form-group">
						<div class="form-group">
						    <div class="input-group">
						        <div class="input-group-prepend">
						            <span class="input-group-text"
						                ><i class="far fa-calendar-alt"></i
						            ></span>
						        </div>
						        <input
						            type="text"
						            class="form-control datepicker5"
						            data-date-format="yyyy-mm-dd" 
						            placeholder="2022-12-31" 
						            disabled 
						            value="{{ date('m-d-Y', strtotime($data->periode_awal)) }} - {{ date('m-d-Y', strtotime($data->periode_akhir)) }}" 
						            required
						        />
						    </div>
						</div>
					</div>
			</div>

			<div class="col-md-4">
				<strong>Status</strong>
				<div class="form-group">
		            <input type="checkbox" disabled @if ($data->status) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Daftar Siswa</h5>
					</div>

					<div class="card-body">
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width: 5%" class="center">No</th>
									<th class="center">Nomor Induk</th>
									<th class="center">Nama</th>
								</tr>
							</thead>
							<tbody>
								@php $no = 1 @endphp
								@foreach($data->childs as $value)
									<tr>
										<td class="center">{{ $no++ }}</td>
										<td>{{ $value->nomor_induk }}</td>
										<td>{{ $value->nama }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<strong>Tambah Siswa</strong>
		<div class="form-group">
			<a href="void::javascript(0);" id="addstudent" class="btn btn-success">
				<i class="fas fa-plus"></i>
			</a>
		</div>

		<div id="students">
		</div>
	</div>

	<div class="modal-footer">
		<div class="form-group">
			<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Submit</button>
			<button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
		</div>
	</div>
</form>

<script>
	$(document).ready(function(){
		$('#table').DataTable();

		$("input[data-bootstrap-switch]").each(function(){
			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		});

		$(".datepicker5").daterangepicker({
	    	autoclose: true,
	    });

	    $("#addstudent").on("click", function (e) {
			e.preventDefault();
			var newRow = $("<p>");
			var cols = "";

			// html
			cols = '<div class="form-group"> <div class="input-group"> <input type="text" class="form-control" name="nomor_induk_student[]" placeholder="Nomor Induk Murid" required> <input type="text" class="form-control" name="nama_student[]" placeholder="Nama Murid" required> <div class="input-group-prepend"> <span style=""> <a href="void::javascript(0);" class="btn btn-danger ibtnDel"> <i class="fas fa-trash"></i> </a> </span> </div> </div> </div>';

			newRow.append(cols);
			$("#students").append(newRow);
		});

		$("#students").on("click", ".ibtnDel", function (event) {
			event.preventDefault();
			$(this).closest("p").remove();
		});
	});
</script>
@endsection
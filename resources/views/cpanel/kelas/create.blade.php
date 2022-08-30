@section('content')
<form method="POST" action="{{ route('cpanel.store.kelas') }}" enctype="multipart/form-data">
@csrf
	<div class="modal-body">
		<strong>Nama Kelas</strong>
		<div class="form-group">
			<input type="text" name="kelas" placeholder="Nama Kelas" required class="form-control">
		</div>

		<strong>Deskripsi</strong>
		<div class="form-group">
			<textarea name="deskripsi" class="form-control" placeholder="Deskripsi Kelas" required></textarea>
		</div>

		<strong>Tahun</strong>
		<div class="form-group">
			<input type="text" name="thn_akademik" placeholder="Tahun" required class="form-control">
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
						            name="periode"
						            data-date-format="yyyy-mm-dd" 
						            placeholder="2022-12-31"
						            required
						        />
						    </div>
						</div>
					</div>
			</div>

			<div class="col-md-4">
				<strong>Status</strong>
				<div class="form-group">
		            <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
				</div>
			</div>
			<div class="col-md-4">
				<strong>Foto</strong>
				<div class="form-group">
					<input type="file" name="files">
				</div>
			</div>
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
		$("input[data-bootstrap-switch]").each(function(){
			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		});

		$(".datepicker5").daterangepicker({
	    	autoclose: true,
	    });
	});
</script>
@endsection
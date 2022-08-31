@section('content')
<form method="POST" action="{{ route('cpanel.store.tugas') }}" enctype="multipart/form-data">
@csrf
	<div class="modal-body">
		<strong>Nama Tugas</strong>
		<div class="form-group">
			<input type="text" name="title" placeholder="Nama Tugas" required class="form-control">
		</div>

		<strong>Deskripsi</strong>
		<div class="form-group">
			<textarea name="description" class="form-control" placeholder="Deskripsi Tugas" required></textarea>
		</div>

		<strong>Kelas</strong>
		<div class="form-group">
			<a href="void::javascript(0);" id="addkelas" class="btn btn-success">
				<i class="fas fa-plus"></i>
			</a>
		</div>

		<div id="kelas">
		</div>

		<div class="row">
			<div class="col-md-4">
				<strong>Batas Pengumpulan</strong>
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
						            name="due_date"
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
		            <input type="checkbox" name="isVisible" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
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

		$(".datepicker5").datepicker({
	    	autoclose: true,
	    });

	    $("#addkelas").on("click", function (e) {
			e.preventDefault();
			var newRow = $("<p>");
			var cols = "";

			// html
			cols = '<div class="form-group"> <div class="input-group"> <select name="id_class[]" class="form-control" required> <option value="">Pilih Kelas</option> @foreach($kelas as $kl) <option value="{{ $kl->id }}">{{ $kl->kelas }}</option> @endforeach </select> <div class="input-group-prepend"> <span style=""> <a href="void::javascript(0);" class="btn btn-danger ibtnDel"> <i class="fas fa-trash"></i> </a> </span> </div> </div> </div>';

			newRow.append(cols);
			$("#kelas").append(newRow);
		});

		$("#kelas").on("click", ".ibtnDel", function (event) {
			event.preventDefault();
			$(this).closest("p").remove();
		});
	});
</script>
@endsection
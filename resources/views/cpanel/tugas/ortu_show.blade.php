@section('content')
<form method="POST" action="{{ route('cpanel.ortu.store.tugas', $data->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

	<div class="modal-body">
		<strong>Judul Tugas</strong>
		<div class="form-group">
			<input type="text" disabled class="form-control" value="{{ $data->title }}">
		</div>

		<strong>Deskripsi</strong>
		<div class="form-group">
			<textarea class="form-control" disabled>{{ $data->description }}</textarea>
		</div>

		<strong>Batas Pengumpulan</strong>
		<div class="form-group">
			<input type="text" disabled class="form-control" value="{{ tanggal($data->due_date) }}">
		</div>

		<strong>Unggah Tugas</strong>
		<div class="form-group">
			<input type="file" name="files" accept="application/pdf">
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
	});
</script>
@endsection
<div class="d-flex justify-content-between">
		<a href="#" data-get="{{ route('admin.kota-motor.edit', $data->id) }}"
				data-action="{{ route('admin.kota-motor.update', $data->id) }}" class="btn btn-warning btn_edit">edit</a>
		<a href="#" data-url="{{ route('admin.kota-motor.destroy', $data->id) }}"
				class="btn btn-danger btn_delete">delete</a>
</div>
{{-- kerjakan fungsi tombol ajax  --}}

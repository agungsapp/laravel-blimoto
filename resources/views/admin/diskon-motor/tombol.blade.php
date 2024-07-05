<div class="d-flex justify-content-between">
		<a href="#" data-get="{{ route('admin.diskon-motor.edit', $data->id) }}"
				data-action="{{ route('admin.diskon-motor.update', $data->id) }}" class="btn btn-warning btn_edit">edit</a>
		<a href="#" data-url="{{ route('admin.diskon-motor.destroy', $data->id) }}"
				class="btn btn-danger btn_delete">delete</a>
</div>
{{-- kerjakan fungsi tombol ajax  --}}

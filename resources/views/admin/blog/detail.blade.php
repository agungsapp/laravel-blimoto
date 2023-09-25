@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="border-1 rounded-3 container p-5 shadow-lg">
						<h1>judul</h1>
						<p>{{ $blog->judul }}</p>
						<div>
								{!! $blog->deskripsi !!}
						</div>
				</div>
		</div>
@endsection

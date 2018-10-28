@extends('main')
@section('title', "| $post->title")
@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h4>{{ $post->title }}</h4>
			<p>{{ $post->body }}</p>
		</div>
	</div>

@endsection
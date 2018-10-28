@extends('main')

@section('stylesheet')

	<link href="/css/parsley.css" rel="stylesheet">

@endsection

@section('content')

	<div class="row">
		<div class="col-md-2"></div>
		
		<div class="col-md-8">
			<h1>Create New Post</h1>
			<hr>
			<form style="margin-bottom: 20px" method="post" action="{{ route('posts.store')}}">
			@csrf
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" placeholder="New Title">
			</div>
			<div class="form-group">
				<label>Slug</label>
				<input type="text" name="slug" class="form-control">
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea class="form-control"name="body" rows="9"></textarea>
			</div>

				<button type="submit" class="btn btn-success btn-block">Submit</button>
			</form>
		</div>
	</div>


@endsection()

@section('scripts')

	<script src="/js/parsley.min.js"></script>

@endsection
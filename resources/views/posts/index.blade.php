@extends('main')
@section('content')

		<div class="row">
			<div class="col-md-9">
				<h1>All Posts</h1>
			</div>

			<div class="col-md-3">
				<a href="{{route ('posts.create')}}" class="btn btn-lg btn-primary btn-block btn-h1-spacing">Create New Post</a>
			</div>
			
			<div class="col-md-12">
				<hr>
			</div>	

		</div><!-- penutup row -->

		<div class="row">
			<div class="col-md-12">
				<table class="table">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>Title</th>
				      <th>Body</th>
				      <th>Created At</th>
				      <th>Action</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      @foreach ($posts as $post)

				      	<tr>
				      		<th>{{ $post->id }}</th>
				      		<td>{{ $post->title }}</td>
				      		<td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." :"" }}</td>
				      		<td>{{ date('M j, Y', strtotime ($post->created_at)) }}</td>
				      		<td><a href="{{ route('posts.show', $post->id)}}" class="btn btn-success">View</a>
				      			<a href="{{ route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
				      		</td>
				      	</tr>

				      @endforeach

				    </tr>
				  </tbody>
				</table>
				<div class="text-center">
					{{ $posts->links()}}
				</div>
			</div>			
		</div>

@endsection
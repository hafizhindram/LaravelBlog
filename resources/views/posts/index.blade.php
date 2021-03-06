@extends('main')
@section('content')

		<div class="row">
			<div class="col-md-9">
				<h3>All Posts</h3>
			</div>

			<div class="col-md-2">
				<a href="{{route ('posts.create')}}" class="btn btn-lg btn-primary btn-block">Create Post</a>
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
				  	@php
				  		$no = 1;
				  	@endphp
				    <tr>
				      @foreach ($posts as $post)

				      	<tr>
				      		<th>{{ $no++ }}</th>
				      		<td>{{ $post->title }}</td>
				      		<td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." :"" }}</td>
				      		<td>{{ date('M j, Y', strtotime ($post->created_at)) }}</td>
				      		<td><a href="{{ route('posts.show', $post->slug)}}" class="btn btn-secondary">View</a></td>
				      	</tr>

				      @endforeach

				    </tr>
				  </tbody>
				</table>
				
				<!-- Pagination -->
			    <ul class="pagination justify-content-center mb-4">
			      <li class="page-item">
			        <a class="page-link" href="#">&larr; Older</a>
			      </li>
			      {{ $posts->links()}}
			      <li class="page-item disabled">
			        <a class="page-link" href="#">Newer &rarr;</a>
			      </li>
			    </ul>
				
			</div>			
		</div>

@endsection
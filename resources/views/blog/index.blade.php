@extends('main')
@section('title', '| Blog')
@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Blog</h2>
		</div>
	</div>

	@foreach($posts as $post)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h4>{{ $post->title }}</h4>
			<h5>Publish : {{ date ('M j, Y', strtotime($post->created_at))}}</h5>

			<p>{{ substr($post->body, 0, 250) }}{{ strlen($post->body) > 250 ? "..." :"" }}</p>

			<a href="{{ route('blog.single', $post->id)}}">Read More</a>
		</div>
	</div>
	@endforeach
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

@endsection
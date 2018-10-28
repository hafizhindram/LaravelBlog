@extends('main')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>{{ $post->title }}</h1>
		<p class="lead">{{ $post->body }}</p>
	</div>
	<div class="col-md-4" style="margin-bottom: 10px">
		<div class="card">
		<div class="card-body">
		  <div class="form-group row">
		    <label for="staticEmail" class="col-sm-3 col-form-label">Url :</label>
		    <div class="col-sm-9" style="margin-top: 10px">
		     {{--  <a href="{{ url($post->slug) }}"><input type="text"class="form-control" 
		      	value="{{url($post->slug)}}"></a> --}}
		      	<a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword" class="col-sm-5 col-form-label">Created at :</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" 
		      value="{{ date('M j, Y H:i', strtotime($post->created_at)) }}">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword" class="col-sm-5 col-form-label">Last Update :</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" 
		      value="{{ date('M j, Y H:i', strtotime($post->updated_at)) }}">
		    </div>
		  </div>

		  <div class="row">	
		  		<div class="col-md-6">
		  			<a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a>
		  		</div>

		  		<div class="col-md-6">
		  			<form action="{{ route('posts.destroy', $post->id)}}" method="post">
		               <input type="submit" value="Delete" class="btn btn-danger btn-block">
		               <input type="hidden" name="_token" value="{{Session::token()}}">{{method_field('DELETE')}}
		            </form>
		  		</div>

		  		<div class="col-md-12" style="margin-top: 10px">
		  			<a href="{{ route('posts.index') }}" class="btn btn-warning btn-block">View All Posts</a>
		  		</div>

		  </div>

		</div>
		</div>


	</div><!--div col-md-4 -->
</div>


@endsection
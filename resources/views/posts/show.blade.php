@extends('main')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>{{ $post->title }}</h1>
		<p class="lead">{{ $post->body }}</p>
	</div>
	<div class="col-md-4">
		
			<div class="card" style="margin-bottom: 10px">
			  <div class="card-body">
			    	  <table class="table table-borderless">
						  <thead>
						    <tr>
						      <th scope="col">Created At :</th>
						      <th scope="col">Last Update :</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <td>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</td>
						      <td>{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</td>
						    </tr>
						  </tbody>
						</table>
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
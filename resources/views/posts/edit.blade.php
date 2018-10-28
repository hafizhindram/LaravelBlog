@extends('main')
@section('title', '| Edit Post')
@section('content')

<div class="row" style="margin-bottom: 10px">
	<div class="col-md-8">
		<form method="post" action="{{route('posts.update', $post->id)}}">
		@csrf
			<h5><label>Title</label></h5>
			<input name="title" class="form-control" rows="1" value="{{ $post->title }}">
			<br>
			<h5><label>Slug</label></h5>
			<input name="slug" class="form-control" rows="1" value="{{ $post->slug }}">
			<br>
			<h5><label>Body</label></h5>
			<textarea name="body" class="form-control" rows="9">{{ $post->body }}</textarea>
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
					  			<a href="{{ route('posts.show', $post->id)}}" class="btn btn-danger btn-block">
					  			Cancel</a>
					  		</div>
					  		<div class="col-md-6">
					  			<button class="btn btn-success btn-block" type="submit">Save</button>
					  			<input type="hidden" name="_token" value="{{ Session::token() }}"> {{ method_field('PUT')}}
					  		</div>
					  </div>
					 
			  </div>
			</div>

	</div><!--div col-md-4 -->

		</form>	
</div><!--row-->
	

@endsection()
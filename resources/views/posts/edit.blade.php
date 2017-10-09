@extends('layout.app')

@section('content')
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-sm-12 col-lg-4">
		<h4 class="text-center">Edit Post</h4>
		
			{!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostController@update',$post->id]]) !!}
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="user_id" class="form-control" value="1">
			<input type="text" name="title" placeholder="Enter title" class="form-control" value="{{$post->title}}">
			<br>
			<textarea name="content" class="form-control" placeholder="Enter your Post here">{{$post->content}}</textarea>
			<br>
			<input type="submit" name="submit" class="btn btn-custom" value="UPDATE">
		{!! Form::close() !!}
		<br>
		<form method="POST" action="/posts/{{$post->id}}">
		{!! Form::model($post, ['method'=>'DELETE', 'action'=>['PostController@destroy',$post->id]]) !!}
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="DELETE">
			<input type="submit" class="btn btn-danger"  value="DELETE">
		</form>
	</div>
	<div class="col-lg-4"></div>
	
</div>

@stop
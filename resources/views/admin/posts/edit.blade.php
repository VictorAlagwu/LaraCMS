@extends('layouts.admin')
@section('content')
<h2>Edit Post</h2>

<div class="col-sm-3">
   <img src="/images/{{ $post->photo != null ? $post->photo->file_path : "455x449.png"}}" alt="" class="img-responsive img-rounded" >
   
</div>
<br>
<div class="col-sm-9">
	{!! Form::model($post,['method'=>'PATCH','action'=>['PostController@update',$post->id],'files'=>true]) !!}

		@include('includes.form_error')
			<div class="form-group">
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title',null,['class'=>'form-control']) !!}

			</div>
			<div class="form-group">
				{!! Form::label('category_id','Category') !!}
				{!! Form::select('category_id',$categories,null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('photo_id', 'Upload Media') !!}
			   {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
			</div>
			<div class="from-group">
				{!! Form::label('body','Body') !!}
				{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
			</div>
			<br>
			<div class="form-group text-center">
				{!! Form::submit('Update Post', ['class'=>'btn btn-default']) !!}
			</div>
	{!! Form::close() !!}
	<br>
	{!! Form::open(['method'=>'DELETE','action'=>['PostController@destroy',$post->id]]) !!}
	<div class="form-group">
			{!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-4']) !!}
	</div>

	{!! Form::close() !!}
</div>

@stop

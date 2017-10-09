@extends('layout.app')

@section('content')
<div class="row">
	<div class="col-4"></div>
	<div class="col-4">
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
		<h4 class="text-center">Add Post</h4>
		{!! Form::open(['method'=>'POST', 'action'=>'PostController@store', 'files'=>true]) !!}


			<div class="form-group">			
			
				{!! Form::label('title', 'Title: ') !!}
				{!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Title']) !!}
				{!! Form::label('content', 'Content: ') !!}
				{!! Form::textarea('content', null, ['class'=>'form-control','placeholder'=>'Enter your Post here']) !!}
				<br>
			</div>
			<div class="form-control">
				{!! Form::file('file',['class'=>'form-control']) !!}				
			</div>
			<br>
			<input type="submit" name="submit" class="btn .btn-custom">
		{!! Form::close() !!}
	</div>
	<div class="col-4"></div>


	
</div>

@stop
@extends('layouts.admin')
@section('content')
<h2>Create New Post</h2>
<br>
{!! Form::open(['method'=>'POST','action'=>['PostController@store', 'files'=>true]]) !!}
<div class="form-group">
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">
	{!! Form::label('category_id','Category') !!}
	{!! Form::select('category_id',array(''=>'options'),null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('photo_id','Upload Media ') !!}
	{!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
</div>
<div class="from-group">
	{!! Form::label('body','Body') !!}
	{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>
<br>
<div class="form-group text-center">
	{!! Form::submit('Add Post', ['class'=>'btn btn-default']) !!}
</div>
@stop
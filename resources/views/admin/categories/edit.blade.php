@extends('layouts.admin')
@section('content')
<h3>Edit Categories</h3>
<br>
<div class="row">
	<div class="col-sm-6">
		{!! Form::model($category,['method'=>'PATCH','action'=>['CategoryController@update',$category->id]]) !!}
		<div class="form-group">
			{!! Form::label('name', 'Category Name') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Edit Category', ['class'=>'btn btn-default']) !!}
		</div>
		
		{!! Form::close() !!}
		<div class="form-group">
			{!! Form::open(['method'=>'DELETE','action'=>['CategoryController@destroy',$category->id]]) !!}
			{!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop
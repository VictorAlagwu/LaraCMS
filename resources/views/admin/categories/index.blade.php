@extends('layouts.admin')
@section('content')
<h3>Categories</h3>
<br>
<div class="row">
	<div class="col-sm-6">
		{!! Form::open(['method'=>'POST','action'=>'CategoryController@store']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Category Name') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Add Category', ['class'=>'btn btn-default']) !!}
		</div>
		
		{!! Form::close() !!}
	</div>
	<div class="col-sm-6">
		<table class="table table-bordered table-inverse">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Category Name</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($categories as $category)
		    <tr>
		      <th scope="row">{{ $category->id }}</th>
		      <td>{{ $category->name }}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
</div>
@stop
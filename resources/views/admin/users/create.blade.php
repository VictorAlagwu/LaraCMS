@extends('layouts.admin')

@section('content')
<h4 class="text-center">Create User</h4>
 {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
@include('includes.form_error')
 <div class="form-inline text-center">
   {!! Form::label('name', 'Name: ') !!}
   {!! Form::text('name',null,['class'=>'form-control']) !!}
 </div>
 <br>
 <div class="form-inline text-center">
   {!! Form::label('email', 'Email:') !!}
   {!! Form::email('email',null, ['class'=>'form-control']) !!}
 </div>
 <br>
 <div class="form-inline text-center">

   {!! Form::label('role_id', 'Role ID') !!}
   {!! Form::select('role_id', [''=>'Choose Role'] + $roles,null, ['class'=>'form-control']) !!}
 </div>

 <br>
 <div class="form-inline text-center">
   {!! Form::label('file', 'Upload Files') !!}
   {!! Form::file('file',null,['class'=>'form-control']) !!}
 </div>
 <br>
 <div class="form-inline text-center">
   {!! Form::label('status','Status') !!}
   {!! Form::select('status', array(1=>'Active',0=>'Not Active'),null, ['class'=>'form-control']) !!}
 </div>
 <br>
 <div class="form-inline text-center">
   {!! Form::label('password','Password') !!}
   {!! Form::password('password', ['class'=>'form-control']) !!}
 </div>
 <br>
 <div class="form-inline text-center">
   {!! Form::submit('Create User', ['class'=>'btn btn-default']) !!}
 </div>
 	
@stop
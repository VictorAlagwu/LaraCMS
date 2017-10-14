@extends('layouts.admin')

@section('content')
<h4 class="text-center">Edit User</h4>

<div class="col-sm-3">
   <img src="/images/{{ $user->photo != null ? $user->photo->file_path : "455x449.png"}}" alt="" class="img-responsive img-rounded" >
   
</div>
<br>
<div class="col-sm-9">
   {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
   @include('includes.form_error')

       <div class="form-group">
         {!! Form::label('name', 'Name: ') !!}
         {!! Form::text('name',null,['class'=>'form-control']) !!}
       </div>
       <br>
       <div class="form-group">
         {!! Form::label('email', 'Email:') !!}
         {!! Form::email('email',null, ['class'=>'form-control']) !!}
       </div>
       <br>
       <div class="form-group">

         {!! Form::label('role_id', 'Role ID') !!}
         {!! Form::select('role_id',$roles,null, ['class'=>'form-control']) !!}
       </div>

       <br>
       <div class="form-group">
         {!! Form::label('photo_id', 'Upload Files') !!}
         {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
       </div>
       <br>
       <div class="form-group">
         {!! Form::label('status','Status') !!}
         {!! Form::select('status', array(1=>'Active',0=>'Not Active'),null, ['class'=>'form-control']) !!}
       </div>
       <br>
       <div class="form-group">
         {!! Form::label('password','Password') !!}
         {!! Form::password('password', ['class'=>'form-control']) !!}
       </div>
       <br>
       <div class="form-group">
         {!! Form::submit('Edit User', ['class'=>'btn btn-default']) !!}
       </div>
       {!! Form::close() !!}
</div>

 	
@stop
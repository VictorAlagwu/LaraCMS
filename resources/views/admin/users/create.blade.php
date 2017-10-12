@extends('layouts.admin')

@section('content')
<h4 class="text-center">Create User</h4>
  <form method="POST" action="/admin/users/}}">
    {{ csrf_field()}}
    <div class="form-inline text-center">
      <label class="form-control-label">Name</label>
    <input type="text" name="name" class="form-control">
    </div>
    <br>
    <div class="form-inline text-center">
      <button class="btn btn-default" type="submit" >Submit</button>
    </div>
  </form>
 	
@stop
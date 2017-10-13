@extends('layouts.admin')

@section('content')
<h4>Users</h4>
 	 <table class="table table-condensed">
    <thead>
      <tr>
      	<th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role ID</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    	@foreach ($users as $user)
   			<tr>
   				<td>{{ $user->id }}</td>
   				<td>{{ $user->name }}</td>
   				<td>{{ $user->email }}</td>
   				<td>{{ $user->role != null ? $user->role->name : "No Role" }}</td>
   				<td>{{ $user->status == '1' ? 'Active' : 'Not Active'}}</td>
   				<td>{{ $user->created_at->diffForHumans() }}</td>
   				<td>{{ $user->updated_at->diffForHumans() }}</td>
   			</tr>
		@endforeach
    </tbody>
  </table>
@stop
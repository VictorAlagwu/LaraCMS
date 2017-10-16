@extends('layouts.admin')
@section('content')
<h4>All Posts</h4>
 	 <table class="table table-condensed">
    <thead>
      <tr>
      	<th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>Category</th>
        <th>Author</th>
        <th>Photo</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    	@foreach ($posts as $post)
   			<tr>
   				<td>{{ $post->id }}</td>
   				<td> {{ $post->title }}</td>
   				<td> {{ $post->body }}</td>
   				<td> {{ $post->category_id}}</td>
   				<td> {{ $post->user_id }}</td></td>
                <td></td>
   				<td>{{ $post->created_at->diffForHumans() }}</td>
   				<td>{{ $post->updated_at->diffForHumans() }}</td>
   			</tr>
		@endforeach
    </tbody>
  </table>
@stop
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
   				<td><a href="{{ route('post.edit',$post->id)}}"> {{ $post->title }}</a></td>
   				<td> {{ $post->body }}</td>
   				<td> {{ $post->category != null ? $post->category->name : "No Category"}}</td>
   				<td> {{ $post->user != null ? $post->user->name : "No User" }}</td>
          <td><img  height="50" src="/images/{{ $post->photo != null ? $post->photo->file_path : "455x449.png"}}" alt="Images"></td>
   				<td>{{ $post->created_at->diffForHumans() }}</td>
   				<td>{{ $post->updated_at->diffForHumans() }}</td>
   			</tr>
		@endforeach
    </tbody>
  </table>
@stop
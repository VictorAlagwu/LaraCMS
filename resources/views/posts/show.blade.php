@extends('layout.app')

@section('content')
<div class="jumbotron-hr">
	<div class="lead text-center">
		Welcome to the index page
		<br>
	<a href="{{route('posts.edit', $post->id)}}"> {{$post->title}}<span>:: </span>{{$post->content}}</a> 
	
	</div>
</div>
@stop
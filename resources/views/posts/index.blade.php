@extends('layout.app')

@section('content')
<div class="jumbotron-hr">
	<div class="lead text-center">
		Welcome to the index page
		<br>
	<ul>
		@foreach ($posts as $post) 
			<li><img class="rounded mx-auto d-block" src="{{$post->path}}"><a href="{{route('posts.show',$post->id)}}"> 
				{{$post->title}}<span>:: </span>{{$post->content}} </a>
			</li>


	@endforeach;
	</ul>
	
	</div>
</div>
@stop
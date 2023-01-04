@extends('layouts.app')

@section('title', '| DELETE POST?')

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="well">DELETE THIS POST?</h1>
			<p>
				<h1>{{$post->title}}</h1>
				<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
				</div>
				<p>{!! substr($post->body, 0, 400)!!} {!! strlen($post->body) > 400 ? '...': ""!!}</p>
						<small>Created At {{$post->created_at}} by <strong><a href="/profile">{{$post->user->name}}</a></strong></small>
				
			</p>

			{{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE']) }}
				{{Form::hidden('method', 'GET')}}
				{{ Form::submit('YES DELETE THIS POST', ['class' => 'btn btn-lg btn-block btn-danger']) }}

			{{ Form::close() }}

			<br>
			<div >
				<a href="/posts/{{$post->id}}" class="btn btn-default btn-block">Cancel</a>
			</div>


		</div>
	</div>

@endsection
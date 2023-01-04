@extends('layouts.app')

@section('title', '| All Posts')

@section('content')
	
	<h1>Posts</h1>
	<hr>
	@if(count($posts) > 0)
		@foreach($posts as $post)
			<div class="well">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						
						<img style="width:100%; height: 30vh;" src="{{ URL::to('/') }}/images/{{$post->cover_image}}" height="400" width="800">
					</div>
					<div class="col-md-8 col-sm-8">
						<h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
						<div class="tags">
							@foreach ($post->tags as $tag)
								<span class="label label-default">{{ $tag->name }}</span>
							@endforeach
						</div>
						<br>
			
						<p>{!! substr(strip_tags($post->body), 0, 250)!!} {!! strlen(strip_tags($post->body)) > 250 ? '...' : ""!!}</p>
						<small>Created At {{$post->created_at}} by <strong><a href="/profile">{{$post->user->name}}</a></strong></small>
					</div>
				</div>
			</div>
		@endforeach
		{{$posts->links()}}
	@else
		<p>No Post Found</p>
	@endif
@endsection

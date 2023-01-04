@extends('layouts.app')

@section('title', "| Blogs")

@section('content')

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>Blogs</h1>
			<hr>
			
		</div>
	</div>

	@if(count($posts) > 0)
		@foreach($posts as $post)
			<div class="well">
				<div class="row">
					<div class="col-md-4 col-sm-4">
				
					<img style="width:100%; height: 30vh;" src="{{ URL::to('/') }}/images/{{$post->cover_image}}" height="200" width="400">
				
				</div>
				<div class="col-md-8 col-sm-8">
					<h2>{{$post->title}}</h2>
					<div class="tags">
						@foreach ($post->tags as $tag)
							<span class="label label-default">{{ $tag->name }}</span>
						@endforeach
					</div>
					
					<h5>Published At: {{$post->created_at}}</h5>by <a href="/profile">{{$post->user->name}}</a>
					<p>{!! substr(strip_tags($post->body), 0, 250) !!} {!! strlen(strip_tags($post->body)) > 250 ? '...' : ""!!}</p>
					
					<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary pull-right">Read More</a>
				</div>
			</div>
		</div>
		<hr>
		@endforeach
	@else
		<p>No Post Found</p>
	@endif

	<div class="row">
		<div class="text-center">
			{!! $posts->links() !!}
		</div>
		
	</div>

@endsection
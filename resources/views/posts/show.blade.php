@extends('layouts.app')


@section('title', "| Blog | $post->title")

@section('content')
	<a href="/posts" class="btn btn-default btn-block">Go Back</a><br>

	<div class="row">
		<div class="col-md-8">
			<h1>{{$post->title}}</h1>
			
			<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>
			<br>
			
			<p>
			<img style="width:100%;" src="{{ URL::to('/') }}/images/{{$post->cover_image}}" height="400" width="800"></p>
			<br><br>

			<p class="lead">{!!$post->body!!}</p>
		</div>	

		
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
						<dt>URL Slug:</dt><dd><a href="{{route('blog.single', $post->slug)}}"> {{route('blog.single', $post->slug)}}</a></dd>
				</dl>
				<dl class="dl-horizontal">
						<dt>Category:</dt><dd>{{ $post->category->name }}</dd>
				</dl>
				<dl class="dl-horizontal">
						<dt>Crated At:</dt><dd>{{ date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
				</dl>
				<dl class="dl-horizontal">
						<dt>Updated At: </dt><dd>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>by<dt> <dd><a href="/profile">{{$post->user->name}}</a></dd>	
				</dl>

				
				<div class="row">
					@if(!Auth::Guest())
						@if(Auth::user()->id == $post->user_id)
							<div class="col-sm-6">
								<a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-block">Edit Post</a>
							</div>
							<div class="col-sm-6">
								{!!Form::open(['action' => ['PostsController@delete', $post->id], 'method' => 'GET', 'class' => 'pull-right'])!!}
								
								{{Form::submit('Delete Post', ['class' => 'btn btn-danger btn-block'])}}

								{!!Form::close()!!}
							</div>
								
						@endif
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>   Comments {{ $post->comments()->count() }} Total</h3>
		</div>
	</div>

	<div id="backend-comments" class="col-md-8 pull-left" style="margin-top: 50px;">
				

				<table class="table">
					<thead>
						<tr>
							
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td><img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image"><strong>  {{ $comment->name }}</strong></td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

	<div class="row">
		<div id="comment-form" class="col-md-8" style="margin-top: 50px;">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', "Name:") }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-12">
						{{ Form::label('comment', "Comment:") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

						{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
					</div>
				</div>

			{{ Form::close() }}
		</div>
	</div>
	

			
@endsection

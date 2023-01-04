	@extends('layouts.app')

	@section('title', '| Edit Post')

	@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
	@endsection

	@section('content')
		
		<h1>Edit Post</h1>
		<div class="col-md-8">
			{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
				<div class="form-group" >
		   			{{Form::label('title', 'Title' )}}
		   			{{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
		   		</div>
			   	
			   	<div class="form-group" >
		   			{{Form::label('slug', 'Slug' )}}
		   			{{Form::text('slug', $post->slug, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255', 'placeholder' => 'Slug'])}}
		   		</div>

		   		<div class="form-group" >
		   			{{Form::label('category_id', 'Category' )}}
		   			{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
		   		</div>

	   			<div class="form-group" >
			   		{{ Form::label('tags', 'Tags:') }}
					{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
				</div>

				<div class="form-group" >
				{{Form::hidden('_method', 'PUT')}}
		   		<div class="form-group">
	   			{{Form::label('cover_image', 'Upload Cover Image' )}}
	   			{{Form::file('cover_image')}}
	   			</div>

		   		<div class="form-group" >
		   			{{Form::label('body', 'Body' )}}
		   			{{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'BodyText'])}}
		   		</div>
	   			
	   			</div>
	   	</div>
	   	<div class="col-md-4">
				<div class="well">
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
								<div class="col-sm-6">
									<a href="/posts/{{$post->id}}" class="btn btn-default btn-block">Cancel</a>
								</div>
								<div class="col-sm-6">
									{{Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
								</div>
					</div>
				</div>
		
	   	</div>	
			{!! Form::close() !!}
		
			
		
	@endsection

	@section('scripts')
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	{!! Html::script('js/select2.min.js') !!}
	
		<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
		</script>
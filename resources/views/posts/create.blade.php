	@extends('layouts.app')

	@section('title', '| Create Post')

	@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}
	@endsection
	@section('content')
		<h1>Create Post</h1>

		<div class="col-md-8">

			{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
				<div class="form-group" >
		   			{{Form::label('title', 'Title' )}}
		   			{{Form::text('title', '', ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255','placeholder' => 'Title'])}}
		   		</div>
		   		<div class="form-group" >
		   			{{Form::label('slug', 'Slug' )}}
		   			{{Form::text('slug', '', ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255', 'placeholder' => 'Slug'])}}
		   		</div>

		   		<div class="form-group" >
		   			{{Form::label('category_id', 'Category' )}}
		   			<select class="form-control" name ="category_id">
		   				
		   				@foreach($categories as $category)
		   					<option value="{{ $category->id }}">{{ $category->name}}</option>
		   				@endforeach

		   			</select>
		   		</div>

		   		<div class="form-group" >
				   	{{ Form::label('tags', "Tags:") }}
					<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
					@endforeach

					</select>
				</div>
			
			<div class="form-group">
	   			{{Form::label('cover_image', 'Upload Cover Image' )}}
	   			{{Form::file('cover_image')}}
	   		</div>

		   	<div class="form-group" >
		   			{{Form::label('body', 'Body' )}}
		   			{{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'BodyText'])}}
	   		</div>
	   		

	   	</div>
	   		<div class="col-md-4">
	   			
		   			<div class="well"">
									
									<div class="">
										{{Form::submit('Submit', ['class' => 'btn btn-primary btn-block'])}}
									</div><br>
									<div class="">
										<a href="/posts" class="btn btn-danger btn-block">Cancel</a>
									</div>
										
									<hr>
					
					<div><a href="/blog" class="btn btn-default btn-block"><< See All Posts</a></div>
					</div>
				
	   		</div>
		{!! Form::close() !!}
		
		
		
	@endsection

	@section('scripts')
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


		{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>	
	
	@endsection
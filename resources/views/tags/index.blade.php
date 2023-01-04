@extends('layouts.app')

@section('title', '| All Tags')

@section('content')
	
	<div class="col-md-8">
		<h2>Categories</h2>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
				</tr>
			</thead>

			<tbody>
				@foreach($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th></a>
						<th><a href="tags/{{ $tag->id }}">{{ $tag->name }}</a></th>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div><!-- end  of .col-md-8 -->

	<div class="col-md-3">
		<div class="well">
			{!!Form::open(['route' => 'tags.store', 'method' => 'POST'])!!}
			<h2>New Tag</h2>
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
			<br>
			{{ Form::submit('Create New Tag', ['class' => 'btn btn-success btn btn-block'])}}
			{!! Form::close()!!}
		</div>
	</div>

@endsection
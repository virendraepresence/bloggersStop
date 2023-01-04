@extends('layouts.app')

@section('title', '| Services')

@section('content')
        <h1>{{$title}}</h1>
        @if(count($services) > 0)
        	<ul class="list-group">
        		@foreach($services as $service)
        			<a href="/contact" style="text-decoration: none;"><li class="list-group-item">{{$service}}</li></a>
        		@endforeach
        	</ul>
        @endif
@endsection

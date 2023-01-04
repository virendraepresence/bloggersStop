@extends('layouts.app')

@section('title', '| Home')

@section('content')


        <div class="col-md-8">
                <div class="jumbotron">
                    <p>
                    <a href="{{ URL::to('/technology') }}" style="text-decoration: none;">
                        <h1>{{$title}}</h1></p>
                        <img src="{{ URL::to('/') }}/images/technology.jpg" style="width:100%; height: 30vh;" >
                    </a>
                    
                </div>

                <div class="jumbotron">
                    <a href="{{ URL::to('/discussion') }}" style="text-decoration: none;">
                        <h1>Moments that you want Back...</h1>
                        <p>A number of stuff you may want back from the past...</p>
                    </a>
                </div>

                <div class="jumbotron">
                    <a href="{{ URL::to('/coding') }}" style="text-decoration: none;">
                        <h1>Coding and Its Chalenges in Today's World...</h1>
                        <p>Human nature looks for more than more and that is a good thing in a way... </p>
                    </a>
                </div>
        </div>
        
        <div class="col-md-4">
                <div class="well">
                        <h1>Updates</h1>
                        
                                
                                @if(count($posts) > 0)
                                        @foreach($posts as $post)
                                        <div class="well">
                                                <h3><a href="{{ route('blog.single', $post->slug) }}">{{$post->title}}</a></h3>
                                                <h5>Published At: {{$post->created_at}}</h5>by <a href="{{ URL::to('/profile') }}">{{$post->user->name}}</a>
                                        </div>
                                        @endforeach
                                @endif

                           		
                </div>
        </div>


        


@endsection
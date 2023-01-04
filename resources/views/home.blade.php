@extends('layouts.app')

@section('title', '| Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create Posts</a>
                    <h3>Your Blogs and Other Posts</h3>
                    @if(count($posts) > 0)
                    
                    <table class="table table-striped">
                        <tr>
                        <td>Title</td>
                        <td></td>
                        <td></td>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                        <td><a href="/posts/{{$post->id}}" >{{$post->title}} </a></td>
                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                        <td>
                            

                            {!!Form::open(['action' => ['PostsController@delete', $post->id], 'method' => 'GET', 'class' => 'pull-right'])!!}
                                
                            {{Form::submit('Delete Post', ['class' => 'btn btn-danger btn-block'])}}

                            {!!Form::close()!!}

                        </td>
                        </tr>

                        @endforeach
                    </table>
                    @else
                    <p>You Have No Posts Created</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

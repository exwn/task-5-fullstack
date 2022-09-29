@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a class="btn btn-primary mb-3" href="{{ route('post.create') }}" role="button">Create Post</a>

            @foreach ($post as $index => $item)

            <div class="card mb-4">
                <div class="card-header">{{ $item->user->name }}</div>

                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <h6 class="mb-2">
                        <span class="badge rounded-pill text-bg-primary">{{ $item->category->name }}</span>
                    </h6>
                    <img src="{{ asset('posts/'.$item->image) }}" class="img-fluid mb-2" />
                    <p class="card-text">{{ $item->content }}</p>
                    <a class="btn btn-primary btn-sm" href="{{ route('post.edit', $item->id) }}" role="button">Edit</a>
                    {!! Form::open(['method' => 'POST','route' => ['post.destroy',
                    $item->id],'style'=>'display:inline']) !!}
                    {!! Form::button('Delete', [ 'type'
                    => 'submit', 'class' => 'btn btn-light-secondary btn-sm'])
                    !!}
                    {!! Form::close() !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

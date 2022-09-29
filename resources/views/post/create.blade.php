@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a class="btn btn-primary mb-3" href="{{ route('post.index') }}" role="button">Back</a>
            <a class="btn btn-primary mb-3" href="{{ route('category.create') }}" role="button">Create Category</a>
            <div class="card">
                <div class="card-header">{{ (isset($post) ? "Edit
                    Post" :
                    "Create Post") }}</div>

                <form action="{{ (isset($post) ? route('post.update', $post->id) : route('post.create')) }}"
                    method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input class="form-control form-control-sm" type="text"
                                placeholder="Please input your title" aria-label=".form-control-sm example" name="title"
                                value="{{ isset($post) ? $post->title : old('title') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="formFileSm" class="form-label w-100">
                                Image
                                <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
                            </label>
                        </div>
                        <div class="form-group mb-2">
                            <label for="title">Content</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="content">{{ isset($post) ? $post->title : old('title') }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="formFileSm" class="form-label">Category</label>
                            <select class="form-control" id="selectTwo">
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" value="9" id="kelasPost" name="category_id">
                        <button type="submit" class="btn btn-primary btn-sm" value="save">Submit</button>
                        <button type="reset" class="btn btn-light-secondary btn-sm">Reset</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
    $('#selectTwo').select2({
    tags: true
    });
});
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a class="btn btn-primary mb-3" href="{{ route('post.create') }}" role="button">Back</a>
            <div class="card">
                <div class="card-header">{{ (isset($category) ? "Edit
                    Post" :
                    "Create Post") }}</div>
                <form action="{{ route('category.create') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Name</label>
                            <input class="form-control form-control-sm" type="text"
                                placeholder="Please input your category" aria-label=".form-control-sm example"
                                name="name">
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

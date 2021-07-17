@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        @include("partials.alert")
        <div class="card">
            <div class="card-header">
                Edit Blog
            </div>
            <div class="card-body">
                <form action="{{ route('blogs.update', [$blog->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label>Name*</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', isset($blog->name) ? $blog->name : '') }}">
                        @if ($errors->has('name'))
                        <div class="error">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea id="description" name="description" class="form-control" required>{{ old('description', isset($blog->description) ? $blog->description : '') }}</textarea>
                        @if ($errors->has('description'))
                        <div class="error">
                            {{ $errors->first('description') }}
                        </div>
                        @endif
                    </div>
                    
                    <div class="form-group finalSubmitBtn">
                        <input class="btn btn-primary btn-md" type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    CKEDITOR.replace('description');
</script>

@endsection
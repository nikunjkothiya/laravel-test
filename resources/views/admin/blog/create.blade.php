@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        @include("partials.alert")
        <div class="card">
            <div class="card-body">
                <div class="card-title mb-3">
                    Create Blog
                </div>
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name*</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                        <div class="error">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                        <div class="error">
                            {{ $errors->first('description') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group finalSubmitBtn">
                        <input class="btn btn-primary btn-md" type="submit" value="Submit">
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
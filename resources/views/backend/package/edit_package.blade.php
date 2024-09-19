@extends('backend.master')

@push('backend_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Package</h6>
                    @if (session('package_update'))
                        <div class="alert alert-success">
                            {{ session('package_update') }}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ route('update.package', $package->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            @error('selling_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="selling_price">Package Selling Price $$</label>
                            <input type="number" name="selling_price" class="form-control" id="selling_price"
                                autocomplete="off" placeholder="Price" value="{{ $package->selling_price }}">
                        </div>
                        <div class="form-group">
                            @error('regular_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="regular_price">Package Regular Price $$</label>
                            <input type="number" name="regular_price" class="form-control" id="regular_price"
                                autocomplete="off" placeholder="Price" value="{{ $package->regular_price }}">
                        </div>
                        <div class="form-group">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="title">Package Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                autocomplete="off" placeholder="Package Title" value="{{ $package->title }}">
                        </div>
                        <div class="form-group">
                            @error('location')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" id="location"
                                placeholder="Location" value="{{ $package->location }}">
                        </div>
                        <div class="form-group">
                            @error('time')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="time">Day/Time</label>
                            <input type="number" name="time" class="form-control" id="time"
                                autocomplete="off" placeholder="Day/Time" value="{{ $package->time }}">
                        </div>
                        <div class="form-group">
                            @error('person')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="person">Person</label>
                            <input type="number" name="person" class="form-control" id="person"
                                autocomplete="off" placeholder="Person" value="{{ $package->person }}">
                        </div>
                        <div class="form-group">
                            @error('room')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="room">Room</label>
                            <input type="number" name="room" class="form-control" id="room"
                                autocomplete="off" placeholder="Room" value="{{ $package->room }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Package Description" id="description" style="height: 150px" name="description">{{ $package->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="product_img" class="form-label">Product Image</label>
                            <input type="file" class="form-control dropify @error('product_img') is-invalid @enderror"
                                id="product_img" name="product_img" data-default-file="{{ asset('upload/package/' . $package->image) }}">
                            @error('product_img')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="multiple_product_img" class="form-label">Multiple Image</label>
                            <input class="form-control @error('multiple_product_img') is-invalid @enderror"
                                type="file" id="multiple_product_img" name="multiple_product_img[]" multiple>
                            @error('multiple_product_img')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{ route('all.package') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('backend_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

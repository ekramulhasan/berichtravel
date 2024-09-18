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
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Package</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Package</h6>
                    @if (session('package'))
                        <div class="alert alert-success">
                            {{ session('package') }}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{ route('package.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            @error('selling_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputUsername1">Package Selling Price $$</label>
                            <input type="number" name="selling_price" class="form-control" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Price">
                        </div>
                        <div class="form-group">
                            @error('regular_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputUsername1">Package Regular Price $$</label>
                            <input type="number" name="regular_price" class="form-control" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Price">
                        </div>
                        <div class="form-group">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputUsername1">Package Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Package Title">
                        </div>
                        <div class="form-group">
                            @error('location')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputEmail1">Location</label>
                            <input type="text" name="location" class="form-control" id="exampleInputEmail1"
                                placeholder="Location">
                        </div>
                        <div class="form-group">
                            @error('time')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputPassword1">Day/Time</label>
                            <input type="number" name="time" class="form-control" id="exampleInputPassword1"
                                autocomplete="off" placeholder="Day/Time">
                        </div>

                        <div class="form-group">
                            @error('person')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputPassword1">Person</label>
                            <input type="number" name="person" class="form-control" id="exampleInputPassword1"
                                autocomplete="off" placeholder="Person">
                        </div>
                        <div class="form-group">
                            @error('room')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputPassword1">Room</label>
                            <input type="number" name="room" class="form-control" id="exampleInputPassword1"
                                autocomplete="off" placeholder="Room">
                        </div>

                        <div class="mb-3">

                            <div class="form-floating">

                                <textarea
                                    class="form-control @error('description')
                                is-invalid
                                @enderror"
                                    placeholder="Package Description" id="description" style="height: 150px" name="description">
                                </textarea>


                                @error('description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                        </div>
                        {{--
                        <div class="form-group">
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputPassword1">Package Description</label>
                            <textarea name="description" class="form-control" id="ckeybord"></textarea>
                        </div> --}}

                        <div class="mb-3">

                            <label for="product_img" class="form-label">Product Image</label>
                            <input type="file"
                                class="form-control dropify @error('product_img')
                                is-invalid
                            @enderror"
                                id="" name="product_img">

                            @error('product_img')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="multiple_product_img" class="form-label">Multiple Image</label>
                            <input
                                class="form-control @error('multiple_product_img')
                                is-invalid
                            @enderror"
                                type="file" id="multiple_product_img" name="multiple_product_img[]" multiple>

                            @error('multiple_product_img')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputPassword1">Package Image</label>
                            <input type="file" name="image" class="form-control"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div> --}}

                        {{-- <div class="form-group my-3">
                            <img src="" id="blah" alt="" style="width: 70px; height:auto">
                        </div> --}}

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
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
                .create(document.querySelector('#short_description'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>

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

@extends('backend.master')

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
               @foreach ($aboutus as $about)

                <form class="forms-sample" action="{{ route('update.about') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $about->id }}">
                    <div class="form-group">
                        @error('title')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        <label for="exampleInputUsername1">Package Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $about->title }}">
                    </div>

                    <div class="form-group">
                        @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        <label for="exampleInputPassword1">Package Description</label>
                        <textarea  name="description"   class="form-control" id="ckeybord">{{ $about->description }}</textarea>
                    </div>

                    <div class="form-group">
                        @error('image')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        <label for="exampleInputPassword1">Package Image</label>
                        <input type="file" name="image" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>

                    <div class="from-group my-3">
                        <img src="" id="blah" alt="" style="width: 70px; height:auto">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
                @endforeach
       </div>
   </div>
 </div>

@endsection


@section('footer_script')

@if (session('about_updated'))
 <script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "Successfuly Updated",
    showConfirmButton: false,
    timer: 8500
    });
 </script>

@endif
@endsection


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
                <form class="forms-sample" action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @error('selling_price')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        <label for="exampleInputUsername1">Package Selling Price $$</label>
                        <input type="number" name="selling_price" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Price">
                    </div>
                    <div class="form-group">
                        @error('regular_price')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        <label for="exampleInputUsername1">Package Regular Price $$</label>
                        <input type="number" name="regular_price" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Price">
                    </div>
                    <div class="form-group">
                        @error('title')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        <label for="exampleInputUsername1">Package Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Package Title">
                    </div>
                    <div class="form-group">
                        @error('location')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" name="location" class="form-control" id="exampleInputEmail1" placeholder="Location">
                    </div>
                    <div class="form-group">
                        @error('time')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        <label for="exampleInputPassword1">Day/Time</label>
                        <input type="number" name="time" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Day/Time">
                    </div>

                    <div class="form-group">
                        @error('person')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        <label for="exampleInputPassword1">Person</label>
                        <input type="number" name="person" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Person">
                    </div>
                    <div class="form-group">
                        @error('room')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        <label for="exampleInputPassword1">Room</label>
                        <input type="number" name="room" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Room">
                    </div>
                    <div class="form-group">
                        @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        <label for="exampleInputPassword1">Package Description</label>
                        <textarea  name="description" class="form-control" id="ckeybord"></textarea>
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
       </div>
   </div>
 </div>

@endsection

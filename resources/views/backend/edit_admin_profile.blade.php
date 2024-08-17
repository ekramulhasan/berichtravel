@extends('backend.master')

@section('content')
<div class="row">
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edite Your Info</h4>
                @if (session('success'))
                 <div class="alert alert-success">
                  {{ session('success') }}
                  </div>
                @endif
                 <form action="{{ Route('user_update') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Name</label>
                        </div>
                        <div class="col-lg-8">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="form-control"  name="name" id="defaultconfig" type="text" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Email</label>
                        </div>
                        <div class="col-lg-8">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="form-control"  name="email" id="defaultconfig-2" type="email" value="{{ Auth::user()->email }}" >
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit">
                 </form>
            </div>
        </div>
    </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                            <h6 class="card-title">Cheang Your Password</h6>
                            @if (session('success_pass'))
                             <div class="alert alert-success">
                              {{ session('success_pass') }}
                             </div>
                            @endif

                            <form class="forms-sample" action="{{ Route('changes_pass') }}" method="POST">
                                @csrf
                                <div class="form-group">

                                    <label for="exampleInputUsername1">Current Password</label>
                                    @error('current_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="password" name="current_password" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Old Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Confirm Password">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                     </div>
                 </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                                    <h6 class="card-title">Update Your Profile Photo</h6>
                                    @if (session('profile_photo'))
                                     <div class="alert alert-success">
                                      {{ session('profile_photo') }}
                                     </div>
                                    @endif

                                    <form class="forms-sample" action="{{ Route('profile_photo_update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">

                                            <label for="exampleInputUsername1">Profile Photo</label>
                                            @error('profile_photo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="file" name="profile_photo" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                                        <div class="m-4">
                                            <img src="{{ asset('assets/upload/user') }}/{{ Auth::user()->profile_photo }}" alt="" id="blah" style="width: 50%; height:auto;">
                                        </div>
                                    </form>
                             </div>
                         </div>
                    </div>
</div>

@endsection

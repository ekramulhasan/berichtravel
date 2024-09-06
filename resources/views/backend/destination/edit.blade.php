@extends('backend.master')
@section('title') Update destination @endsection

@push('backend_css')

<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

@endpush

@section('content')


    <div class="row">

        <h1>destination update</h1>
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('destination.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to destination

                </a>
            </div>
        </div>

        <div class="col-12 mt-3">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('destination.update',$destination_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label for="country_name" class="form-label">Country Name</label>
                            <input type="text" class="form-control @error('country_name')
                                is-invalid
                            @enderror" id="country_name" placeholder="enter country name" name="country_name" value="{{ $destination_data->country_name }}">

                            @error('client_name')

                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                            @enderror
                          </div>


                          <div class="mb-3">

                            <label for="off_per" class="form-label">Offer Percentag</label>
                            <input type="text" class="form-control @error('off_per')
                                is-invalid
                            @enderror" id="off_per" placeholder="enter client off_per" name="off_per" value="{{ $destination_data->off_per }}">

                            @error('off_per')

                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                            @enderror
                          </div>



                          <div class="mb-3">

                            <label for="country_img" class="form-label">Country Image</label>
                            <input type="file" class="form-control dropify" id="" name="country_img" data-default-file="{{ asset('uploads/destination') }}/{{ $destination_data->img }}">

                            @error('country_img')

                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                            @enderror
                          </div>

                        {{-- <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="category_check" role="switch" name="is_active" checked>
                            <label class="form-check-label" for="category_check">Active/Inactive</label>
                        </div> --}}

                        <button type="submit" class="btn btn-primary mt-2">Update</button>

                    </form>

                </div>

            </div>

        </div>


    </div>



@endsection


@push('backend_js')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
    $('.dropify').dropify();
</script>

@endpush

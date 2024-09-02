@extends('backend.master')
@section('title')
update service
@endsection

@push('backend_css')

@endpush

@section('content')

<div class="row">

    <div class="col">

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Our Service Update</h5>
                <small class="text-muted float-end"><a href="{{ route('our-service.index') }}" class="btn btn-primary"> <i
                            class='bx bx-left-arrow-alt'></i> Back Service List</a></small>
            </div>
            <div class="card-body">
                <form action="{{ route('our-service.update',$service_data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label" for="icon_link">Icon Link</label>
                        <input type="text"
                            class="form-control @error('site_title')
                        is-invalid

                        @enderror"
                            id="icon_link" placeholder="icon link" name="icon_link" value="{{ $service_data->icon_link }}"
                           >

                        @error('icon_link')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="title">Title</label>
                        <input type="text"
                            class="form-control @error('title')
                        is-invalid

                        @enderror"
                            id="title" placeholder="title" name="title" value="{{ $service_data->title }}"
                           >

                        @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="" cols="30" rows="10"
                            class="form-control
                            @error('description')
                                is-invalid
                            @enderror"
                            id="description" >{{ $service_data->description }}</textarea>


                        @error('description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>



    </div>
</div>

@endsection


@push('backend_js')

@endpush

@extends('backend.master')

@section('content')

<div class="row">
    <div class="col-10">
        <div class="details py-4">
            <div class="title">
                <h4>Package Name: {{ $bookingIfno->package->title }}</h4>
            </div>
        </div>
    </div>
</div>


@endsection

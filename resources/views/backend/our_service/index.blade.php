@extends('backend.master')
@section('title')
service show
@endsection

@push('backend_css')

@endpush

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h6 class="card-title">All Our Service</h6>
                    </div>
                    <div class="col-4">
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th># Sl</th>
                                <th>Service Title</th>
                                <th>Service Description</th>
                                <th>Icon Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($service_data as $sl => $service)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>
                                        {{ $service->description }}
                                    </td><td>
                                        {{ $service->icon_link }}
                                    </td>
                                    <td>
                                        <a href="{{ route('our-service.edit',$service->id) }}" class="btn btn-primary btn-icon">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <form action="{{ route('our-service.destroy', $service->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="dropdown-item delete-corfirm btn btn-danger btn-icon del"><i data-feather="trash"></i></button>

                                        </form>
                                    </td>
                                    {{-- {{ route('detele_categorie',$categorie->id) }} --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('backend_js')

@endpush

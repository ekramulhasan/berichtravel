@extends('backend.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="card-title">All Package Table</h6>
                        </div>
                        <div class="col-4">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th># Sl</th>
                                    <th>Package Name</th>
                                    <th>Package Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $sl => $package)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $package->title }}</td>
                                        <td>
                                            <img src="{{ asset('upload/package') }}/{{ $package->image }}"
                                                alt="{{ $package->image }}">
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-icon">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a data-link="{{ route('detele_package', $package->id) }}"
                                                class="btn btn-danger btn-icon del">
                                                <i data-feather="trash"></i>
                                            </a>
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


@section('footer_script')
    <script>
        $('.del').click(function() {
            var link = $(this).attr('data-link');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                }
            });
        });
    </script>
    @if (session('cat_delete'))
        <script>
            Swal.fire({
                title: "Deleted!",
                text: ' {{ session('cat_delete') }}',
                icon: "success"
            });
        </script>
        {{-- <div class="alert alert-success">
 {{ session('cat_delete') }}
</div> --}}
    @endif
@endsection

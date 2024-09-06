@extends('backend.master')
@section('title')
    destination Index
@endsection

@push('backend_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">

    <style>
        .dataTables_length {
            padding: 20px 0;
        }

        /* Dropdown container styling */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Button styling */
        .dropdown-button {
            background-color: #6c757d;
            /* Grey color */
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        /* Dropdown menu styling */
        .dropdown-menu {
            display: none;
            /* Hidden by default */
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
            margin-top: 5px;
            border-radius: 5px;
            padding: 0;
            list-style: none;
            border: 1px solid #ddd;
        }

        /* Dropdown item styling */
        .dropdown-menu li a,
        .dropdown-menu li form button {
            display: block;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            font-size: 14px;
            cursor: pointer;
        }

        .dropdown-menu li a:hover,
        .dropdown-menu li form button:hover {
            background-color: #f1f1f1;
        }

        /* Show the dropdown menu when hovering over the button */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
@endpush

@section('content')
    <div class="row">

        <h1>Destination Table List</h1>

        <div class="col-12">

            <div class="d-flex justify-content-end">
                <a href="{{ route('destination.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>

                    Add New Destination
                </a>

            </div>

        </div>


        <div class="col-12">

            <div class="table-responsive my-2">

                <table class="table table-bordered table-striped" id="my_table">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Country Name</th>
                            <th scope="col">Off Percentag</th>
                            <th scope="col">Image</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($destination_data as $value)
                            <tr>
                                <td scope="row">{{ $destination_data->firstItem() + $loop->index }}</td>
                                <td>{{ $value->country_name }}</td>
                                <td>{{ $value->off_per }}</td>
                                <td>

                                    <img src="{{ asset('uploads/destination') }}/{{ $value->img }}" alt=""
                                        class="img-fluid rounded-circle h-20 w-20">

                                </td>

                                <td>

                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Setting
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('destination.edit', $value->id) }}">
                                                    <i class="fa-regular fa-pen-to-square me-2"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('destination.destroy', $value->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item delete-confirm">
                                                        <i class="fa-regular fa-trash-can me-2"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>


                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>

            </div>

        </div>

    </div>
@endsection


@push('backend_js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}

    <script>
        $(document).ready(function() {

            $('#my_table').DataTable({
                // pagingType: 'first_last_numbers'
            });

            $('.delete-corfirm').click(function(event) {

                let form = $(this).closest('form')

                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })


            })

        });
    </script>
@endpush

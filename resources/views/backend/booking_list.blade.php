@extends('backend.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <div class="row">
           <div class="col-8">
              <h6 class="card-title">All Booking Table</h6>
           </div>
           <div class="col-4">
           </div>
            </div>

              <div class="table-responsive">
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                      <th># Sl</th>
                      <th>Customer Name</th>
                      <th>Customer Email</th>
                      <th>Customer Phone</th>
                      <th>Booking Date </th>
                      <th>Package Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($allBooking as $sl=>$booking)
                    <tr>
                      <td>{{ $sl+1 }}</td>
                      <td>{{ $booking->customer_name }}</td>
                      <td>{{ $booking->customer_email }}</td>
                      <td>{{ $booking->customer_phone }}</td>
                      <td>{{ $booking->checkout_date }}</td>
                      <td>{{ $booking->package->selling_price	 }}</td>
                      <td>
                        <a href="{{ route('booking.details', $booking->id) }}" class="btn btn-primary btn-icon">
                            <i data-feather="edit"></i>
                        </a>
                        @if ($booking->status == 1)
                        <a href="{{ route('prosesing_booking', $booking->id) }}" class="btn btn-danger ">
                           Pending
                        </a>

                       @endif

                       @if ($booking->status == 2)
                       <a href="{{ route('compleate_booking', $booking->id) }}" class="btn btn-danger ">
                          Prosesing
                       </a>
                      @endif
                       @if ($booking->status == 3)
                       <a href="{{ route('compleate_booking', $booking->id) }}" class="btn btn-danger ">
                        Complate
                       </a>
                       @endif
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

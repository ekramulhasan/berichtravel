@extends('backend.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <div class="row">
           <div class="col-8">
              <h6 class="card-title">All Deposit Requst</h6>
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
                      <th>Payment Method</th>
                      <th>Account Number</th>
                      <th>Transaction Id </th>
                      <th>Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($allDeposit as $sl=>$deposit)
                    <tr>
                      <td>{{ $sl+1 }}</td>
                      <td>{{ $deposit->customer->name }}</td>
                      <td>{{ $deposit->payment_method }}</td>
                      <td>{{ $deposit->account_number }}</td>
                      <td>{{ $deposit->transaction_id }}</td>
                      <td>{{ $deposit->amount }}</td>

                      <td>
                        <a href="" class="btn btn-primary btn-icon">
                            <i data-feather="edit"></i>
                        </a>
                        @if ($deposit->status == 1)
                        <a href="{{ route('add.deposit.balance', $deposit->id) }}" class="btn btn-danger ">
                           Pending
                        </a>
                        @else

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


@section('footer_script')

@if (session('balance_added'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "done",
    showConfirmButton: false,
    timer: 8500
  });
</script>

@endif
@endsection



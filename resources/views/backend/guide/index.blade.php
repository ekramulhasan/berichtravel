@extends('backend.master')

@section('content')
 <div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
            <div class="row">
           <div class="col-8">
              <h6 class="card-title">All Categorie Table</h6>
           </div>
           <div class="col-4">
           </div>
            </div>

              <div class="table-responsive">
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                      <th># Sl</th>
                      <th>Gide Name</th>
                      <th>Guide Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ( $all_guide as $sL=>$guide)


                    <tr>
                      <td>{{ $sL+1 }}</td>
                      <td>{{ $guide->name }}</td>
                      <td>
                           <img src="{{ asset('upload/guide') }}/{{ $guide->photo }}" alt="">
                      </td>
                      <td>
                        <a href="" class="btn btn-primary btn-icon">
                            <i data-feather="edit"></i>
                        </a>
                        <a data-link="{{ route('detele_guide',$guide->id) }}" class="btn btn-danger btn-icon del">
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Guide</h4>
                @if (session('guide'))
                <div class="alert alert-success">
                 {{ session('guide') }}
                </div>
               @endif
                <form class="cmxform" id="signupForm" method="POST" action="{{ route('store.guide') }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" name="name" type="text">
                            @error('name')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Designation</label>
                            <input id="name" class="form-control" name="designation" type="text">
                            @error('designation')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input id="name" class="form-control" name="phone" type="number">
                            @error('phone')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>

                        <div class="form-group">
                            <input type="file" id="myDropify" name="photo" class="border"/>
                            @error('photo')
                              <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>

                        <input class="btn btn-primary" type="submit" value="Submit">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
 </div>
@endsection

@section('footer_script')
<script>
 $('.del').click(function(){
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
      text: ' {{ session('guide_delete') }}',
      icon: "success"
    });
 </script>
{{-- <div class="alert alert-success">
 {{ session('cat_delete') }}
</div> --}}
@endif
@endsection

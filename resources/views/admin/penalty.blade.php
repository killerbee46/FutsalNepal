@extends('admin.adminmaster')
@section('title')
Pending Penalties
@endsection
@section('content')
<div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<h2>Pending Penalties</h2>
<table class='table table-striped'>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Penalty</th>
    <th>Action</th>
</tr>
@foreach ($users as $user )
    <tr>
        <td>{{$user->name}}</a></td>
        <td><a class="text no_deco primary" href="mailto:{{$user->email}}">{{$user->email}}</a></td>
        <th><a class="text no_deco primary" href="callto:{{$user->mobile}}">{{$user->mobile}}</a></th>
    <td>{{$user->penalty}}</td>

        {{-- <form method="POST" action="/admin/penalty-clear/{{$user->id}}">
        @csrf
        <td><button class='btn btn-danger'>Clear</button></td>
        </form> --}}

        <td><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cancel-modal">
            Clear
        </button></td>
        <div class="modal fade" id="cancel-modal" tabindex="-1" aria-labelledby="cancelLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="cancelLabel">Clear Penalty</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method='post' action="/admin/penalty-clear/{{$user->id}}">
                    @csrf
                <div class="modal-body">
                    Penalty Pending :<span class="text text-danger"> {{$user->penalty}}</span><br /><br />
                  <label>Amount Paid: </label> <input type="number" min="0" class="form-input col-12" name='paidAmount' placeholder="Enter Amount" >
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    {{-- <form method='post' action="/book-futsal">
                        @csrf
                        <input name='date' value={{ $date }} type="hidden" />
                        <input name='futsal_id' value={{ $futsal->id }} type="hidden" />
                        <input name='booker_id' value={{ Auth::user()->id }} type="hidden" />
                        <input name='time' value={{ $time->time }} type="hidden" />
                        <button class="btn btn-primary">Confirm</button>
                    </form> --}}
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </form>

                </div>
              </div>
            </div>
    </tr>
@endforeach

</table>

</div>
@endsection

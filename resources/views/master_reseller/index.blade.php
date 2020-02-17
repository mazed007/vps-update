@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="title-and-search">
            <h3 class="page-title">Master Resellers</h3>
            <div class="search-user">
                <input class="form-control" id="myInput" type="text" placeholder="Search Reseller..">
            </div>
        </div>
        <table class="table user-table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Limit</th>
                    <th>Available Accounts</th>
                    <th>Change Password</th>
                    <th>Add Limit</th>
                    <th>Remove Limit</th>
                </tr>
            </thead>
            <tbody id="myTable">
				@foreach($resellers as $reseller)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $reseller->user->email }}</td>
						<td>{{ $reseller->limit_accounts }}</td>
						<td></td>
						<td></td>
                        <td></td>
						<td></td>
					</tr>
				@endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


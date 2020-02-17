@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="page-title">Pin List</h3>
            @if(count($pins))
                <table class="table user-table table-bordered">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($pins as $pin)
                            <tr>
                                <td>{{ $pin->user->email }}</td>
                                <td>{{ $pin->created_by }}</td>
                                <td>{{ $pin->created_at }}</td>
                                <td>
                                    @if(!$pin->trashed())
                                        <div class="dropdown">
                                            <button type="button" class="action-btn dropdown-toggle" data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('pin.edit', $pin->id) }}">Edit</a>
                                                <form action="{{ route('pin.destroy', $pin->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>No Pin has been added yet!</strong>
                </div>
            @endif
        </div>
    </div>
@endsection


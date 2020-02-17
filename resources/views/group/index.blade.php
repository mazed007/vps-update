@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="page-title">Group List</h3>
            @if(count($groups))
                <table class="table user-table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>
                                    @if(!$group->trashed())
                                        <div class="dropdown">
                                            <button type="button" class="action-btn dropdown-toggle" data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('group.edit', $group->id) }}">Edit</a>
                                                <form action="{{ route('group.destroy', $group->id) }}" method="post">
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
                    <strong>No VPS has been added yet!</strong>
                </div>
            @endif
        </div>
    </div>
@endsection


@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="page-title">Permission List</h3>
            @if(count($permissions))
                <table class="table user-table table-bordered">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>Group Slug</th>
                            <th>Permission Name</th>
                            <th>Permission Slug</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->group->name }}</td>
                                <td>{{ $permission->group->slug }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->slug }}</td>
                                <td>{{ $permission->created_by }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>
                                    @if(!$permission->trashed())
                                        <div class="dropdown">
                                            <button type="button" class="action-btn dropdown-toggle" data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('permission.edit', $permission->id) }}">Edit</a>
                                                <form action="{{ route('permission.destroy', $permission->id) }}" method="post">
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


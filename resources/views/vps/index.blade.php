@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="page-title">VPS List</h3>
            @if(count($vpsLists))
                <table class="table user-table table-bordered table-sm table-hover">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Server</th>
                            <th>OS</th>
                            <th>VPN</th>
                            <th>Port</th>
                            <th>Expire Date</th>
                            <th>Added By</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($vpsLists as $vps)
                            <tr class="@if($vps->trashed()) bg-warning @endif">
                                <td>{{ $vps->user->email }}</td>
                                <td>
                                    IP: {{ $vps->server_ip }} <br>
                                    Name: {{ $vps->server_name }}
                                </td>
                                <td>{{ $vps->operating_system }}</td>
                                <td>
                                    Type: {{ $vps->vpn_type }} <br>
                                    Connection: {{ $vps->vpn_connection }}
                                </td>
                                <td>{{ $vps->port }}</td>
                                <td>
                                    Added: {{ carbon_only_date($vps->added_date) }} <br>
                                    Expire: {{ carbon_only_date($vps->expired_date) }} <br>
                                    Period: {{ $vps->period }}
                                </td>
                                <td>
                                    At <kbd>{{ carbon_only_date($vps->created_at) }}</kbd> <br> by <kbd>{{ optional($vps->createdBy)->email }}</kbd>
                                </td>
                                {{-- <td>{{ $vps->user->logged_in ? "Active" : "Inactive" }}</td> --}}
                                <td>
                                    @if(!$vps->trashed())
                                        <div class="dropdown">
                                            <button type="button" class="action-btn dropdown-toggle" data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('vps.edit', $vps->id) }}">Edit</a>
                                                <form action="{{ route('vps.destroy', $vps->id) }}" method="post">
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

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-sm-12 col-md-8 col-lg-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="edit-form" action="{{ route('vps.update', $vps->id) }}" method="post">
                @csrf
                @method('put')

                <h5 class="page-title">Edit VPS</h5>

                <div class="row">
                    <div class="col-sm-6">
                        <label>Server IP*</label>
                        <input type="text" name="server_ip" placeholder="Server Ip" value="{{ old('server_ip', $vps->server_ip) }}">
                    </div>
                    <div class="col-sm-6">
                        <label>Server Name (Optional)</label>
                        <input type="text" name="server_name" placeholder="Server Name" value="{{ old('server_name', $vps->server_name) }}">
                    </div>
                    <div class="col-sm-6">
                        <label>Username</label>
                        <input type="text" disabled placeholder="Username" value="{{ old('username', $vps->user->email) }}">
                    </div>
                    <div class="col-sm-6">
                        <label>Update Password</label>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="col-sm-6">
                        <label>Operating System</label>
                        <select name="operating_system" id="operating_system">
                            @foreach(operating_systems() as $value => $type)
                                <option @if(old('operating_system', $vps->getOriginal('operating_system')) == $value) selected @endif value="{{ $value }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Vpn Type</label>
                        <select name="vpn_type" id="vpn_type">
                            @foreach(vpn_types() as $value => $type)
                                <option @if(old('vpn_type', $vps->getOriginal('vpn_type')) == $value) selected @endif value="{{ $value }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>VPN Connection</label>
                        <input type="text" name="vpn_connection" placeholder="VPN Connection" value="{{ old('vpn_connection', $vps->vpn_connection) }}">
                    </div>
                    <div class="col-sm-6">
                        <label>Openconnect Port (Optional)</label>
                        <input type="text" name="port" placeholder="Openconnect Port" value="{{ old('port', $vps->port) }}">
                    </div>
                    <div class="col-sm-6">
                        <label>Period</label>
                        <select name="period" id="period" class="period">
                            @foreach(vps_periods() as $value => $period)
                                <option @if(old('period', $vps->getOriginal('period')) == $value) selected @endif value="{{ $value }}">{{ $period }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>&nbsp;</label>
                        <div class="save-btn text-right">
                            <button type="submit" class="">Update</button>
                        </div>
                    </div>
                </div>

            </form>
            <p>Please do not use special characters like @ ! $ % * / \ | for username or password, Only use alphabet and numbers.</p>
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2"></div>
    </div>
@endsection
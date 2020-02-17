@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8">
        <form class="edit-form" method="post" action="{{ route('trial-vps.store') }}">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <h5 class="page-title">Take A Trial</h5>
            <label>How Many User</label>
            <input type="number" name="number">
            <label>Password</label>
            <input type="password" placeholder="Reseller Password" name="password">
            <div class="save-btn">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
        <p>Please put number of VPN accounts that you liked to create.</p>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
</div>
@endsection
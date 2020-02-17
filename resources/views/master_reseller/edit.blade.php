@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8">
        <form class="edit-form" action="{{ route('master-reseller.update', $reseller->id) }}" method="post">
        	{{ csrf_field() }}
        	{{ method_field('put') }}
            <h5 class="page-title">Edit Master Reseller</h5>
            <label>Available Accounts To Assign</label>
            <input type="text" placeholder="" name="assign" value="{{ $reseller->assign }}">
            <label>Reseller Username</label>
            <input type="text" name="email" value="{{ $reseller->user->email }}">
            <label>Reseller Password</label>
            <input type="password" placeholder="Reseller Password" name="password" value="{{ $reseller->password }}">
            <label>Count Accounts</label>
            <input type="password" placeholder="" name="count_accounts" value="{{ $reseller->count_accounts }}">
            <label>Limited Reseller</label>
            <input type="text" placeholder="" name="limit_reseller" value="{{ $reseller->limit_reseller }}">
            <label>Limited Pin</label>
            <input type="text" placeholder="" name="limit_pin" value="{{ $reseller->limit_pin }}">
            <div class="save-btn">
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
            </div>
        </form>
        <p>Please do not use special characters like @ ! $ % * / \ | for username or password, Only use alphabet and numbers.</p>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
</div>
@endsection


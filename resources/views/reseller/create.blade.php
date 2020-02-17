@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <h3 class="page-title">Add New Reseller</h3>
        <form class="edit-form" method="post" action="{{ route('reseller.store') }}">
        	{{ csrf_field() }}
        	{{ method_field('post') }}
            <label>Username*</label>
            <input type="text" placeholder="Username" name="email" value="{{ old('email') }}">
            <label>Email</label>
            <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
            <label>Password</label>
            <input type="password" placeholder="New Password" name="password">
            <label>Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="confirm_password">
            <div class="buttons text-right">
                <div class="save-btn">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
</div>
@endsection


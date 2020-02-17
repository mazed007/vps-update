@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <h3 class="page-title">Edit Bulk Pin</h3>
        <form class="edit-form" method="post" action="{{ route('bulkpin.update', $pin->id) }}">
        	{{ csrf_field() }}
        	{{ method_field('put') }}
            <label>Email</label>
            <input type="email" placeholder="Email" name="email" value="{{ $pin->user->email }}">
            <label>Password</label>
            <input type="password" placeholder="Confirm Password" name="password">
            <div class="buttons text-right">
                <div class="save-btn">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
</div>
@endsection


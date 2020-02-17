@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <h3 class="page-title">Create Pin</h3>
        <form class="edit-form" method="post" action="{{ route('pin.store') }}">
        	{{ csrf_field() }}
        	{{ method_field('post') }}
            <label>Email</label>
            <input type="email" placeholder="Email" name="email">
            <label>Password</label>
            <input type="password" placeholder="Confirm Password" name="password">
            <label>Billing System</label>
            <select name="period" id="period" class="period">
                @foreach(vps_periods() as $value => $period)
                    <option value="{{ $value }}">{{ $period }}</option>
                @endforeach
            </select>
            <div class="buttons text-right">
                <div class="save-btn">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
</div>
@endsection


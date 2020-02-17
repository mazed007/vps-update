@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <h3 class="page-title">Create Bulk Reseller</h3>
        <form class="edit-form" method="post" action="{{ route('bulk-reseller.store') }}">
        	{{ csrf_field() }}
        	{{ method_field('post') }}
            <label>How Many User</label>
            <input type="number" name="number" value="{{ old('number') }}">
            <label>User Prefix *</label>
            <input type="text" name="prefix" value="{{ old('prefix') }}">
            <div class="save-btn">
                <button type="submit" class="btn btn-primary btn-sm">Create Reseller</button>
            </div>
        </form>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
</div>
@endsection
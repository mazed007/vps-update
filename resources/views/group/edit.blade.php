@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <h3 class="page-title">Update Group</h3>
        <form class="edit-form" method="post" action="{{ route('group.update', $group->id) }}">
        	{{ csrf_field() }}
        	{{ method_field('put') }}
            <label>Group Name*</label>
            <input type="text" placeholder="Group Name" name="name" value="{{ $group->name }}">
            <label>Group Slug (Auto Generated)</label>
            <input type="text" placeholder="" disabled value="{{ $group->slug }}">
            <div class="buttons text-right">
                <div class="save-btn">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
</div>
@endsection


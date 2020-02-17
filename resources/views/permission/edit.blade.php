@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <h3 class="page-title">Update Permission</h3>
        <form class="edit-form" method="post" action="{{ route('permission.update', $permission->id) }}">
        	{{ csrf_field() }}
        	{{ method_field('put') }}
            <label>Group List*</label>
            <select name="group_id" id="group_id">
            	@foreach($groups as $group)
            		<option value="{{ $group->id }}" @if($permission->group->id == $group->id) selected @endif>{{ $group->name }}</option>
            	@endforeach
            </select>
            <label>Permission Name*</label>
            <input type="text" placeholder="Permission Name" name="name" value="{{ $permission->name }}">
            <label>Permission Slug</label>
            <input type="text" placeholder="" disabled value="{{ $permission->slug }}">
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


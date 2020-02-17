<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = \App\Models\Permission::withTrashed()->get();
        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = \App\Models\Group::all();
        return view('permission.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->request->add(['slug' => strtolower(str_replace(' ', '_', $request->input('name')))]);
            $group = \App\Models\Permission::create($request->all());

            array_push($this->messages, 'Permission has been addedd.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return redirect()->route('permission.index');
        } catch (\Exception $e) {
            $status = 0;
            array_push($this->messages, 'Something went wrong');
            session()->flash('flash', [
                'status' => 0,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = \App\Models\Permission::find($id);
        $groups = \App\Models\Group::all();
        return view('permission.edit', compact('permission','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->request->add(['slug' => strtolower(str_replace(' ', '_', $request->input('name')))]);
            $permission = \App\Models\Permission::find($id);
            $permission->name = $request->input('name');
            $permission->slug = $request->input('slug');
            $permission->save();

            array_push($this->messages, 'Permission has been updated.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return redirect()->route('permission.index');
        } catch (\Exception $e) {
            $status = 0;
            array_push($this->messages, 'Something went wrong');
            session()->flash('flash', [
                'status' => 0,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $permission = \App\Models\Permission::find($id);
            $permission->delete();

            array_push($this->messages, 'Permission has been deleted.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return redirect()->route('permission.index');
        } catch (\Exception $e) {
            $status = 0;
            array_push($this->messages, 'Something went wrong');
            session()->flash('flash', [
                'status' => 0,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return back();
        }
    }
}

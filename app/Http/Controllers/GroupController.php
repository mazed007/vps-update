<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = \App\Models\Group::withTrashed()->get();
        return view('group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
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
            $group = \App\Models\Group::create($request->all());

            array_push($this->messages, 'Group has been addedd.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return redirect()->route('group.index');
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
        $group = \App\Models\Group::find($id);
        return view('group.edit', compact('group'));
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
            $group = \App\Models\Group::find($id);
            $group->name = $request->input('name');
            $group->slug = $request->input('slug');
            $group->save();

            array_push($this->messages, 'Group has been updated.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return redirect()->route('group.index');
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
            $group = \App\Models\Group::find($id);
            $group->delete();

            array_push($this->messages, 'Group has been deleted.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return redirect()->route('group.index');
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

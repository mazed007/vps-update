<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resellers = \App\Models\MasterReseller::withTrashed()->get();

        return view('master_reseller.index', compact('resellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_reseller.create');
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
            \DB::beginTransaction();
            $inputs = $request->all();
            $inputs['activated'] = true;
            $name = explode('@', $inputs['email']);
            $name = $name[0];
            $inputs['name'] = $name;

            $user = \App\Models\User::create($inputs);
            $inputs['user_id'] = $user->id;
            $vps = \App\Models\MasterReseller::create($inputs);

            array_push($this->messages, 'Master Reseller has been addedd.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);

            \DB::commit();
            return redirect()->route('master-reseller.index');
        } catch (\Exception $e) {
            $status = 0;
            array_push($this->messages, 'Something went wrong');
            session()->flash('flash', [
                'status' => 0,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);

            \DB::rollBack();
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
        $reseller = \App\Models\MasterReseller::find($id);
        return view('master_reseller.edit', compact('reseller'));
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
            $inputs = $request->all();
            $reseller = \App\Models\MasterReseller::find($id);

            $name = explode('@', $inputs['email']);
            $name = $name[0];
            $inputs['name'] = $name;

            $user = $reseller->user;

            $user->email = $inputs['email'];
            $user->password = $inputs['password'];
            $user->save();

            $reseller->assign = $inputs['assign'];
            $reseller->count_accounts = $inputs['count_accounts'];
            $reseller->limit_reseller = $inputs['limit_reseller'];
            $reseller->limit_pin = $inputs['limit_pin'];
            $reseller->save();

            array_push($this->messages, 'Master Reseller has been updated.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return redirect()->route('master_reseller.index');
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
            $reseller = \App\Models\MasterReseller::find($id);
            
            $user = $reseller->user;
            $user->activated = false;
            $user->save();

            $reseller->delete();

            array_push($this->messages, 'Master Reseller has been deleted.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return redirect()->route('master_reseller.index');
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

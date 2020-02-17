<?php

namespace App\Http\Controllers\Vps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VpsRequest;

class VpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vpsLists = \App\Models\Vps::withTrashed()
                    ->with(['user', 'createdBy'])
                    ->get();

        // dd($vpsLists->toArray());

        return view('vps.index', compact('vpsLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VpsRequest $request)
    {
        try {
            \DB::beginTransaction();

            $inputs = $request->all();
            $inputs['activated'] = true;
            $inputs['email'] = $inputs['username'];
            $name = explode('@', $inputs['username']);
            $name = $name[0];
            $inputs['name'] = $name;
            $inputs['expired_date'] = \Carbon\Carbon::now()->addMonths($inputs['period']);
            $inputs['added_date'] = \Carbon\Carbon::now();
            $inputs['password'] = bcrypt($inputs['password']);
            $inputs['created_by'] = auth()->user()->id;

            $user = \App\Models\User::create($inputs);
            $inputs['user_id'] = $user->id;
            $vps = \App\Models\Vps::create($inputs);

            array_push($this->messages, 'VPS has been addedd.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);

            \DB::commit();
            return redirect()->route('vps.index');
        } catch (\Exception $e) {
            $status = 0;
            array_push($this->messages, 'Something went wrong');
            session()->flash('flash', [
                'status' => $status,
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
        $vps = \App\Models\Vps::find($id);
        return view('vps.edit', compact('vps'));
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
            \DB::beginTransaction();

            $inputs = $request->all();
            $vps = \App\Models\Vps::find($id);

            $inputs['expired_date'] = \Carbon\Carbon::now()->addMonths($inputs['period']);
            $inputs['updated_by'] = auth()->user()->id;

            if ($inputs['password']) {
                $name = explode('@', $inputs['username']);
                $name = $name[0];
                $inputs['name'] = $name;

                $user = $vps->user;
                // $user->email = $inputs['username'];
                $user->password = bcrypt($inputs['password']);
                // $user->name = $name;
                $user->save();
            }

            $vps->update($inputs);

            array_push($this->messages, 'VPS has been updated.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);

            \DB::commit();
            return redirect()->route('vps.index');
        } catch (\Exception $e) {
            $status = 0;
            array_push($this->messages, 'Something went wrong');
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);

            \DB::rollBack();
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
            $vps = \App\Models\Vps::find($id);

            $user = $vps->user;
            $user->activated = false;
            $user->save();

            $vps->delete();

            array_push($this->messages, 'VPS has been deleted.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);
            return redirect()->route('vps.index');
        } catch (\Exception $e) {
            array_push($this->messages, 'Something went wrong');
            session()->flash('flash', ['status' => 0, 'messages' => $this->messages]);
            return back();
        }
    }
}

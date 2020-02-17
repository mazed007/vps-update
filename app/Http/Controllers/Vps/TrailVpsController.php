<?php

namespace App\Http\Controllers\Vps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrailVpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vps.trial');
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
            $inputs = $request->all();
            
            for ($i=0; $i < $inputs['number']; $i++) { 
                $inputs['activated'] = true;
                $inputs['username'] = unique_code()."@demo.com";
                $inputs['email'] = $inputs['username'];
                $name = explode('@', $inputs['username']);
                $name = $name[0];
                $inputs['name'] = $name;
                $inputs['expired_date'] = \Carbon\Carbon::now()->addMonths(1);
                $inputs['added_date'] = \Carbon\Carbon::now();
                $inputs['period'] = 1;

                $user = \App\Models\User::create($inputs);
                $inputs['user_id'] = $user->id;
                $vps = \App\Models\Vps::create($inputs);
            }


            array_push($this->messages, 'VPS has been addedd.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

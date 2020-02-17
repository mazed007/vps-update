<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BulkResellerController extends Controller
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
        return view('bulkreseller.create');
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
            
            for ($i=0; $i < $inputs['number']; $i++) { 
                $inputs['activated'] = true;
                $inputs['email'] = $inputs['prefix'].'_'.unique_code(6)."@demo.com";
                $name = explode('@', $inputs['email']);
                $inputs['name'] = $name[0];
                $inputs['password'] = "123456";

                $user = \App\Models\User::create($inputs);
                $inputs['user_id'] = $user->id;
                $vps = \App\Models\Reseller::create($inputs);
            }


            array_push($this->messages, 'Bulk Reseller has been addedd.');
            $status = 1;
            session()->flash('flash', [
                'status' => $status,
                'messages' => $this->messages,
                'class' => config("app.alart.class.{$status}"),
                'header' => config("app.alart.header.{$status}")
            ]);

            \DB::commit();
            return redirect()->route('reseller.index');
        } catch (\Exception $e) {
            array_push($this->messages, 'Something went wrong');
            session()->flash('flash', ['status' => 0, 'messages' => $this->messages]);

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

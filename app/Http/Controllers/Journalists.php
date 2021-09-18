<?php

namespace App\Http\Controllers;

use App\Models\Journalist;
use Illuminate\Http\Request;


class Journalists extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jrnlst = new Journalist;
        $data  = $request->all();

        $jrnlst->name = $data['name'];
        $jrnlst->email = $data['email'];
        $jrnlst->password = $data['password'];

        $jrnlst->save();
        return response()->json([
            "message"=>"journalist added"
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $journalist = Journalist::find($id);
        return response()->json([
           $journalist,200
        ]);
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
    public function update(Request $data, $id)
    {
        
        $jrnlst = Journalist::find($id);
        
        $jrnlst->name = $data['name'];
        $jrnlst->email = $data['email'];
        

        $jrnlst->save();

        return response("Updated successfully",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Journalist::find($id)->delete();
        return response("user deleted",200);
    }
}

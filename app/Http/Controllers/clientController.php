<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Clients::all(['id','name','address','phone']);
        return response()->json($categories);
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
        // dd("ghfshgdfsghd");
        $Clients = Clients::create($request->post());
        return response()->json([
            'message'=>'Client Created Successfully!!',
            'category'=>$Clients
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $Clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $Clients,$id)
    {
        $clientDetails = Clients::select('*')->where('id','=',$id)->first();

        return response()->json($clientDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $Clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $Clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $Clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $Clients,$id)
    {
        $requestData = $request->post();
        unset($requestData['_method']);
        $Clients->where('id','=',$id)->update($requestData);

        return response()->json([
            'message'=>'Client Updated Successfully!!',
            'category'=>$Clients
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $Clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $Clients,$id)
    {
        Clients::where('id',$id)->delete();

        return response()->json([
            'message'=>'Client Deleted Successfully!!'
        ]);
    }

    public function getClients(Request $request)
    {
        $data = Clients::where('name', 'LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data); 
    }

}

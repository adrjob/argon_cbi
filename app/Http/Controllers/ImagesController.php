<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Clients;
use Illuminate\Http\Request;

class ImagesController extends Controller
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
    public function store(Request $request, $id)
    {
        if($request->file('document')) {  
            
            $client = Clients::find($id);
            $file = $request->file('document');                       
            $filename = $request->get('name')."_".date('mdYhisa').".".$file->getClientOriginalExtension();
            dd($request->get('name'));
            $images = Images::create([
                "name" => $filename,
                "program_id" => $request->get('program_id'),
                "client_id" => $id,
                "type" => $request->get('type'),
                "doc_id" => $request->get('doc_id'),
                "href" => $file->storeAs($client->id, $filename, 'client'),
            ]);

            return redirect()->route('clients.show', $client->id)->with('succes', 'Document succesfully saved');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        //
    }
}

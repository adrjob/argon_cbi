<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Role;
use App\Models\User;
use App\Models\Programs;
use App\Models\Documents;
use App\Models\Images;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clients $clients)
    {
        return view('clients.index', ['clients' => $clients->all()]);
    }

    public function index2(Clients $clients, $id)
    {
        $clients = Clients::where('program_id', $id)->get();
        
        return view('clients.index', compact('clients'));        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $residency = Programs::where('type', 0)->get();
        $citizenship = Programs::where('type', 1)->get();
        
        return view('clients.create', compact('roles', 'residency', 'citizenship'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $program = Programs::find($request->get('program_id'));

       
        $clients = Clients::create([
            'name' => $request->get('name'),
            'spouse' => $request->get('spouse'),
            'child1' => $request->get('child1'),
            'child2' => $request->get('child2'),
            'child3' => $request->get('child3'),
            'child4' => $request->get('child4'),
            'child5' => $request->get('child5'),
            'child6' => $request->get('child6'),
            'program_id' => $request->get('program_id'),
            'program_name' => $program->name,
            'sub_agent' => auth()->user()->id,
        ]);

        return redirect()->route('clients', ['clients' => $clients->all()])->with('succes', 'Client succesfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $clients = Clients::find($id);
        $documents = Documents::with(['images' => function ($query) {
            $clients = Clients::find(request()->id);
            $query->where('program_id', 'like', $clients->program_id);
        }])->get();
        
        $images = Images::where('client_id', $clients->id)->get();
        // $documents = Documents::where('program_id', $clients->program_id)->get();
        return view('clients.show', compact('documents', 'clients', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients, $id)
    {
        $client = Clients::find($id);
        $sub_agent = User::find($client->sub_agent);
        return view ('clients.edit', compact('client', 'sub_agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clients = Clients::find($id);
        $clients ->update([
            'name' => $request->get('name'),
            'spouse' => $request->get('spouse'),
            'child1' => $request->get('child1'),
            'child2' => $request->get('child2'),
            'child3' => $request->get('child3'),
            'child4' => $request->get('child4'),
            'child5' => $request->get('child5'),
            'child6' => $request->get('child6'),            
        ]);

        return redirect()->route('clients.edit', $id)->with('succes', 'Client succesfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Programs $programs)
    {
        return view('programs.index', ['programs' => $programs->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $rand_id = rand(1,9999);
        
        $programs = Programs::create([
            'name' => $request->get('name'),
            'type' => $request->get('type'),      
            'program_id' => $rand_id,      
        ]);        

        return redirect()->back()->with('succes', 'Program succesfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function show(Programs $programs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Programs::find($id);
        return view('programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $program = Programs::find($id);

        $program->update([
            'name' => $request->get('name'),
            'type' => $request->get('type')
        ]);

        if($request->file('flag')) {
            $program->update([
                'flag' => $request->file('flag')->store('/', 'flags')
            ]);
        }

        return redirect()->route('programs')->with('succes', 'User succesfully saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programs $programs)
    {
        //
    }
}

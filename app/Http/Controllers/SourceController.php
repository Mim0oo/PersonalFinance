<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\source;
use Illuminate\Support\Facades\Validator;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = source::all()->sortByDesc("id");
        return \View::make('source.index', compact('sources'

            )); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('source._form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Validate the request...
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3,max:255|unique:source,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $source = new source;
        $source->name = $validated['name'];

        # Save request
        $source->save();

        # Display message for successfull database save
        session()->flash('alert', ['success', 'You have successfully added a new income source: '.$source->name.'!']);

        # Return to index view
        return redirect()->route('source.index');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3,max:255|unique:source,name,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $source = source::find($id);
        $source->name = $validated['name'];
        $source->save();

        session()->flash('alert', ['success', 'You have successfully updated income source: '.$source->name.'!']);

        return redirect()->route('source.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        # Destroy the requested row
        source::destroy($id);

        # Display message for successfull database save
        session()->flash('alert', ['warning', 'You have deleted source ('.$id.')!']);

    }
}

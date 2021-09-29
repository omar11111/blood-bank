<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordes=Governorate::paginate(15);
      
        
        return view('governorates.index')->with('recordes',$recordes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate(['name'=>'required|unique:governorates,name|alpha'],$request->all());
       
       
        if (!$validator) {
         
            return  view('governorates.create')->with('errors',$validator);

        }

        $record=Governorate::create($request->all());
        

        // flash()->success('success');
        return redirect(route('governorate.index'));
     
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $governorate=Governorate::findOrFail($id);
        return view('governorates.edit')->with('governorate',$governorate);
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
        // $validator = 
        // $request->validate(
        //     ['name'=>'required|unique:governorates,name|alpha'],$request->all());
       
       
        // if (!$validator) {
        //     dd($validator);
        //     return  view('governorates.edit')->with('errors',$validator);

        // }
        $governorate=Governorate::findOrFail($id);
        $governorate->update($request->except(['_token']));
        return redirect(route('governorate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $governorate=Governorate::findOrFail($id);
        $governorate->delete();
        return back();
    }
}

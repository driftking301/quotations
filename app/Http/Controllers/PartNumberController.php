<?php

namespace App\Http\Controllers;

use App\Models\PartNumber;
use Illuminate\Http\Request;

class PartNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partNumberData['partnumbers']=PartNumber::paginate(15);
        return view('partnumber.index', $partNumberData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partnumber.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=[
            'sheetname'=>'required|string|max:100',
            'partnumber'=>'required|string|max:100',
            'description'=>'required|string|max:100',
            'unitmeasure'=>'required|string|max:100',
        ];
        $message=[
            'sheetname'=>'Sheet name is required',
            'partnumber'=>'Part number is required',
            'description'=>'Description is required',
            'unitmeasure'=>'Unit Measure is required'
        ];
        $this->validate($request, $fields, $message);
        $partnumber = new PartNumber();
        $partnumber->sheetname = request()->input('sheetname');
        $partnumber->partnumber = request()->input('partnumber');
        $partnumber->description = request()->input('description');
        $partnumber->unitmeasure = request()->input('unitmeasure');
        $partnumber->save();
        return redirect(route('partnumber.index'))->with('message', 'Part Number added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PartNumber $partNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partnumber=PartNumber::findOrFail($id);
        return view('partnumber.edit', compact('partnumber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $fields=[
            'sheetname'=>'required|string|max:100',
            'partnumber'=>'required|string|max:100',
            'description'=>'required|string|max:100',
            'unitmeasure'=>'required|string|max:100',
        ];
        $message=[
            'sheetname'=>'Sheet name is required',
            'partnumber'=>'Part number is required',
            'description'=>'Description is required',
            'unitmeasure'=>'Unit Measure is required'
        ];
        $this->validate($request, $fields, $message);

        $partNumberData = request()->except(['_token', '_method']);
        PartNumber::where('id', '=', $id)->update($partNumberData);
        return redirect(route('partnumber.index'))->with('message', 'Part number updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PartNumber::destroy($id);
        return redirect(route('partnumber.index'))->with('message', 'Part number deleted successfully');
    }
}

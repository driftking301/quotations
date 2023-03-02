<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $quotationData['quotations']=Quotation::paginate(5);
        return view('quotation.index', $quotationData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quotation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $quotation = new Quotation;
        $quotation->name = request()->input('name');
        $quotation->description = request()->input('description');
        $quotation->save();
        return redirect('quotation')->with('message', 'Quotation added successful');

        /*
         * validate and upload file to uploads directory
         * if($request->hasFile('image')){
            $quotationData['image']=$request->file('image')->store('uploads', 'public');
        }*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quotation=Quotation::findOrFail($id);
        return view('quotation.edit', compact('quotation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $quotationData = request()->except(['_token','_method']);
        Quotation::where('id', '=', $id)->update($quotationData);
        return redirect('/quotation/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Quotation::destroy($id);
        return redirect('quotation')->with('message','Quotation deleted successfully');
    }
}

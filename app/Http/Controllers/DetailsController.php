<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Laser;
use App\Models\PartNumber;
use App\Models\Quotation;
use App\Models\Weld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('details.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Details $details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Details $details, String $id)
    {
        $quotation = Quotation::find($id);
        $partnumbers = PartNumber::all();
        $welds = Weld::all();
        $lasers = Laser::all();

        $jsonFilePath = storage_path('\processes.json');
        $jsonString = File::get($jsonFilePath);
        $jsonData = json_decode($jsonString, true);

        return view('details.edit', compact('partnumbers', 'quotation', 'welds', 'lasers', 'jsonData'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Details $details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Details $details)
    {
        //
    }
}

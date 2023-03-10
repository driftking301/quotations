<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Laser;
use App\Models\PartNumber;
use App\Models\Quotation;
use App\Models\Weld;
use Illuminate\Http\Request;

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
        $details = [];
        $quotation_id = $request->input('quotation_id');
        $partnumbers = $request->input('partnumber_select');
        $descriptions = $request->input('description');
        $widths = $request->input('width');
        $lengths = $request->input('length');
        $quantities = $request->input('quantity');
        $bars = $request->input('bar');
        $lasers = $request->input('laser');
        $weldings = $request->input('welding');
        $presses = $request->input('press');
        $saws = $request->input('saw');
        $drills = $request->input('drill');
        $cleans = $request->input('clean');
        $paints = $request->input('paint');
        $pipe_threads = $request->input('pipethread');
        $pipe_engages = $request->input('pipeengage');
        $press_setups = $request->input('presssetup');
        $totals = $request->input('total');

        if (!empty($partnumbers)) {
            for ($i = 0; $i < count($partnumbers); $i++) {
                if (!empty($partnumbers[$i])) {
                    $details[] = [
                        'partnumber' => $partnumbers[$i],
                        'description' => $descriptions[$i] ?? null,
                        'width' => $widths[$i] ?? null,
                        'length' => $lengths[$i] ?? null,
                        'quantity' => $quantities[$i] ?? null,
                        'bar' => $bars[$i] ?? null,
                        'laser' => $lasers[$i] ?? null,
                        'welding' => $weldings[$i] ?? null,
                        'press' => $presses[$i] ?? null,
                        'saw' => $saws[$i] ?? null,
                        'drill' => $drills[$i] ?? null,
                        'clean' => $cleans[$i] ?? null,
                        'paint' => $paints[$i] ?? null,
                        'pipethread' => $pipe_threads[$i] ?? null,
                        'pipeengage' => $pipe_engages[$i] ?? null,
                        'presssetup' => $press_setups[$i] ?? null,
                        'total' => $totals[$i] ?? null,
                        'quotation_id' => $quotation_id, // se usa la variable definida arriba
                    ];
                }
            }
        }

        if (!empty($details)) {
            Details::insert($details);
        }

        return redirect()->route('quotation.index');
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
        return view('details.edit', compact('partnumbers', 'quotation', 'welds', 'lasers'));

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

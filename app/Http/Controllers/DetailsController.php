<?php

namespace App\Http\Controllers;

use App\Internal\Holes;
use App\Models\Details;
use App\Models\Quotation;
use App\Models\PartNumber;
use Illuminate\Http\Request;
use App\Internal\PriceLineData;
use App\Internal\PriceQuotation;
use App\Internal\PartNumberPrice;
use App\Internal\ProcessesManager;
use App\Internal\ProcessesSettings;
use App\Internal\PriceLineCalculations;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Quotation $quotation)
    {
        $details = Details::with('partnumber')->whereBelongsTo($quotation)->get();
        return view('details.index', [
            'quotation' => $quotation,
            'details' => $details,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Quotation $quotation)
    {
        return view('details.create', [
            'quotation' => $quotation,
            'partnumbers' => PartNumber::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, Quotation $quotation)
    {
        // dd($request->toArray());
        $fields=[
            'part_number_id'=>'required|int|min:1',
            'width'=>'required|int|max:100',
            'length'=>'required|numeric|max:100',
            'quantity'=>'required|numeric|max:100',
        ];
        $message=[
            'partnumber.required'=>'Part number is required',
            'width.required'=>'Width is required',
            'length.required'=>'Length is required',
            'quantity.required'=>'Quantity is required',
        ];
        // $this->validate($request, $fields, $message);

        $details = new Details();
        $details->quotation_id = $quotation->id;
        $details->part_number_id = $request->input('part_number_id');
        $details->description = $request->input('description');
        $details->width = $request->input('width');
        $details->length = $request->input('length');
        $details->quantity = $request->input('quantity');
        $details->factor = $request->input('factor');
        $details->laser = $request->input('laser');
        $details->custom_price = $request->input('custom_price');
        $details->holes = $request->input('holes') ?: [];
        $details->welding = $request->input('welding');
        $details->press = $request->input('press');
        $details->saw = $request->input('saw');
        $details->drill = $request->input('drill');
        $details->clean = $request->input('clean');
        $details->paint = $request->input('paint');
        $details->pipe_thread = $request->input('pipe_thread');
        $details->pipe_engage = $request->input('pipe_engage');
        $details->press_setup = $request->input('press_setup');
        $details->total = $request->input('total');
        $details->save();

        return redirect(route('quotation.details.index', $quotation))
            ->with('message', 'Part number added to quotation successfully');
    }

    public function calculate(Quotation $quotation, Request $request)
    {
        $partNumberInput = strval($request->input('part_number_id'));
        $partNumber = PartNumber::find($partNumberInput);
        if ($partNumber) {
            $partNumberPrice = new PartNumberPrice(
                0 === strcasecmp($partNumber->unitmeasure, 'pounds'),
                floatval($partNumber->per_sq_inch),
                floatval($partNumber->price),
            );
        } else {
            $partNumberPrice = new PartNumberPrice(false, 0, 0);
        }

        $holes = Holes::fromArrayValues(
            $request->input('holes_diameter') ?: [],
            $request->input('holes_quantity') ?: [],
        );

        $line = new PriceLineData(
            intval($request->input('width', 0)),
            intval($request->input('length', 0)),
            intval($request->input('quantity', 0)),
            floatval($request->input('factor', 0)),
            $partNumberPrice,
            $holes,
            intval($request->input('welding', 0)),
            intval($request->input('press', 0)),
            intval($request->input('saw', 0)),
            intval($request->input('drill', 0)),
            intval($request->input('clean', 0)),
            intval($request->input('paint', 0)),
            intval($request->input('pipe_thread', 0)),
            intval($request->input('pipe_engage', 0)),
            intval($request->input('press_setup', 0)),
        );

        $quotationPrices = $quotation->toArray();
        $overrideLaserPrice = floatval($request->input('custom_price', 0));
        if ($overrideLaserPrice > 0.001) {
            $quotationPrices['laser'] = $overrideLaserPrice;
        }

        $processesManager = new ProcessesManager();
        $settings = $processesManager->settingsWithValues($quotationPrices);
        $processesSettings = new ProcessesSettings($settings);

        $priceQuotation = new PriceQuotation($processesSettings);
        $result = $priceQuotation->calculateLine($line);

        return response()->json($result);
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
    public function edit(Quotation $quotation, string $id)
    {

        $detail = Details::findOrFail($id);
        return view('client.edit', compact('detail'));
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
    public function destroy(Details $detail)
    {
        $detail->delete();
        return redirect(route('details.index'))->with('message', 'Part number deleted successfully');
    }
}

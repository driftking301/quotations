<?php

namespace App\Http\Controllers;

use App\Internal\Holes;
use App\Models\Details;
use App\Models\Quotation;
use App\Models\PartNumber;
use Illuminate\Http\Request;
use App\Internal\PriceLineData;
use Illuminate\Validation\Rule;
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
        $fields = [
            'part_number_id' => ['required', 'int', 'min:1', Rule::exists(PartNumber::class, 'id')],
            'quantity' => 'required|int|min:1',
        ];
        $message = [
            'part_number_id.required' => 'Part number is required',
            'quantity.required' => 'Quantity is required',
        ];
        $this->validate($request, $fields, $message);

        $details = new Details();
        $details->quotation_id = $quotation->id;
        $details->part_number_id = $request->input('part_number_id');
        $details->description = (string) $request->input('description');
        $details->width = (int) $request->input('width', 0);
        $details->length = (int) $request->input('length', 0);
        $details->quantity = (int) $request->input('quantity');
        $details->factor = (float) $request->input('factor');
        $details->laser = (float) $request->input('laser');
        $details->custom_laser_price = (float) $request->input('custom_laser_price');
        $details->holes = $request->input('holes') ?: [];
        $details->welding = (int) $request->input('welding');
        $details->press = (int) $request->input('press');
        $details->saw = (int) $request->input('saw');
        $details->drill = (int) $request->input('drill');
        $details->clean = (int) $request->input('clean');
        $details->paint = (int) $request->input('paint');
        $details->pipe_thread = (int) $request->input('pipe_thread');
        $details->pipe_engage = (int) $request->input('pipe_engage');
        $details->press_setup = (int) $request->input('press_setup');
        $details->total = $this->calculateLineFromRequest($quotation, $request)->amountTotal;
        $details->save();

        return redirect(route('quotation.details.index', $quotation))
            ->with('message', 'Part number added to quote successfully');
    }

    public function calculate(Quotation $quotation, Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->calculateLineFromRequest($quotation, $request);
        return response()->json($result);
    }

    private function calculateLineFromRequest(Quotation $quotation, Request $request): PriceLineCalculations
    {
        $partNumberInput = strval($request->input('part_number_id'));
        $partNumber = PartNumber::find($partNumberInput);
        if ($partNumber) {
            $partNumberPrice = new PartNumberPrice(
                $partNumber->isUnitOfMeasurePounds(),
                $partNumber->getPricePerSquareInch(),
                $partNumber->getPricePerUnit(),
                floatval($partNumber->price),
            );
        } else {
            $partNumberPrice = new PartNumberPrice(false, 0, 0, 0);
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
            floatval($request->input('custom_laser_price', 0)),
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

        $processesManager = new ProcessesManager();
        $settings = $processesManager->settingsWithValues($quotation->toArray());
        $processesSettings = new ProcessesSettings($settings);

        $priceQuotation = new PriceQuotation($processesSettings);
        return $priceQuotation->calculateLine($line);
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
    public function destroy(Quotation $quotation, Details $detail)
    {
        $detail->delete();
        return redirect(route('quotation.details.index', $quotation))->with('message', 'Part number deleted successfully');
    }
}

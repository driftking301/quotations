<?php

namespace App\Http\Controllers;

use App\Internal\Holes;
use App\Internal\PartNumberPrice;
use App\Internal\PriceLineCalculations;
use App\Internal\PriceLineData;
use App\Internal\PriceQuotation;
use App\Internal\ProcessesManager;
use App\Internal\ProcessesSettings;
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
    public function index(Quotation $quotation, ProcessesManager $processesSettings, Details $details)
    {
        $quotation = Quotation::findOrFail($quotation->id);
        return view('details.index', [
            'partnumbers' => PartNumber::all(),
            'quotation' => $quotation,
            'details' => $quotation->details,
            'processesSettings' => $processesSettings->defaultSettings(),
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
            'partnumber'=>'required|string|max:100',
            'width'=>'required|string|max:100',
            'length'=>'required|numeric|max:100',
            'quantity'=>'required|numeric|max:100',
        ];
        $message=[
            'partnumber.required'=>'Part number is required',
            'width.required'=>'Width is required',
            'length.required'=>'Length is required',
            'quantity.required'=>'Quantity is required',
        ];
        $this->validate($request,$fields,$message);

        $details = new Details();
        $details->quotation_id = $request->input('quotation_id');
        $details->partnumber = $request->input('partnumber');
        $details->description = $request->input('description');
        $details->width = $request->input('width');
        $details->length = $request->input('length');
        $details->quantity = $request->input('quantity');
        $details->factor = $request->input('factor');
        $details->laser = $request->input('laser');
        $details->custom_price = $request->input('custom_price');
        $details->holes = $request->input('holes');
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
        $logger = logger()->getLogger();
        $logger->debug(print_r(['$request->all()' => $request->all()], true));

        $partNumberInput = strval($request->input('partnumber'));
        $partNumber = PartNumber::find($partNumberInput);
        if (! $partNumber) {
            return PriceLineCalculations::empty();
        }

        $partNumberPrice = new PartNumberPrice(
            strcasecmp($partNumber->unitmeasure, 'pounds'),
            $partNumber->price,
            $partNumber->price, // todo
        );

        $holes = new Holes();

        $line = new PriceLineData(
            intval($request->input('width', 0)),
            intval($request->input('length', 0)),
            intval($request->input('quantity', 0)),
            floatval($request->input('factor', 0)),
            $partNumberPrice,
            $holes,
            intval($request->input('weld', 0)),
            intval($request->input('press', 0)),
            intval($request->input('saw', 0)),
            intval($request->input('drilling', 0)),
            intval($request->input('cleaning', 0)),
            intval($request->input('painting', 0)),
            intval($request->input('pipeThread', 0)),
            intval($request->input('pipeEngage', 0)),
            intval($request->input('pressSetUp', 0)),
        );
        $processesManager = new ProcessesManager();
        $settings = $processesManager->defaultSettings();
        foreach ($settings as $key => $value) {
            $settings[$key]['price'] = $quotation->{$key};
        }
        $processesSettings = new ProcessesSettings($settings);

        $priceQuotation = new PriceQuotation($processesSettings);
        $result = $priceQuotation->calculateLine($line);

        return $result->amountTotal;
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
    public function edit(Quotation $quotation, String $id)
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

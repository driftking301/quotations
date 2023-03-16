<?php

namespace App\Http\Controllers;

use App\Internal\ProcessesSettings;
use App\Models\Client;
use App\Models\PartNumber;
use App\Models\Quotation;
use App\Models\Weld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;


class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotations = Quotation::with('client')->paginate(15);
        return view('quotation.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Client::all();
        return view('quotation.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ProcessesSettings $processesSettings)
    {
        $fields=[
          'name'=>'required|string|max:100',
          'client_id'=>'required|string|max:200', // que exista en la base de datos
          'date'=>'required|string|max:200',
          'description'=>'required|string|max:200',
        ];
        $message=[
            'name.required'=>'Name is required',
            'client.required'=>'Client is required',
            'date.required'=>'Date is required',
            'description.required'=>'Description is required',
        ];
        $this->validate($request,$fields,$message);

        $quotation = new Quotation;
        $quotation->name = request()->input('name');
        $quotation->client_id = request()->input('client_id');
        $quotation->date = request()->input('date');
        $quotation->description = request()->input('description');
        foreach ($processesSettings->defaultSettings() as $key => $values) {
            $quotation->{$key} = $values['price'];
        }
        $quotation->save();
        return redirect(route('quotation.details.index', $quotation))->with('message', 'Quote added successfully');
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
    public function edit(Quotation $quotation)
    {
        $customers = Client::all();
        return view('quotation.edit', compact('quotation', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotation $quotation)
    {
        $fields=[
            'name'=>'required|string|max:100',
            'client_id'=> 'required',Rule::exists('clients', 'id'), '|string|max:100', // comprobar que exista
            'date'=>'required|string|max:200',
            'description'=>'required|string|max:200',
        ];
        $message=[
            'name.required'=>'Name is required',
            'client_id.required'=>'Client is required',
            'date.required'=>'Date is required',
            'description.required'=>'Description is required'
        ];
        $this->validate($request, $fields, $message);

        $quotationData = $request->except(['_token','_method']);
        $quotation->update($quotationData);
        return redirect(route('quotation.details.index', $quotation))->with('message','Quote updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProcesses(Quotation $quotation, ProcessesSettings $processesSettings)
    {
        return view('quotation.edit-processes', [
            'quotation' => $quotation,
            'processesSettings' => $processesSettings->defaultSettings(),
        ]);
    }

    public function updateProcesses(Request $request, Quotation $quotation, ProcessesSettings $processesSettings)
    {
        $fields = [];
        $messages = [];
        $defaultSettings = $processesSettings->defaultSettings();
        foreach ($defaultSettings as $key => $values) {
            $fields[$key] = 'required|string';
            $messages[$key . '.required'] = sprintf('%s is required', $values['name']);
        }
        $this->validate($request, $fields, $messages);
        $dataToUpdate = $request->only(array_keys($defaultSettings));
        // $quotation->fill($dataToUpdate);
        foreach ($dataToUpdate as $key => $value) {
            $quotation->{$key} = $value;
        }
        if ($quotation->isDirty()) {
            $quotation->saveOrFail();
        }
        return redirect(route('quotation.processes', $quotation))->with('message','Quote processes updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Quotation::destroy($id);
        return redirect(route('quotation.index'))->with('message','Quote deleted successfully');
    }

    public function editDetailsProcesses(Quotation $quotation, ProcessesSettings $processesSettings)
    {
        $partnumbers = PartNumber::all();
        return view('details.details-processes', [
            'quotation' => $quotation,
            'processesSettings' => $processesSettings->defaultSettings(),
            'partnumbers' => $partnumbers
        ]);
    }
}

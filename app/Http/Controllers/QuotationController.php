<?php

namespace App\Http\Controllers;

use App\Internal\ProcessesSettings;
use App\Models\Quotation;
use App\Models\Weld;
use Illuminate\Http\Request;


class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $quotationData['quotations']=Quotation::paginate(15);
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
    public function store(Request $request, ProcessesSettings $processesSettings)
    {
        $fields=[
          'name'=>'required|string|max:100',
          'client'=>'required|string|max:200',
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
        $quotation->client = request()->input('client');
        $quotation->date = request()->input('date');
        $quotation->description = request()->input('description');
        foreach ($processesSettings->defaultSettings() as $key => $values) {
            $quotation->{$key} = $values['price'];
        }
        $quotation->save();
        return redirect('quotation')->with('message', 'Quotation added successfully');

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
    public function edit(Quotation $quotation)
    {
        return view('quotation.edit', compact('quotation'));
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotation $quotation)
    {
        $fields=[
            'name'=>'required|string|max:100',
            'client'=>'required|string|max:200',
            'date'=>'required|string|max:200',
            'description'=>'required|string|max:200',
        ];
        $message=[
            'name.required'=>'Name is required',
            'client.required'=>'Client is required',
            'date.required'=>'Date is required',
            'description.required'=>'Description is required'
        ];
        $this->validate($request, $fields, $message);

        $quotationData = $request->except(['_token','_method']);
        $quotation->update($quotationData);
        return redirect('quotation')->with('message','Quotation updated successfully');
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
        $quotation->update($dataToUpdate);
        return redirect('details')->with('message','Quotation processes updated successfully');
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

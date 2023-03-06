<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $processes['processes']=Process::paginate(15);
        return view('process.index', $processes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('process.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=[
            'processname'=>'required|string|max:100',
            'price'=>'required|string|max:100',
        ];
        $message=[
            'processname.required'=>'Process name is required',
            'price.required'=>'Price is required'
        ];
        $this->validate($request,$fields,$message);

        $process = new Process;
        $process->processname = request()->input('processname');
        $process->price = request()->input('price');
        $process->save();
        return redirect('process')->with('message', 'Process added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Process $process)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $process=Process::findOrFail($id);
        return view('process.edit', compact('process'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $fields=[
            'processname'=>'required|string|max:100',
            'price'=>'required|string|max:100',
        ];
        $message=[
            'processname.required'=>'Process name is required',
            'price.required'=>'price is required'
        ];
        $this->validate($request,$fields,$message);

        $process = request()->except(['_token','_method']);
        Process::where('id', '=', $id)->update($process);
        return redirect('process')->with('message','Process updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Process::destroy($id);
        return redirect('process')->with('message','Process deleted successfully');
    }
}

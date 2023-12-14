<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $viewData = [];
        $viewData['autos'] = Auto::all();
        return view('auto.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('auto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request;
        $auto = new Auto();
        $auto->brand = $data['brand'];
        $auto->ps = $data['ps'];
        $auto->type = $data['type'];
        $auto->color = $data['color'];
        $auto->numberSeats = $data['numberSeats'];
        $auto->pricePerDay = $data['pricePerDay'];
        $auto->save();

        return redirect()->route('auto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $viewData['auto'] = Auto::findorfail($id);
        return view('auto.edit')->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $auto = Auto::findorfail($id);
        $auto->brand = $request['brand'];
        $auto->ps = $request['ps'];
        $auto->type = $request['type'];
        $auto->color = $request['color'];
        $auto->numberSeats = $request['numberSeats'];
        $auto->pricePerDay = $request['pricePerDay'];
        $auto->save();
        return redirect()->route('auto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $auto = Auto::findorfail($id);
        $auto->delete();
        return redirect()->route('auto.index');
    }
}

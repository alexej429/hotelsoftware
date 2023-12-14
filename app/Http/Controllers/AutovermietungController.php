<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\autovermietung;
use Illuminate\Http\Request;

class AutovermietungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [];
        $viewData['autos'] = Auto::all()->where('rented', '=', 0);
        $viewData['autosVermieted'] = Auto::all()->where('rented', '=', 1);
        return view('autovermietung.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $auto = Auto::findorfail($_GET['id']);
        return view('autovermietung.create')->with('auto', $auto);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $auto = Auto::findorfail($id);
        $auto->rented = 1;
        $auto->save();

        return redirect()->route('autovermietung.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $auto = Auto::findorfail($id);
        $auto->rented = 0;
        $auto->save();
        return redirect()->route('autovermietung.index');
    }
}

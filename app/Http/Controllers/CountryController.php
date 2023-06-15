<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Models\Country;
use App\Tables\Countries;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.countries.index', [
            'countries' => Countries::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        Country::create($request->validated());
        Splade::toast('Country created')->autoDismiss(3);

        return to_route('admin.countries.index');
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

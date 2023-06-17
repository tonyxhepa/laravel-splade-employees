<?php

namespace App\Http\Controllers;

use App\Forms\CreateStateForm;
use App\Models\State;
use App\Tables\States;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.states.index', [
            'states' => States::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.states.create', [
            'form' => CreateStateForm::class
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateStateForm $form)
    {
        $data = $form->validate($request);
        State::create($data);
        Splade::toast('State created')->autoDismiss(3);

        return to_route('admin.states.index');
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

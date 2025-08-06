<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $examples =  Example::get();

        return view('example.index', compact('examples'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('example.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validation());
        Example::create($request->all());

        return redirect()
            ->route('example.index')
            ->withSuccess('Example is created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Example $example): View
    {
        return view('example.show', compact('example'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Example $example): View
    {
        return view('example.edit', compact('example'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Example $example): RedirectResponse
    {
        $request->validate($this->validation());
        $example->update($request->all());

        return redirect()
            ->route('example.index')
            ->withSuccess('Example is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Example $example)
    {
        $example->delete();

        return redirect()
            ->back()
            ->withSuccess('Example is deleted successfully.');
    }

    /**
     * Validation data from create and edit form.
     */
    public function validation()
    {
        return [
            'name' => 'required',
        ];
    }
}

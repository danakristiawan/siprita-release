<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use App\Models\Kategori;
use Illuminate\View\View;
use App\Models\Preferensi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PreferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $preferensis =  Preferensi::get();

        return view('preferensi.index', compact('preferensis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kategoris = Kategori::get();
        $satkers = Satker::get();
        return view('preferensi.create', compact('kategoris', 'satkers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->validation());
        Preferensi::create([
            'uraian' => $request->uraian,
            'user_id' => $request->user_id,
            'satker_id_1' => $request->satker_id,
            'satker_id_2' => $request->satker_id,
            'satker_id_3' => $request->satker_id,
            'satker_id_4' => $request->satker_id,
            'satker_id_5' => $request->satker_id,
        ]);

        return redirect()
            ->route('preferensi.index')
            ->withSuccess('Preferensi is created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Preferensi $preferensi): View
    {
        return view('preferensi.show', compact('preferensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Preferensi $preferensi): View
    {
        return view('preferensi.edit', compact('preferensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Preferensi $preferensi): RedirectResponse
    {
        $request->validate($this->validation());
        $preferensi->update([
            'uraian' => $request->uraian,
            'satker_id_1' => $request->satker_id,
            'satker_id_2' => $request->satker_id,
            'satker_id_3' => $request->satker_id,
            'satker_id_4' => $request->satker_id,
            'satker_id_5' => $request->satker_id,
        ]);

        return redirect()
            ->route('preferensi.index')
            ->withSuccess('Preferensi is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Preferensi $preferensi)
    {
        $preferensi->delete();

        return redirect()
            ->back()
            ->withSuccess('Preferensi is deleted successfully.');
    }

    /**
     * Validation data from create and edit form.
     */
    public function validation()
    {
        return [
            'uraian' => 'required',
        ];
    }
}

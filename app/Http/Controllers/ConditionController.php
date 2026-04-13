<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conditions = Condition::all();
        return view('conditions.index', compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kondisi' => 'required|string|max:255',
            'min_score' => 'required|integer|min:0',
            'max_score' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
        ]);

        Condition::create($request->all());

        return redirect()->route('conditions.index')
            ->with('success', 'Kondisi mental berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $condition = Condition::findOrFail($id);
        return view('conditions.show', compact('condition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $condition = Condition::findOrFail($id);
        return view('conditions.edit', compact('condition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $condition = Condition::findOrFail($id);

        $request->validate([
            'nama_kondisi' => 'required|string|max:255',
            'min_score' => 'required|integer|min:0',
            'max_score' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
        ]);

        $condition->update($request->all());

        return redirect()->route('conditions.index')
            ->with('success', 'Kondisi mental berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $condition = Condition::findOrFail($id);
        $condition->delete();

        return redirect()->route('conditions.index')
            ->with('success', 'Kondisi mental berhasil dihapus.');
    }
}

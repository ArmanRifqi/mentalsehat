<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Test;
use App\Models\TestResult;
use Illuminate\Http\Request;

class TestResultController extends Controller
{
    /**
     * Display a listing of the resource (Dashboard).
     */
    public function index()
    {
        $results = TestResult::with(['patient', 'condition'])->latest()->get();
        return view('results.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not used
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Not used - handled in TestController@storeResults
    }

    /**
     * Display the specified resource (Show result).
     */
    public function show(string $id)
    {
        $result = TestResult::with(['patient', 'condition'])->findOrFail($id);
        $maxScore = Test::sum('skor_e') ?? 0;
        $conditions = Condition::orderBy('min_score')->get();

        return view('results.show', compact('result', 'maxScore', 'conditions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Not used
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Not used
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = TestResult::findOrFail($id);
        $result->delete();

        return redirect()->route('results.index')
            ->with('success', 'Hasil tes berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Test;
use App\Models\Condition;
use App\Models\TestResult;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource (manage tests for admin).
     */
    public function index()
    {
        $tests = Test::all();
        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new test (for admin).
     */
    public function create($id_pasien = null)
    {
        // If id_pasien is provided, this is for taking the test
        if ($id_pasien) {
            $patient = Patient::findOrFail($id_pasien);
            $tests = Test::all();
            return view('tests.take', compact('patient', 'tests'));
        }

        // Otherwise, this is for creating a new test question (admin only)
        return view('tests.create');
    }

    /**
     * Store a newly created test question (for admin).
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'opsi_e' => 'required|string',
            'skor_a' => 'required|integer|min:0',
            'skor_b' => 'required|integer|min:0',
            'skor_c' => 'required|integer|min:0',
            'skor_d' => 'required|integer|min:0',
            'skor_e' => 'required|integer|min:0',
        ]);

        Test::create($request->all());

        return redirect()->route('tests.index')
            ->with('success', 'Pertanyaan tes berhasil ditambahkan.');
    }

    /**
     * Store test results (process answers).
     */
    public function storeResults(Request $request)
    {
        $patient = Patient::findOrFail($request->id_pasien);

        $request->validate([
            'id_pasien' => 'required|exists:patients,id_pasien',
            'answers' => 'required|array',
            'answers.*' => 'required|in:a,b,c,d,e',
        ]);

        // Calculate total score
        $totalScore = 0;
        $tests = Test::all();

        foreach ($request->answers as $testId => $answer) {
            $test = $tests->find($testId);
            if ($test) {
                $score = $test->{'skor_' . $answer};
                $totalScore += $score;
            }
        }

        // Find corresponding condition
        $condition = Condition::where('min_score', '<=', $totalScore)
            ->where('max_score', '>=', $totalScore)
            ->first();

        if (!$condition) {
            $condition = Condition::orderByDesc('min_score')->first();
        }

        // Save test result
        $result = TestResult::create([
            'id_pasien' => $request->id_pasien,
            'total_score' => $totalScore,
            'condition_id' => $condition->id,
        ]);

        return redirect()->route('results.show', $result->id)
            ->with('success', 'Hasil tes berhasil disimpan.');
    }

    /**
     * Display the specified test question.
     */
    public function show(string $id)
    {
        $test = Test::findOrFail($id);
        return view('tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified test question.
     */
    public function edit(string $id)
    {
        $test = Test::findOrFail($id);
        return view('tests.edit', compact('test'));
    }

    /**
     * Update the specified test question.
     */
    public function update(Request $request, string $id)
    {
        $test = Test::findOrFail($id);

        $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'opsi_e' => 'required|string',
            'skor_a' => 'required|integer|min:0',
            'skor_b' => 'required|integer|min:0',
            'skor_c' => 'required|integer|min:0',
            'skor_d' => 'required|integer|min:0',
            'skor_e' => 'required|integer|min:0',
        ]);

        $test->update($request->all());

        return redirect()->route('tests.index')
            ->with('success', 'Pertanyaan tes berhasil diupdate.');
    }

    /**
     * Remove the specified test question.
     */
    public function destroy(string $id)
    {
        $test = Test::findOrFail($id);
        $test->delete();

        return redirect()->route('tests.index')
            ->with('success', 'Pertanyaan tes berhasil dihapus.');
    }
}

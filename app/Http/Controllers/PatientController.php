<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:1|max:150',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_tes' => 'required|date',
        ]);

        $patient = Patient::create([
            'id_pasien' => 'P-' . Str::random(8),
            'nama' => $request->nama,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_tes' => $request->tanggal_tes,
        ]);

        return redirect()->route('test.create', $patient->id_pasien)
            ->with('success', 'Data pasien berhasil ditambahkan. Silakan mulai tes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:1|max:150',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_tes' => 'required|date',
        ]);

        $patient->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_tes' => $request->tanggal_tes,
        ]);

        return redirect()->route('patients.index')
            ->with('success', 'Data pasien berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Data pasien berhasil dihapus.');
    }

    /**
     * Search patients by name or ID
     */
    public function search(Request $request)
    {
        $query = $request->get('q');

        if (empty($query)) {
            $patients = Patient::all();
        } else {
            $patients = Patient::where('nama', 'like', "%{$query}%")
                ->orWhere('id_pasien', 'like', "%{$query}%")
                ->get();
        }

        return response()->json([
            'success' => true,
            'data' => $patients
        ]);
    }
}

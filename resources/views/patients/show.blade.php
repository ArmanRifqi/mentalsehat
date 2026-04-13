<x-app-layout>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Detail Pasien</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong>ID Pasien:</strong>
                            </div>
                            <div class="col-md-8">
                                <code>{{ $patient->id_pasien }}</code>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong>Nama:</strong>
                            </div>
                            <div class="col-md-8">
                                {{ $patient->nama }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong>Umur:</strong>
                            </div>
                            <div class="col-md-8">
                                {{ $patient->umur }} tahun
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong>Jenis Kelamin:</strong>
                            </div>
                            <div class="col-md-8">
                                @if($patient->jenis_kelamin === 'L')
                                    <span class="badge bg-primary">Laki-laki</span>
                                @else
                                    <span class="badge bg-danger">Perempuan</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong>Tanggal Tes:</strong>
                            </div>
                            <div class="col-md-8">
                                {{ \Carbon\Carbon::parse($patient->tanggal_tes)->format('d/m/Y') }}
                            </div>
                        </div>

                        <hr>

                        <h6 class="mt-4 mb-3">Hasil Tes:</h6>
                        @if($patient->testResults->isEmpty())
                            <p class="text-muted">Belum ada hasil tes untuk pasien ini.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Total Skor</th>
                                            <th>Kondisi</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($patient->testResults as $result)
                                            <tr>
                                                <td><strong>{{ $result->total_score }}</strong></td>
                                                <td>{{ $result->condition->nama_kondisi }}</td>
                                                <td>{{ $result->created_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('results.show', $result->id) }}" class="btn btn-sm btn-info">Lihat Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('patients.edit', $patient->id_pasien) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

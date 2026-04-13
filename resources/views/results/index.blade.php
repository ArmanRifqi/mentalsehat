<x-app-layout>
    <div class="container-fluid px-4">
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <div class="section-card p-4">
                    <h1 class="h3 fw-bold mb-2">Hasil Tes Pasien</h1>
                    <p class="text-muted mb-0">Lihat ringkasan hasil tes dan kondisi mental pasien secara cepat.</p>
                </div>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('patients.create') }}" class="btn btn-primary btn-lg px-4">
                    <i class="bi bi-plus-circle me-2"></i> Mulai Tes Baru
                </a>
            </div>
        </div>

        @if($results->isEmpty())
            <div class="alert alert-info rounded-4 shadow-sm">
                <strong>Belum ada hasil tes.</strong> Silakan klik tombol "Mulai Tes Baru" untuk memulai tes kesehatan mental.
            </div>
        @else
            <div class="section-card p-4">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light border-bottom">
                            <tr>
                                <th>ID Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Total Skor</th>
                                <th>Kondisi</th>
                                <th>Tanggal Tes</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td><code>{{ $result->id_pasien }}</code></td>
                                    <td><strong>{{ $result->patient->nama }}</strong></td>
                                    <td><span class="badge bg-primary">{{ $result->total_score }}</span></td>
                                    <td>
                                        @php
                                            $conditionClass = match($result->condition->nama_kondisi) {
                                                'Sangat Baik' => 'bg-success',
                                                'Ringan' => 'bg-info',
                                                'Sedang' => 'bg-warning text-dark',
                                                'Cukup Berat' => 'bg-danger',
                                                default => 'bg-dark',
                                            };
                                        @endphp
                                        <span class="badge {{ $conditionClass }}">{{ $result->condition->nama_kondisi }}</span>
                                    </td>
                                    <td>{{ $result->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('results.show', $result->id) }}" class="btn btn-sm btn-outline-primary me-1">Detail</a>
                                        <form action="{{ route('results.destroy', $result->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>

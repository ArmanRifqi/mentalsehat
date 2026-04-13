<x-app-layout>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg mb-4">
                    <div class="card-body text-center py-5">
                        <h2 class="fw-bold mb-2">Hasil Tes Kesehatan Mental</h2>
                        <p class="text-muted">{{ $result->patient->nama }} ({{ $result->id_pasien }})</p>
                    </div>
                </div>

                <!-- Score Display -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card text-center bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Total Skor</h6>
                                <h1 class="display-4 fw-bold text-primary">{{ $result->total_score }}</h1>
                                <p class="text-muted small">dari {{ $maxScore }} poin maksimal</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Kondisi Kesehatan Mental</h6>
                                @if($result->condition->nama_kondisi === 'Sangat Baik')
                                    <h2 class="fw-bold text-success">{{ $result->condition->nama_kondisi }}</h2>
                                @elseif($result->condition->nama_kondisi === 'Ringan')
                                    <h2 class="fw-bold text-info">{{ $result->condition->nama_kondisi }}</h2>
                                @elseif($result->condition->nama_kondisi === 'Sedang')
                                    <h2 class="fw-bold text-warning">{{ $result->condition->nama_kondisi }}</h2>
                                @elseif($result->condition->nama_kondisi === 'Cukup Berat')
                                    <h2 class="fw-bold text-danger">{{ $result->condition->nama_kondisi }}</h2>
                                @else
                                    <h2 class="fw-bold text-dark">{{ $result->condition->nama_kondisi }}</h2>
                                @endif
                                <p class="text-muted small">Rentang Skor: {{ $result->condition->min_score }} - {{ $result->condition->max_score }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Condition Description -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">Penjelasan Hasil Tes</h6>
                    </div>
                    <div class="card-body">
                        <p class="lead">{{ $result->condition->deskripsi }}</p>
                    </div>
                </div>

                <!-- Score Range Info -->
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <h6 class="mb-0">Panduan Interpretasi Skor</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @php
                                $badgeClasses = [
                                    'Sangat Baik' => 'bg-success',
                                    'Ringan' => 'bg-info',
                                    'Sedang' => 'bg-warning text-dark',
                                    'Cukup Berat' => 'bg-danger',
                                    'Berat' => 'bg-dark',
                                ];
                            @endphp

                            @foreach($conditions as $condition)
                                <div class="col-md-6 mb-3">
                                    <div class="badge {{ $badgeClasses[$condition->nama_kondisi] ?? 'bg-secondary' }} mb-2" style="font-size: 0.9rem; padding: 0.5rem 1rem;">
                                        {{ $condition->nama_kondisi }}: {{ $condition->min_score }} - {{ $condition->max_score }}
                                    </div>
                                    <p class="small">{{ $condition->deskripsi }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Patient Info -->
                <div class="card mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h6 class="mb-0">Informasi Pasien</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <strong>ID Pasien:</strong> <code>{{ $result->id_pasien }}</code>
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Nama:</strong> {{ $result->patient->nama }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Umur:</strong> {{ $result->patient->umur }} tahun
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Jenis Kelamin:</strong>
                                @if($result->patient->jenis_kelamin === 'L')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Tanggal Tes:</strong> {{ \Carbon\Carbon::parse($result->patient->tanggal_tes)->format('d/m/Y') }}
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong>Waktu Pengisian:</strong> {{ $result->created_at->format('d/m/Y H:i:s') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                    <a href="{{ route('results.index') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                    <a href="{{ route('patients.create') }}" class="btn btn-success">Mulai Tes Baru</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

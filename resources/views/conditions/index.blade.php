<x-app-layout>
    <div class="container-fluid px-4">
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <div class="section-card p-4">
                    <h1 class="h3 fw-bold mb-2">Kategori Kondisi Mental</h1>
                    <p class="text-muted mb-0">Atur kategori kondisi berdasarkan rentang skor untuk hasil tes yang lebih akurat.</p>
                </div>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('conditions.create') }}" class="btn btn-primary btn-lg px-4">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Kondisi
                </a>
            </div>
        </div>

        @if($conditions->isEmpty())
            <div class="alert alert-info rounded-4 shadow-sm">
                <strong>Tidak ada kategori kondisi.</strong> Tambahkan kategori baru agar tes dapat memberikan evaluasi yang jelas.
            </div>
        @else
            <div class="row g-4">
                @foreach($conditions as $condition)
                    <div class="col-lg-6">
                        <div class="section-card h-100 p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="fw-bold mb-0">{{ $condition->nama_kondisi }}</h5>
                                <span class="badge bg-info">Skor: {{ $condition->min_score }} - {{ $condition->max_score }}</span>
                            </div>
                            <p class="text-muted mb-4">{{ $condition->deskripsi }}</p>
                            <div>
                                <a href="{{ route('conditions.edit', $condition->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{ route('conditions.destroy', $condition->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>

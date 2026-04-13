<x-app-layout>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Edit Kategori Kondisi Mental</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('conditions.update', $condition->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_kondisi" class="form-label">Nama Kondisi</label>
                                <input type="text" class="form-control @error('nama_kondisi') is-invalid @enderror" id="nama_kondisi" name="nama_kondisi"
                                    value="{{ old('nama_kondisi', $condition->nama_kondisi) }}" required>
                                @error('nama_kondisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="min_score" class="form-label">Skor Minimum</label>
                                    <input type="number" class="form-control @error('min_score') is-invalid @enderror" id="min_score" name="min_score"
                                        value="{{ old('min_score', $condition->min_score) }}" min="0" required>
                                    @error('min_score')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="max_score" class="form-label">Skor Maksimum</label>
                                    <input type="number" class="form-control @error('max_score') is-invalid @enderror" id="max_score" name="max_score"
                                        value="{{ old('max_score', $condition->max_score) }}" min="0" required>
                                    @error('max_score')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                                    rows="4" required>{{ old('deskripsi', $condition->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('conditions.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-warning">Update Kondisi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

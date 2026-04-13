<x-app-layout>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Tambah Pertanyaan Tes Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tests.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <textarea class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan"
                                    rows="3" required>{{ old('pertanyaan') }}</textarea>
                                @error('pertanyaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="opsi_a" class="form-label">Opsi A</label>
                                    <input type="text" class="form-control @error('opsi_a') is-invalid @enderror" id="opsi_a" name="opsi_a"
                                        value="{{ old('opsi_a') }}" required>
                                    @error('opsi_a')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="skor_a" class="form-label">Skor A</label>
                                    <input type="number" class="form-control @error('skor_a') is-invalid @enderror" id="skor_a" name="skor_a"
                                        value="{{ old('skor_a', 0) }}" min="0" required>
                                    @error('skor_a')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="opsi_b" class="form-label">Opsi B</label>
                                    <input type="text" class="form-control @error('opsi_b') is-invalid @enderror" id="opsi_b" name="opsi_b"
                                        value="{{ old('opsi_b') }}" required>
                                    @error('opsi_b')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="skor_b" class="form-label">Skor B</label>
                                    <input type="number" class="form-control @error('skor_b') is-invalid @enderror" id="skor_b" name="skor_b"
                                        value="{{ old('skor_b', 1) }}" min="0" required>
                                    @error('skor_b')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="opsi_c" class="form-label">Opsi C</label>
                                    <input type="text" class="form-control @error('opsi_c') is-invalid @enderror" id="opsi_c" name="opsi_c"
                                        value="{{ old('opsi_c') }}" required>
                                    @error('opsi_c')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="skor_c" class="form-label">Skor C</label>
                                    <input type="number" class="form-control @error('skor_c') is-invalid @enderror" id="skor_c" name="skor_c"
                                        value="{{ old('skor_c', 2) }}" min="0" required>
                                    @error('skor_c')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="opsi_d" class="form-label">Opsi D</label>
                                    <input type="text" class="form-control @error('opsi_d') is-invalid @enderror" id="opsi_d" name="opsi_d"
                                        value="{{ old('opsi_d') }}" required>
                                    @error('opsi_d')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="skor_d" class="form-label">Skor D</label>
                                    <input type="number" class="form-control @error('skor_d') is-invalid @enderror" id="skor_d" name="skor_d"
                                        value="{{ old('skor_d', 3) }}" min="0" required>
                                    @error('skor_d')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="opsi_e" class="form-label">Opsi E</label>
                                    <input type="text" class="form-control @error('opsi_e') is-invalid @enderror" id="opsi_e" name="opsi_e"
                                        value="{{ old('opsi_e') }}" required>
                                    @error('opsi_e')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="skor_e" class="form-label">Skor E</label>
                                    <input type="number" class="form-control @error('skor_e') is-invalid @enderror" id="skor_e" name="skor_e"
                                        value="{{ old('skor_e', 4) }}" min="0" required>
                                    @error('skor_e')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('tests.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

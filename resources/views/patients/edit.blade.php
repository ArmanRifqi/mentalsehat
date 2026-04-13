<x-app-layout>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Edit Data Pasien</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('patients.update', $patient->id_pasien) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id_pasien" class="form-label">ID Pasien</label>
                                <input type="text" class="form-control" id="id_pasien" value="{{ $patient->id_pasien }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                    value="{{ old('nama', $patient->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur"
                                    value="{{ old('umur', $patient->umur) }}" min="1" max="150" required>
                                @error('umur')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" {{ old('jenis_kelamin', $patient->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin', $patient->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_tes" class="form-label">Tanggal Tes</label>
                                <input type="date" class="form-control @error('tanggal_tes') is-invalid @enderror" id="tanggal_tes" name="tanggal_tes"
                                    value="{{ old('tanggal_tes', $patient->tanggal_tes) }}" required>
                                @error('tanggal_tes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-warning">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="container-fluid px-4">
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <div class="section-card p-4">
                    <h1 class="h3 fw-bold mb-2">Data Pasien</h1>
                    <p class="text-muted mb-0">Kelola data pasien dengan tampilan tabel yang lebih rapi dan interaktif.</p>
                </div>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('patients.create') }}" class="btn btn-primary btn-lg px-4">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Pasien
                </a>
            </div>
        </div>

        @if($patients->isEmpty())
            <div class="alert alert-info rounded-4 shadow-sm">
                <strong>Tidak ada data pasien.</strong> Silakan klik tombol "Tambah Pasien" untuk membuat data pasien baru.
            </div>
        @else
            <div class="section-card p-4">
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="🔍 Cari pasien berdasarkan nama atau ID..." style="border-radius: 0.9rem;">
                </div>
                <div id="loadingIndicator" class="d-none mb-3">
                    <div class="spinner-border spinner-border-sm text-primary me-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    Mencari...
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="patientsTable">
                        <thead class="table-light border-bottom">
                            <tr>
                                <th>ID Pasien</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Tes</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="patientsList">
                            @foreach($patients as $patient)
                                <tr>
                                    <td><code>{{ $patient->id_pasien }}</code></td>
                                    <td>{{ $patient->nama }}</td>
                                    <td>{{ $patient->umur }} tahun</td>
                                    <td>
                                        @if($patient->jenis_kelamin === 'L')
                                            <span class="badge bg-primary">Laki-laki</span>
                                        @else
                                            <span class="badge bg-danger">Perempuan</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($patient->tanggal_tes)->format('d/m/Y') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('patients.show', $patient->id_pasien) }}" class="btn btn-sm btn-outline-primary me-1">Lihat</a>
                                        <a href="{{ route('patients.edit', $patient->id_pasien) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                        <form action="{{ route('patients.destroy', $patient->id_pasien) }}" method="POST" class="d-inline">
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
                <div id="noResultsMessage" class="d-none alert alert-warning mt-3">
                    Tidak ada pasien yang sesuai dengan pencarian Anda.
                </div>
            </div>
        @endif
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const patientsList = document.getElementById('patientsList');
        const loadingIndicator = document.getElementById('loadingIndicator');
        const noResultsMessage = document.getElementById('noResultsMessage');

        let searchTimeout;

        searchInput.addEventListener('keyup', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();

            if (query === '') {
                loadingIndicator.classList.add('d-none');
                noResultsMessage.classList.add('d-none');
                location.reload();
                return;
            }

            loadingIndicator.classList.remove('d-none');
            noResultsMessage.classList.add('d-none');

            searchTimeout = setTimeout(() => {
                fetch(`{{ route('patients.search') }}?q=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        loadingIndicator.classList.add('d-none');
                        patientsList.innerHTML = '';

                        if (data.data.length === 0) {
                            noResultsMessage.classList.remove('d-none');
                            return;
                        }

                        noResultsMessage.classList.add('d-none');

                        data.data.forEach(patient => {
                            const row = document.createElement('tr');
                            const genderBadge = patient.jenis_kelamin === 'L' 
                                ? '<span class="badge bg-primary">Laki-laki</span>'
                                : '<span class="badge bg-danger">Perempuan</span>';
                            
                            const formattedDate = new Date(patient.tanggal_tes).toLocaleDateString('id-ID');

                            row.innerHTML = `
                                <td><code>${patient.id_pasien}</code></td>
                                <td>${patient.nama}</td>
                                <td>${patient.umur} tahun</td>
                                <td>${genderBadge}</td>
                                <td>${formattedDate}</td>
                                <td class="text-end">
                                    <a href="/patients/${patient.id_pasien}" class="btn btn-sm btn-outline-primary me-1">Lihat</a>
                                    <a href="/patients/${patient.id_pasien}/edit" class="btn btn-sm btn-warning me-1">Edit</a>
                                    <form action="/patients/${patient.id_pasien}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            `;
                            patientsList.appendChild(row);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        loadingIndicator.classList.add('d-none');
                    });
            }, 300);
        });
    </script>
</x-app-layout>

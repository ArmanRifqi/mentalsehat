<x-app-layout>
    <div class="container-fluid px-4">
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <div class="section-card p-4">
                    <h1 class="h3 fw-bold mb-2">Kelola Pertanyaan Tes</h1>
                    <p class="text-muted mb-0">Atur pertanyaan dan skor jawaban untuk memastikan tes berjalan dengan baik.</p>
                </div>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('tests.create') }}" class="btn btn-primary btn-lg px-4">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Pertanyaan
                </a>
            </div>
        </div>

        @if($tests->isEmpty())
            <div class="alert alert-warning rounded-4 shadow-sm">
                <strong>Belum ada pertanyaan tes.</strong> Tambahkan pertanyaan pertama untuk memulai.
            </div>
        @else
            <div class="row g-4">
                @foreach($tests as $test)
                    <div class="col-lg-6">
                        <div class="section-card h-100 p-4">
                            <div class="d-flex flex-column gap-3 h-100">
                                <div>
                                    <span class="badge bg-info">No. {{ $loop->iteration }}</span>
                                    <h5 class="mt-3 mb-3">{{ $test->pertanyaan }}</h5>
                                </div>

                                <div class="bg-light rounded-4 p-3 mb-3">
                                    <p class="mb-2 fw-semibold">Opsi Jawaban</p>
                                    <div class="row g-2">
                                        @foreach(['A','B','C','D','E'] as $letter)
                                            <div class="col-12 col-sm-6">
                                                <div class="rounded-3 border px-3 py-2 h-100 d-flex justify-content-between align-items-center">
                                                    <span><strong>{{ $letter }}.</strong> @php $option = 'opsi_' . strtolower($letter); $score = 'skor_' . strtolower($letter); @endphp {{ $test->$option }}</span>
                                                    <span class="badge bg-primary">{{ $test->$score }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-auto d-flex flex-wrap gap-2 justify-content-end">
                                    <a href="{{ route('tests.edit', $test->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('tests.destroy', $test->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>

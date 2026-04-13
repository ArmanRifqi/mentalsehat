<x-app-layout>
    <div class="py-6">
        <div class="container-fluid px-4">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="section-card">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <h1 class="fw-bold mb-3">Selamat datang kembali, {{ Auth::user()->name }}!</h1>
                                <p class="lead text-muted mb-4">Selamat datang di dashboard tes kesehatan mental. Sekarang tampilannya sudah lebih bersih, modern, dan mudah digunakan. Jika ada saran untuk tampilan atau fitur, beri tahu saya kapan saja.</p>
                                <a href="{{ route('patients.index') }}" class="btn btn-primary me-2 mb-2">Lihat Daftar Pasien</a>
                                <a href="{{ route('tests.index') }}" class="btn btn-outline-primary mb-2">Kelola Tes</a>
                            </div>
                            <div class="col-lg-5 text-center">
                                <div class="p-4 rounded-4 highlight-card">
                                    <h5 class="text-primary mb-3">UI Lebih Menarik</h5>
                                    <p class="text-muted mb-0">UI sekarang memakai warna biru segar, card dengan bayangan lembut, dan elemen interaktif yang nyaman dilihat di semua perangkat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="section-card">
                        <h5 class="mb-3">Masukan & Saran</h5>
                        <p class="text-muted mb-4">Kalau kamu punya ide tampilan, komponen, atau fitur baru, cukup bilang. Saya siap bantu implementasi.</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('conditions.index') }}" class="btn btn-primary">Lihat Kondisi</a>
                            <a href="{{ route('results.index') }}" class="btn btn-outline-primary">Lihat Hasil Tes</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="section-card">
                        <h5 class="mb-3">Fitur yang Ditingkatkan</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card border-0 p-3">
                                    <h6 class="fw-semibold">Navigasi Cepat</h6>
                                    <p class="text-muted mb-0">Menu menu sekarang tampil lebih jelas dan responsif di desktop maupun mobile.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 p-3">
                                    <h6 class="fw-semibold">Pengalaman Visual</h6>
                                    <p class="text-muted mb-0">Warna, spacing, dan tipografi diperbarui agar terasa lebih modern dan profesional.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 p-3">
                                    <h6 class="fw-semibold">Pesan Pengguna</h6>
                                    <p class="text-muted mb-0">Kamu dapat memberi masukan langsung lewat dashboard ini setiap saat.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 p-3">
                                    <h6 class="fw-semibold">Tampilan Auth</h6>
                                    <p class="text-muted mb-0">Halaman login/register juga diperbarui jadi lebih elegan dan ramah pengguna.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

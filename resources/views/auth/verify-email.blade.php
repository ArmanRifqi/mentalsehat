<x-guest-layout>
    <div class="auth-card">
        <div class="auth-card-header">
            <h1 class="auth-card-title">Verify Email</h1>
            <p class="auth-card-subtitle">Verifikasi Alamat Email</p>
        </div>

        <div class="auth-card-body">
            <div class="alert alert-info mb-4">
                <strong>Terima kasih telah mendaftar!</strong> Sebelum memulai, bisakah Anda memverifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan kepada Anda? Jika Anda tidak menerima email, kami dengan senang hati akan mengirimkan yang lain.
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <strong>Berhasil!</strong> Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">
                        <strong>Resend Verification Email</strong>
                    </button>
                </div>
            </form>
        </div>

        <div class="auth-footer">
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="auth-link" style="border:none; background:none; cursor:pointer;">
                    Logout
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>

<x-guest-layout>
    <div class="auth-card">
        <div class="auth-card-header">
            <h1 class="auth-card-title">Confirm Password</h1>
            <p class="auth-card-subtitle">Area Aman - Konfirmasi Kata Sandi</p>
        </div>

        <div class="auth-card-body">
            <div class="alert alert-warning mb-4">
                <strong>Perhatian!</strong> Ini adalah area aman dari aplikasi. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <strong>Gagal!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <strong>Confirm</strong>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

<x-guest-layout>
    <div class="auth-card">
        <div class="auth-card-header">
            <h1 class="auth-card-title">Forgot Password</h1>
            <p class="auth-card-subtitle">Reset Kata Sandi Anda</p>
        </div>

        <div class="auth-card-body">
            <div class="alert alert-info mb-4">
                <strong>Lupa kata sandi?</strong> Tidak masalah. Cukup berikan alamat email Anda dan kami akan mengirimkan tautan reset kata sandi untuk membuat yang baru.
            </div>

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <strong>Send Password Reset Link</strong>
                    </button>
                </div>
            </form>
        </div>

        <div class="auth-footer">
            Kembali ke <a class="auth-link" href="{{ route('login') }}">Login</a>
        </div>
    </div>
</x-guest-layout>

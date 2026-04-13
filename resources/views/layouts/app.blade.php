<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mental Sehat') }}</title>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <style>
            :root {
                --primary: #2563eb;
                --primary-dark: #1d4ed8;
                --surface: #ffffff;
                --surface-soft: rgba(255,255,255,0.9);
                --text: #1f2937;
                --muted: #6b7280;
                --border: rgba(15, 23, 42, 0.08);
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: 'Inter', sans-serif;
                background: radial-gradient(circle at top left, rgba(37, 99, 235, 0.18), transparent 25%),
                            radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.12), transparent 20%),
                            linear-gradient(180deg, #f8fbff 0%, #eef4ff 100%);
                color: var(--text);
            }

            .navbar {
                background: rgba(37, 99, 235, 0.95);
                backdrop-filter: saturate(180%) blur(12px);
            }

            .navbar-brand {
                font-weight: 700;
                letter-spacing: 0.02em;
                font-size: 1.4rem;
            }

            .navbar-nav .nav-link {
                color: rgba(255,255,255,0.92);
                font-weight: 500;
                padding: 0.625rem 0.9rem;
                border-radius: 0.85rem;
                transition: all 0.2s ease;
            }

            .navbar-nav .nav-link.active,
            .navbar-nav .nav-link:hover {
                background: rgba(255,255,255,0.18);
                color: #fff;
            }

            .card,
            .auth-card {
                border: 1px solid var(--border);
                border-radius: 1.35rem;
                box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08);
                background: var(--surface);
            }

            .card-header,
            .auth-card-header {
                border-top-left-radius: 1.35rem;
                border-top-right-radius: 1.35rem;
            }

            .btn-primary {
                background: linear-gradient(135deg, var(--primary), #1d4ed8);
                border: none;
                box-shadow: 0 14px 28px rgba(37, 99, 235, 0.18);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 18px 36px rgba(37, 99, 235, 0.22);
                background: linear-gradient(135deg, #1d4ed8, #2563eb);
            }

            .btn-outline-primary {
                border-color: rgba(37, 99, 235, 0.25);
                color: var(--primary);
            }

            .btn-outline-primary:hover {
                background: rgba(37, 99, 235, 0.08);
            }

            .alert {
                border-radius: 1rem;
                box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
            }

            .form-control,
            .form-select {
                border-radius: 0.9rem;
                border: 1px solid rgba(15, 23, 42, 0.12);
                padding: 0.95rem 1rem;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: rgba(37, 99, 235, 0.45);
                box-shadow: 0 0 0 0.15rem rgba(37, 99, 235, 0.12);
            }

            .badge {
                border-radius: 0.85rem;
                padding: 0.55rem 0.85rem;
            }

            .page-header {
                margin-bottom: 1.75rem;
            }

            .section-card {
                border: 1px solid rgba(15, 23, 42, 0.08);
                border-radius: 1.35rem;
                background: rgba(255,255,255,0.95);
                padding: 1.75rem;
                box-shadow: 0 20px 45px rgba(15, 23, 42, 0.05);
            }

            .footer-note {
                color: var(--muted);
            }

            .text-primary-soft {
                color: rgba(37, 99, 235, 0.86);
            }

            .highlight-card {
                background: linear-gradient(180deg, rgba(37,99,235,0.12), rgba(37,99,235,0.04));
            }
        </style>
    </head>
    <body>
        <div class="min-vh-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="py-4">
                <div class="container-fluid px-4">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi Kesalahan!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{ $slot }}
                </div>
            </main>
        </div>

        <!-- Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

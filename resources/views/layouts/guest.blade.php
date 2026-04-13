<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Tes Kesehatan Mental</title>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <style>
            body {
                margin: 0;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background: radial-gradient(circle at top left, rgba(37, 99, 235, 0.22), transparent 30%),
                            radial-gradient(circle at bottom right, rgba(59, 130, 246, 0.15), transparent 20%),
                            linear-gradient(135deg, #eef4ff 0%, #f8fbff 100%);
                font-family: 'Inter', sans-serif;
            }

            .auth-container {
                width: 100%;
                max-width: 520px;
                padding: 20px;
            }

            .auth-card {
                border-radius: 1.5rem;
                border: 1px solid rgba(15, 23, 42, 0.08);
                overflow: hidden;
                background: rgba(255,255,255,0.96);
                box-shadow: 0 30px 70px rgba(15, 23, 42, 0.09);
            }

            .auth-card-header {
                background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
                color: white;
                text-align: center;
                padding: 2.5rem 1.5rem;
            }

            .auth-card-title {
                font-size: 2rem;
                font-weight: 800;
                margin-bottom: 0.5rem;
            }

            .auth-card-subtitle {
                opacity: 0.92;
                font-size: 0.95rem;
                line-height: 1.6;
            }

            .auth-card-body {
                padding: 2.5rem 2rem 2rem;
            }

            .form-label {
                font-weight: 600;
                color: #0f172a;
                margin-bottom: 0.65rem;
            }

            .form-control,
            .form-select {
                border-radius: 1rem;
                border: 1px solid rgba(15, 23, 42, 0.12);
                padding: 0.95rem 1rem;
                box-shadow: none;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: rgba(37, 99, 235, 0.45);
                box-shadow: 0 0 0 0.15rem rgba(37, 99, 235, 0.12);
            }

            .btn-primary {
                width: 100%;
                border-radius: 1.1rem;
                background: linear-gradient(135deg, #2563eb, #3b82f6);
                border: none;
                padding: 0.95rem 1rem;
                font-weight: 700;
                box-shadow: 0 15px 35px rgba(37, 99, 235, 0.18);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 20px 45px rgba(37, 99, 235, 0.24);
            }

            .form-check-input {
                width: 1.15rem;
                height: 1.15rem;
                border-radius: 0.45rem;
                border: 1px solid rgba(15, 23, 42, 0.18);
            }

            .form-check-input:checked {
                background-color: #2563eb;
                border-color: #2563eb;
            }

            .auth-footer {
                padding: 1.35rem 2rem 2rem;
                text-align: center;
                font-size: 0.95rem;
                color: #475569;
            }

            .auth-link {
                color: #2563eb;
                font-weight: 700;
                text-decoration: none;
            }

            .auth-link:hover {
                text-decoration: underline;
            }

            .alert {
                border-radius: 1rem;
                border: 1px solid rgba(15, 23, 42, 0.08);
            }
        </style>
    </head>
    <body>
        <div class="auth-container">
            {{ $slot }}
        </div>

        <!-- Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

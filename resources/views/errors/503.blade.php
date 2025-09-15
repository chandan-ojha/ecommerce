<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>503 - Service Unavailable</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-wrapper {
            text-align: center;
            padding: 2rem;
        }

        .error-code {
            font-size: 8rem;
            font-weight: 900;
            color: #dc3545;
            /* Bootstrap danger color */
            line-height: 1;
            animation: float 2s ease-in-out infinite;
        }

        .error-text {
            font-size: 1.5rem;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .btn-primary,
        .btn-outline-dark {
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #bb2d3b;
        }

        .btn-outline-dark:hover {
            background-color: #343a40;
            color: #fff;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 576px) {
            .error-code {
                font-size: 5rem;
            }

            .error-text {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container error-wrapper">
        <div class="error-code">503</div>
        <div class="error-text">Sorry! Our server is currently down for maintenance.<br>Please try again later.</div>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="javascript:location.reload()" class="btn btn-primary">🔄 Retry</a>
            <a href="/" class="btn btn-outline-dark">🏠 Home Page</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

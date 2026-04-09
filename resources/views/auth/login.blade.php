<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #635bff;
            --primary-hover: #4f46e5;
            --bg: #f6f9fc;
            --text-main: #0a2540;
            --text-secondary: #425466;
            --border: #e3e8ee;
            --success: #198754;
            --danger: #dc3545;
        }

        body {
            background: var(--bg);
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }

        .login-wrapper {
            width: 100%;
        }

        .brand {
            text-align: center;
            margin-bottom: 20px;
        }

        .brand h4 {
            font-weight: 600;
            color: var(--text-main);
        }

        .card-login {
            background: #fff;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .login-title {
            font-size: 22px;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 20px;
        }

        label {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 6px;
        }

        .form-control {
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 12px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(99, 91, 255, 0.15);
        }

        .is-valid {
            border-color: var(--success) !important;
        }

        .is-invalid {
            border-color: var(--danger) !important;
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            border-radius: 8px;
            padding: 11px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .extra {
            font-size: 13px;
            margin-bottom: 15px;
        }

        .extra a {
            text-decoration: none;
            color: var(--primary);
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #8898aa;
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        /* RESPONSIVE */
        @media (max-width: 576px) {
            .card-login {
                padding: 20px;
                border-radius: 10px;
            }

            .login-title {
                font-size: 18px;
            }

            .btn-primary {
                padding: 10px;
            }
        }
    </style>

</head>

<body>

    <div class="container px-3">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-10 col-md-6 col-lg-4">

                <div class="login-wrapper">

                    <div class="brand">
                        <h4>MyApp</h4>
                    </div>

                    <div class="card-login">

                        <div class="login-title">Sign in to your account</div>

                        @if(session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form id="loginForm" action="{{ route('login.process') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="you@example.com">
                                <small class="text-danger d-none" id="emailError">Email tidak valid</small>
                            </div>

                            <div class="mb-2">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="••••••••">
                                <small class="text-danger d-none" id="passError">Minimal 6 karakter</small>
                            </div>

                            <div class="d-flex justify-content-between extra">
                                <div>
                                    <input type="checkbox"> Remember me
                                </div>
                                <a href="#">Forgot password?</a>
                            </div>

                            <button id="loginBtn" class="btn btn-primary w-100">
                                <span id="btnText">Continue</span>
                                <span id="spinner" class="spinner-border spinner-border-sm d-none"></span>
                            </button>

                        </form>

                    </div>

                    <div class="footer">
                        Don’t have an account? <a href="#">Sign up</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const form = document.getElementById('loginForm');

        const emailError = document.getElementById('emailError');
        const passError = document.getElementById('passError');

        // Email validation
        email.addEventListener('input', () => {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (regex.test(email.value)) {
                email.classList.remove('is-invalid');
                email.classList.add('is-valid');
                emailError.classList.add('d-none');
            } else {
                email.classList.remove('is-valid');
                email.classList.add('is-invalid');
                emailError.classList.remove('d-none');
            }
        });

        // Password validation
        password.addEventListener('input', () => {
            if (password.value.length >= 6) {
                password.classList.remove('is-invalid');
                password.classList.add('is-valid');
                passError.classList.add('d-none');
            } else {
                password.classList.remove('is-valid');
                password.classList.add('is-invalid');
                passError.classList.remove('d-none');
            }
        });

        // Spinner on submit
        form.addEventListener('submit', () => {
            document.getElementById('loginBtn').disabled = true;
            document.getElementById('btnText').textContent = "Loading...";
            document.getElementById('spinner').classList.remove('d-none');
        });
    </script>

</body>

</html>
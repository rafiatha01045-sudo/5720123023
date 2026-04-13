<!DOCTYPE html>
<html lang="id">

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #667eea;
            --primary-hover: #5a6cd6;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --input-bg: rgba(255, 255, 255, 0.9);
            --danger: #ff4757;
            --success: #2ed573;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: radial-gradient(circle at 10% 20%, rgb(239, 246, 249) 0%, rgb(206, 239, 253) 90%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .circle-1,
        .circle-2 {
            position: absolute;
            border-radius: 50%;
            z-index: 0;
            filter: blur(40px);
        }

        .circle-1 {
            width: 300px;
            height: 300px;
            background: rgba(102, 126, 234, 0.2);
            top: -50px;
            left: -50px;
        }

        .circle-2 {
            width: 400px;
            height: 400px;
            background: rgba(118, 75, 162, 0.15);
            bottom: -100px;
            right: -100px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 30px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
            position: relative;
            z-index: 1;
        }

        .header-text {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-text h3 {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .header-text p {
            color: var(--text-light);
            font-size: 14px;
        }

        /* Styling Form Input - Margin diperbesar agar teks error tidak nabrak */
        .input-group-custom {
            position: relative;
            margin-bottom: 28px;
        }

        .input-group-custom i.icon-left {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 18px;
            z-index: 2;
        }

        .form-control {
            background: var(--input-bg);
            border: 1px solid transparent;
            border-radius: 50px;
            padding: 14px 20px 14px 48px;
            font-size: 15px;
            color: var(--text-dark);
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
            width: 100%;
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        .form-control:focus {
            background: #ffffff;
            border-color: rgba(102, 126, 234, 0.5);
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .input-group-custom:focus-within i.icon-left {
            color: var(--primary);
        }

        .toggle-password {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            z-index: 2;
            border: none;
            background: none;
        }

        .toggle-password:hover {
            color: var(--text-dark);
        }

        .is-valid-input {
            border-color: var(--success) !important;
        }

        .is-invalid-input {
            border-color: var(--danger) !important;
        }

        /* PERBAIKAN: Posisi error dibuat melayang di bawah input */
        .error-message {
            font-size: 12px;
            color: var(--danger);
            position: absolute;
            left: 20px;
            top: 100%;
            margin-top: 4px;
            display: none;
        }

        .btn-login {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            width: 100%;
            padding: 14px;
            font-weight: 600;
            font-size: 16px;
            margin-top: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.35);
        }

        .btn-login:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.45);
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
            /* Disesuaikan sedikit karena margin input di atas nambah */
            margin-bottom: 20px;
            font-size: 13px;
        }

        .options a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .options a:hover {
            text-decoration: underline;
        }

        .form-check-input {
            border-radius: 4px;
            border-color: #cbd5e1;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            color: var(--text-light);
            padding-top: 1px;
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: var(--text-light);
        }

        .register-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        @media (max-width: 480px) {
            .glass-card {
                padding: 30px 20px;
                border-radius: 20px;
                margin: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="circle-1"></div>
    <div class="circle-2"></div>

    <div class="glass-card">

        @if(session('error'))
            <div class="alert alert-danger" style="border-radius: 15px; font-size: 14px;">
                <i class="bi bi-x-circle-fill me-1"></i> {{ session('error') }}
            </div>
        @endif

        <form id="loginForm" action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="input-group-custom">
                <i class="bi bi-person icon-left"></i>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                <div class="error-message" id="emailError">Format email tidak valid</div>
            </div>

            <div class="input-group-custom">
                <i class="bi bi-lock icon-left"></i>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                <button type="button" class="toggle-password" id="togglePassword">
                    <i class="bi bi-eye-slash" id="eyeIcon"></i>
                </button>
                <div class="error-message" id="passError">Minimal 6 karakter</div>
            </div>

            <div class="options">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" id="loginBtn"
                class="btn-login d-flex justify-content-center align-items-center gap-2">
                <span id="btnText">Login</span>
                <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
            </button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="#">Daftar Sekarang</a>
        </div>

    </div>

    <script>
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const form = document.getElementById('loginForm');

        const emailError = document.getElementById('emailError');
        const passError = document.getElementById('passError');

        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        // Validasi Email Real-time
        email.addEventListener('input', () => {
            if (email.value === '') {
                email.classList.remove('is-valid-input', 'is-invalid-input');
                emailError.style.display = 'none';
                return;
            }

            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (regex.test(email.value)) {
                email.classList.add('is-valid-input');
                email.classList.remove('is-invalid-input');
                emailError.style.display = 'none';
            } else {
                email.classList.add('is-invalid-input');
                email.classList.remove('is-valid-input');
                emailError.style.display = 'block';
            }
        });

        // Validasi Password Real-time
        password.addEventListener('input', () => {
            if (password.value === '') {
                password.classList.remove('is-valid-input', 'is-invalid-input');
                passError.style.display = 'none';
                return;
            }

            if (password.value.length >= 6) {
                password.classList.add('is-valid-input');
                password.classList.remove('is-invalid-input');
                passError.style.display = 'none';
            } else {
                password.classList.add('is-invalid-input');
                password.classList.remove('is-valid-input');
                passError.style.display = 'block';
            }
        });

        // Fitur Tampilkan/Sembunyikan Password
        togglePassword.addEventListener('click', () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            if (type === 'text') {
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            } else {
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            }
        });

        // Efek Loading saat Submit
        form.addEventListener('submit', () => {
            if (email.value !== '' && password.value.length >= 6) {
                document.getElementById('loginBtn').disabled = true;
                document.getElementById('btnText').textContent = "Please wait...";
                document.getElementById('spinner').classList.remove('d-none');
            }
        });
    </script>

</body>

</html>
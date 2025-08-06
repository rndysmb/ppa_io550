<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Anak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            min-height: 100vh;
            overflow-x: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem 2rem;
            border-radius: 1.2rem;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.2);
            max-width: 550px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(83, 125, 93, 0.2);
            border: 3px solid rgba(83, 125, 93, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            backdrop-filter: blur(6px);
            animation: float 3s ease-in-out infinite;
        }

        .header-icon i {
            font-size: 2rem;
            color: #537D5D;
        }

        h2 {
            font-size: 1.8rem;
            color: #2c3e50;
        }

        .subtitle {
            font-size: 1rem;
            color: #555;
            margin-top: 0.3rem;
        }

        .form-group {
            margin-top: 1.2rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            transition: 0.2s;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.6rem 2.5rem 0.6rem 0.9rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }

        .input-icon {
            position: absolute;
            right: 12px;
            color: #888;
        }

        .password-toggle {
            position: absolute;
            right: 36px;
            background: none;
            border: none;
            cursor: pointer;
            color: #888;
            font-size: 1rem;
        }

        .password-hint {
            font-size: 0.85rem;
            color: #777;
            margin-top: 0.3rem;
            margin-left: 2px;
        }

        .btn-group {
            margin-top: 2rem;
        }

        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: bold;
            color: #4C915C;
            background: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            color: #537D5D;
        }

        .loading {
            width: 18px;
            height: 18px;
            border: 3px solid #ccc;
            border-top: 3px solid #4C915C;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .error-message, .success-message {
            display: none;
            padding: 0.75rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .error-message {
            background: #fce4e4;
            color: #c0392b;
            border-left: 5px solid #e74c3c;
        }

        .success-message {
            background: #e0f9e2;
            color: #2ecc71;
            border-left: 5px solid #2ecc71;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="header">
            <div class="header-icon">
                <i class="fas fa-user-edit"></i>
            </div>
            <h2>Edit Data Anak</h2>
            <p class="subtitle">Perbarui informasi data anak dengan lengkap</p>
        </div>

        <div class="error-message" id="errorMessage">
            <i class="fas fa-exclamation-triangle"></i>
            <span id="errorText"></span>
        </div>

        <div class="success-message" id="successMessage">
            <i class="fas fa-check-circle"></i>
            <span id="successText"></span>
        </div>

        <form action="{{ route('mentor.data_anak.update', $anak->id) }}" method="POST" id="editForm">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nomor_induk">Nomor Induk</label>
                <div class="input-wrapper">
                    <input type="text" id="nomor_induk" name="nomor_induk" value="{{ $anak->nomor_induk }}" required autocomplete="off">
                    <i class="fas fa-id-card input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <div class="input-wrapper">
                    <input type="text" id="nama" name="nama" value="{{ $anak->nama }}" required autocomplete="name">
                    <i class="fas fa-user input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" autocomplete="new-password">
                    <i class="fas fa-lock input-icon"></i>
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="password-hint">Kosongkan jika tidak ingin mengubah password</div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-primary" id="submitBtn">
                    <div class="loading" id="loading"></div>
                    <i class="fas fa-save" id="saveIcon"></i>
                    <span id="btnText">Perbarui Data</span>
                </button>
            </div>
        </form>

        <a href="{{ route('mentor.data_anak') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar Anak
        </a>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const toggleIcon = togglePassword.querySelector('i');

        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            toggleIcon.classList.toggle('fa-eye');
            toggleIcon.classList.toggle('fa-eye-slash');
        });

        const form = document.getElementById('editForm');
        const submitBtn = document.getElementById('submitBtn');
        const loading = document.getElementById('loading');
        const saveIcon = document.getElementById('saveIcon');
        const btnText = document.getElementById('btnText');

        form.addEventListener('submit', function(e) {
            submitBtn.disabled = true;
            loading.style.display = 'block';
            saveIcon.style.display = 'none';
            btnText.textContent = 'Memperbarui...';

            const nomorInduk = document.getElementById('nomor_induk').value.trim();
            const nama = document.getElementById('nama').value.trim();
            const password = passwordField.value;

            if (!nomorInduk || !nama) {
                e.preventDefault();
                showError('Nomor induk dan nama harus diisi!');
                resetSubmitButton();
                return;
            }

            if (password && password.length < 6) {
                e.preventDefault();
                showError('Password minimal 6 karakter!');
                resetSubmitButton();
                return;
            }
        });

        function resetSubmitButton() {
            submitBtn.disabled = false;
            loading.style.display = 'none';
            saveIcon.style.display = 'inline';
            btnText.textContent = 'Perbarui Data';
        }

        function showError(message) {
            const errorDiv = document.getElementById('errorMessage');
            const errorText = document.getElementById('errorText');
            errorText.textContent = message;
            errorDiv.style.display = 'flex';
            setTimeout(() => { errorDiv.style.display = 'none'; }, 5000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('nomor_induk').focus();
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan Akun Mentor</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            padding: 30px;
            max-width: 600px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
            font-size: 15px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 20px;
            background-color: #2c7be5;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1a5fc2;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2c7be5;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="card">
        <h2>Ubah Password</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('mentor.password.update') }}">
            @csrf

            <div class="form-group">
                <label for="password_lama">Password Lama:</label>
                <input type="password" name="password_lama" id="password_lama">
                @error('password_lama') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_baru">Password Baru:</label>
                <input type="password" name="password_baru" id="password_baru">
                @error('password_baru') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_baru_confirmation">Konfirmasi Password Baru:</label>
                <input type="password" name="password_baru_confirmation" id="password_baru_confirmation">
            </div>

            <button type="submit">Simpan Perubahan</button>
        </form>

        <a href="{{ route('mentor.dashboard') }}" class="back-link">← Kembali ke Dashboard</a>
    </div>

</body>
</html>

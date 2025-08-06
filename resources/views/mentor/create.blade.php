<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anak</title>
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
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(83, 125, 93, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            border: 3px solid rgba(83, 125, 93, 0.3);
            backdrop-filter: blur(8px);
            animation: float 3s ease-in-out infinite;
        }

        .profile-avatar i {
            font-size: 2.5rem;
            color: #537D5D;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-top: 1rem;
            margin-bottom: 0.3rem;
            color: #333;
        }

        input[type="text"], input[type="number"], input[type="password"] {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }

        button {
            margin-top: 1.5rem;
            width: 100%;
            padding: 0.7rem;
            background-color: white;
            color: #4C915C;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            color: #667eea;
        }

        a {
            display: block;
            margin-top: 1rem;
            color: #2c3e50;
            text-align: center;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-list {
            background-color: #fce4e4;
            color: #c0392b;
            border-left: 5px solid #e74c3c;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="profile-avatar">
            <i class="fas fa-child"></i>
        </div>
        <h2>Tambah Data Anak</h2>

        @if ($errors->any())
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('mentor.data_anak.store') }}" method="POST">
            @csrf
            <label for="nomor_induk">Nomor Induk</label>
            <input type="text" id="nomor_induk" name="nomor_induk" required>

            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Simpan</button>
        </form>

        <a href="{{ route('mentor.data_anak') }}">← Kembali ke daftar anak</a>
    </div>
</body>
</html>

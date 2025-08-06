<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Tugas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --green: #537D5D;
            --gray: #6c757d;
            --bg-light: #f2f4f8;
            --text-dark: #2c3e50;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            color: var(--text-dark);
            margin: 0;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            animation: fadeInUp 0.6s ease;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 30px;
            text-align: center;
            color: var(--text-dark);
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: 600;
            font-size: 15px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 15px;
            transition: border-color 0.3s ease;
            background: #fefefe;
        }

        input:focus, textarea:focus {
            border-color: var(--green);
            outline: none;
        }

        .btn-group {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            flex-wrap: wrap;
        }

        button, a.button-link {
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s ease;
        }

        button {
            background-color: var(--green);
            color: white;
        }

        button:hover {
            background-color: #3d6249;
        }

        a.button-link {
            background-color: var(--gray);
            color: white;
        }

        a.button-link:hover {
            background-color: #5a6268;
        }

        .error-box {
            background-color: #f8d7da;
            color: #842029;
            padding: 14px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 25px;
                border-radius: 15px;
            }

            h2 {
                font-size: 22px;
            }

            .btn-group {
                justify-content: center;
            }

            button, a.button-link {
                padding: 10px 18px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
        {{-- Include navbar --}}
    @include('mentor.nav_tugas ')
    <div class="container">
        <h2><i class="fas fa-tasks"></i> Buat Tugas Baru</h2>

        @if ($errors->any())
            <div class="error-box">
                <strong>Ups! Ada kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mentor.tugas.store') }}" method="POST">
            @csrf

            <label for="judul">Judul Tugas</label>
            <input type="text" id="judul" name="judul" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="5"></textarea>

            <label for="batas_waktu">Batas Waktu</label>
            <input type="datetime-local" id="batas_waktu" name="batas_waktu">

            <div class="btn-group">
                <a href="{{ route('mentor.tugas.index') }}" class="button-link"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>

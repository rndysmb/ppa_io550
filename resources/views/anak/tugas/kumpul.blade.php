<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumpulkan Tugas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(-45deg, #30e8bf, #ff8235);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: start;
            padding-top: 40px;
        }

        .form-wrapper {
            width: 100%;
            max-width: 850px;
            background-color: rgba(255, 255, 255, 0.32);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            margin: 20px;
        }

        h2 {
            margin-top: 0;
            font-size: 1.8rem;
            color: #333;
        }

        .description {
            background-color: rgba(255, 255, 255, 0.34);
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            font-size: 14px;
        }

        button, a.button-secondary {
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            font-size: 14px;
            margin-top: 20px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        a.button-secondary {
            background-color: #6c757d;
            color: white;
        }

        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }

        @media (max-width: 768px) {
            .form-wrapper {
                padding: 20px;
            }

            h2 {
                font-size: 1.4rem;
            }

            button, a.button-secondary {
                width: 100%;
                margin-bottom: 10px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            </div>
        @endif

        <h2>Kumpulkan Tugas: {{ $tugas->judul }}</h2>

        <div class="description">
            <strong>Deskripsi:</strong><br>
            {{ $tugas->deskripsi }}
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('anak.tugas.submit', $tugas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="jawaban_teks">Jawaban Teks:</label>
            <textarea name="jawaban_teks" id="jawaban_teks" rows="5" placeholder="Tulis jawabanmu di sini..."></textarea>

            <label for="file_jawaban">Upload File (gambar/pdf - opsional):</label>
            <input type="file" name="file_jawaban" id="file_jawaban" accept=".jpg,.jpeg,.png,.pdf">

             @if ($errors->any())
            <div class="alert alert-error">
                <strong>Ups! Ada kesalahan:</strong>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                
            </div>
            @endif
        
            <button type="submit">Kumpulkan Tugas</button>
            <a href="{{ route('anak.tugas.index') }}" class="button-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>

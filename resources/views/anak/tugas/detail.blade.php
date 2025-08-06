<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Tugas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(-45deg, #30e8bf, #ff8235);
            color: #333;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
        }
        h2 {
            margin-top: 0;
        }
        .file-link {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .file-link:hover {
            background: #0056b3;
        }
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>{{ $tugas->judul }}</h2>
        <p><strong>Deskripsi:</strong><br>{{ $tugas->deskripsi }}</p>

        <hr>

        <p><strong>Jawaban Teks:</strong></p>
        <p>{{ $jawaban->jawaban_teks ?? 'Tidak ada jawaban teks.' }}</p>

        @if ($jawaban->file_jawaban)
            <p><strong>File:</strong></p>
            <a class="file-link" href="{{ asset('storage/' . $jawaban->file_jawaban) }}" target="_blank">
                Lihat File
            </a>
        @endif

        <p style="margin-top: 20px;"><strong>Waktu Pengumpulan:</strong> {{ \Carbon\Carbon::parse($jawaban->created_at)->translatedFormat('d F Y H:i') }}</p>

        <a href="{{ route('anak.tugas.index') }}" style="display:inline-block;margin-top:20px;text-decoration:none;padding:10px 15px;background:#6c757d;color:white;border-radius:5px;">Kembali</a>
    </div>
</body>
</html>

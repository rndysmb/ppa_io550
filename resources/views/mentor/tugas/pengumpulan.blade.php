<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengumpulan Tugas - {{ $tugas->judul }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .header-section {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }

        h1 {
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 600;
            margin: 0 0 0.5rem 0;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            color: #6c757d;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .task-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .info-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid #e9ecef;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .info-card h3 {
            color: #537D5D;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0 0 0.5rem 0;
        }

        .info-card p {
            color: #6c757d;
            margin: 0;
            line-height: 1.5;
        }



        
        .table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            margin-bottom: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: transparent;
        }

        th, td {
            padding: 16px 20px;
            text-align: left;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr {
            transition: background-color 0.2s ease;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .empty-state {
            color: #6c757d;
            font-style: italic;
        }

        .empty-row {
            text-align: center;
            font-style: italic;
            color: #6c757d;
            padding: 3rem;
            font-size: 1.1rem;
        }

        .empty-row::before {
            content: "📋";
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
        }

        .file-link {
            color: #537D5D;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .file-link:hover {
            text-decoration: underline;
        }

        .file-link i {
            font-size: 0.9rem;
        }

        
        /* Animasi untuk loading state */
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

        .table-container {
            animation: fadeInUp 0.6s ease;
        }

        .header-section {
            animation: fadeInUp 0.4s ease;
        }

        .task-info {
            animation: fadeInUp 0.5s ease;
        }

        

        /* Responsive design untuk perangkat dengan lebar maksimum 768px */
@media (max-width: 768px) {
    body {
        padding: 1rem 0;
        font-size: 14px;
    }

    .container {
        padding: 0 1rem;
    }

    h1 {
        font-size: 1.5rem;
    }

    .header-section {
        padding: 1.2rem;
        border-radius: 12px;
        text-align: center;
    }

    .table-container {
        border-radius: 12px;
        overflow-x: auto;
    }

    .task-info {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    table,
    thead,
    tbody,
    th,
    td,
    tr {
        display: block;
        width: 100%;
    }

    thead {
        display: none;
    }

    tr {
        margin-bottom: 1.5rem;
        padding: 1rem;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
    }

    td {
        border: none;
        padding: 0.6rem 0;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        text-align: left;
    }

    td::before {
        content: attr(data-label);
        font-weight: bold;
        color: #2d3748;
        width: 45%;
        text-align: left;
        font-size: 0.9rem;
    }

    td span,
    td a,
    td p {
        width: 50%;
        font-size: 0.9rem;
    }
    

    .empty-row {
        padding: 2rem 1rem;
        text-align: center;
    }
}

@media (hover: none) and (pointer: coarse) {
    tr:hover {
        background: transparent;
        transform: none;
    }

    .header-section {
        border-radius: 10px;
        padding: 1.5rem;
    }

    .table-container {
        border-radius: 10px;
    }
}

    </style>
</head>
<body>

    {{-- Include navbar --}}
    @include('mentor.nav_tugas ')
    <div class="container">
        <div class="header-section">
            <h1>Pengumpulan Tugas</h1>
            <p class="subtitle">{{ $tugas->judul }}</p>
        </div>

        <div class="task-info">
            <div class="info-card">
                <h3><i class="fas fa-info-circle"></i> Deskripsi Tugas</h3>
                <p>{{ $tugas->deskripsi }}</p>
            </div>
            <div class="info-card">
                <h3><i class="fas fa-clock"></i> Batas Waktu</h3>
                <p>{{ $tugas->batas_waktu ? \Carbon\Carbon::parse($tugas->batas_waktu)->format('d M Y H:i') : 'Tidak ada batas waktu' }}</p>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anak</th>
                        <th>Jawaban Teks</th>
                        <th>File Jawaban</th>
                        <th>Waktu Kumpul</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tugas->pengumpulan as $index => $item)
                        @php
                            $batasWaktu = $tugas->batas_waktu ? \Carbon\Carbon::parse($tugas->batas_waktu) : null;
                            $terlambat = $batasWaktu && $item->created_at->gt($batasWaktu);
                        @endphp

                        <tr @if($terlambat) style="background-color: #ffe5e5;" @endif>
                            <td data-label="No">{{ $index + 1 }}</td>
                            <td data-label="Nama Anak">{{ $item->anak->nama ?? 'Tidak diketahui' }}</td>
                            <td data-label="Jawaban Teks">
                                @if($item->jawaban_teks)
                                    {{ Str::limit($item->jawaban_teks, 50) }}
                                @else
                                    <span class="empty-state">Tidak ada</span>
                                @endif
                            </td>
                            <td data-label="File Jawaban">
                                @if($item->file_jawaban)
                                    <a href="{{ asset('storage/' . $item->file_jawaban) }}" target="_blank" class="file-link">
                                        <i class="fas fa-file-alt"></i> Lihat File
                                    </a>
                                @else
                                    <span class="empty-state">Tidak ada</span>
                                @endif
                            </td>
                            <td data-label="Waktu Kumpul">
                                {{ $item->created_at->format('d M Y H:i') }}
                                @if($terlambat)
                                    <span style="color: red; font-weight: bold;"> (Terlambat)</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-row">Belum ada anak yang mengumpulkan tugas</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</body>
</html>
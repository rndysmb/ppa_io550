<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
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
        
        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .action-buttons a.btn-view,
        .action-buttons button.btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            min-width: 120px;
            height: 32px;
        }

        .action-buttons a.btn-view {
            background-color: #007bff;
            color: white;
        }

        .action-buttons a.btn-view:hover {
            background-color: #0056b3;
            transform: translateY(-1px);
        }

        .action-buttons button.btn-delete {
            background-color: #e74c3c;
            color: white;
        }

        .action-buttons button.btn-delete:hover {
            background-color: #c0392b;
            transform: translateY(-1px);
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
        
        .add-button-container {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }
        
        a.button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background-color: #537D5D;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2);
        }
        
        a.button:hover {
            background-color: #4a6d54;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(7, 108, 30, 0.61);
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 2rem;
            border: 1px solid #c3e6cb;
            text-align: center;
            font-weight: 500;
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
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
        
        .empty-row {
            text-align: center;
            font-style: italic;
            color: #6c757d;
            padding: 3rem;
            font-size: 1.1rem;
        }
        
        .empty-row::before {
            content: "📝";
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
        }
        
        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .action-buttons a.btn-view {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            background-color: #007bff;
            color: white;
            min-width: 120px;
            height: 32px;
        }
        
        .action-buttons a.btn-view:hover {
            background-color: #0056b3;
            transform: translateY(-1px);
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
        
        /* Responsive design */
        @media (max-width: 768px) {
            body {
                padding: 1rem 0;
            }
            
            .container {
                padding: 0 1rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .header-section {
                padding: 1.5rem;
                border-radius: 15px;
            }
            
            .table-container {
                border-radius: 15px;
            }
            
            table, thead, tbody, th, td, tr {
                display: block;
            }
            
            thead tr {
                display: none;
            }
            
            tr {
                margin-bottom: 1.5rem;
                border-radius: 15px;
                padding: 1rem;
                background: rgba(255, 255, 255, 0.9);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                border: 1px solid rgba(0, 0, 0, 0.05);
            }
            
            tr:hover {
                transform: none;
            }
            
            td {
                border: none;
                padding: 0.8rem 0;
                position: relative;
                text-align: right;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            td::before {
                content: attr(data-label) ":";
                font-weight: 700;
                color: #2c3e50;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                font-size: 0.9rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 8px;
                width: 100%;
            }
            
            .action-buttons a.btn-view {
                width: 100%;
                justify-content: center;
            }
            
            .empty-row {
                padding: 2rem 1rem;
            }
        }
        
        /* Hover effects untuk mobile */
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
            
            .action-buttons a.btn-view:hover,
            a.button:hover {
                transform: none;
            }
        }
    </style>
</head>
<body>
    {{-- Include navbar --}}
    @include('mentor.navbar')

    <div class="container">
        <div class="header-section">
            <h1>Daftar Tugas</h1>
            <p class="subtitle">Kelola dan pantau tugas-tugas anak</p>

            <div class="add-button-container">
                <a href="{{ route('mentor.tugas.create') }}" class="button">
                    <i class="fas fa-file-alt"></i> Buat Tugas Baru
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Batas Waktu</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tugas as $index => $item)
                        <tr>
                            <td data-label="No">{{ $index + 1 }}</td>
                            <td data-label="Judul">{{ $item->judul }}</td>
                            <td data-label="Batas Waktu">{{ $item->batas_waktu ?? 'Tidak ada' }}</td>
                            <td data-label="Dibuat">{{ $item->created_at->format('d M Y') }}</td>
                            <td data-label="Aksi" class="action-buttons">
                                <a href="{{ route('mentor.tugas.pengumpulan', $item->id) }}" class="btn-view" title="Lihat Pengumpulan">
                                    <i class="fas fa-eye"></i> Lihat Pengumpulan
                                </a>

                                <form action="{{ route('mentor.tugas.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus tugas ini?')" title="Hapus Tugas">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-row">Belum ada tugas yang tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
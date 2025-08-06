<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Progress Bacaan Anak</title>

    <link rel="stylesheet" href="/css/navbar.css" />
    <link rel="stylesheet" href="/css/main.css" />
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

        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: #537D5D;
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(83, 125, 93, 0.2);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(83, 125, 93, 0.3);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
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

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
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
            content: "📊";
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
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

        .stats-cards {
            animation: fadeInUp 0.5s ease;
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

            .stats-cards {
                grid-template-columns: 1fr;
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

            .empty-row {
                padding: 2rem 1rem;
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

            .stat-card:hover {
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
            <h1>Laporan Progress Bacaan</h1>
            <p class="subtitle">Pantau kemajuan membaca anak-anak</p>
        </div>

        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-number">{{ count($anakList) }}</div>
                <div class="stat-label">Total Anak</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $anakList->where('progresTerakhir')->count() }}</div>
                <div class="stat-label">Aktif Membaca</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $anakList->where('progresTerakhir', null)->count() }}</div>
                <div class="stat-label">Belum Memulai</div>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anak</th>
                        <th>Nomor Induk</th>
                        <th>Kitab Terakhir</th>
                        <th>Pasal Terakhir</th>
                        <th>Waktu Update</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anakList as $index => $anak)
                        <tr>
                            <td data-label="No">{{ $index + 1 }}</td>
                            <td data-label="Nama Anak">{{ $anak->nama }}</td>
                            <td data-label="Nomor Induk">{{ $anak->nomor_induk }}</td>
                            <td data-label="Kitab Terakhir">
                                @if($anak->progresTerakhir?->kitab)
                                    {{ $anak->progresTerakhir->kitab }}
                                @else
                                    <span class="empty-state">Belum dimulai</span>
                                @endif
                            </td>
                            <td data-label="Pasal Terakhir">
                                @if($anak->progresTerakhir?->pasal)
                                    {{ $anak->progresTerakhir->pasal }}
                                @else
                                    <span class="empty-state">-</span>
                                @endif
                            </td>
                            <td data-label="Waktu Update">
                                @if($anak->progresTerakhir?->updated_at)
                                    {{ $anak->progresTerakhir->updated_at }}
                                    @if($anak->progresTerakhir->updated_at > now()->subDays(7))
                                        <span class="status-badge status-active">Aktif</span>
                                    @else
                                        <span class="status-badge status-inactive">Tidak Aktif</span>
                                    @endif
                                @else
                                    <span class="empty-state">Belum ada aktivitas</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-row">Belum ada data progress bacaan yang tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
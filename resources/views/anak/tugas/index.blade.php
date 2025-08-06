<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas - Anak</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(-45deg, #30e8bf, #ff8235);
            font-family: 'comic sans ms', 'Times New Roman', serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        main {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .greeting {
            text-align: center;
            margin-bottom: 2.5rem;
            padding: 2rem;
            background: 	transparent;
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            max-width: 70%;
            width: 100%;
        }

        
        .greeting h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffffff;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            margin-bottom: 0.5rem;
            animation: slideInDown 1s ease;
        }

        .greeting p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            font-weight: 400;
            animation: slideInUp 1s ease 0.3s both;
            position: relative;
            z-index: 1;
        }


        .alert-success {
            background: rgba(212, 237, 218, 0.95);
            backdrop-filter: blur(15px);
            color: #155724;
            padding: 1.5rem 2rem;
            border-radius: 20px;
            margin:  0 0 2.5rem 0;
            border: 1px solid rgba(40, 167, 69, 0.3);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideInDown 0.8s ease;
            font-weight: 500;
        }

        .tugas-container {
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(25px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
            padding: 3rem;
            margin-bottom: 2rem;
        }

        
        .section-header {
            margin: 0 0 1rem 0;
            padding: 1rem;
            background: rgba(0, 0, 0, 0.09);
            border-radius: 15px;
        }

        .section-header h3 {
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .section-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        .tugas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .tugas-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            min-height: 200px;
        }

        .tugas-card.completed {
            background: rgba(72, 187, 120, 0.15);
            border-color: rgba(72, 187, 120, 0.3);
        }

        .tugas-card.overdue {
            background: rgba(229, 62, 62, 0.15);
            border-color: rgba(229, 62, 62, 0.3);
        }

        .tugas-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            pointer-events: none;
        }


        .tugas-header {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .tugas-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            flex-shrink: 0;
            position: relative;
        }

        .tugas-icon.completed {
            background: linear-gradient(135deg, #48bb78, #38a169);
            box-shadow: 0 8px 25px rgba(72, 187, 120, 0.4);
        }

        .tugas-icon.overdue {
            background: linear-gradient(135deg, #e53e3e, #c53030);
            box-shadow: 0 8px 25px rgba(229, 62, 62, 0.4);
        }

        .status-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 25px;
            height: 25px;
            background: #48bb78;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(72, 187, 120, 0.4);
        }

        .tugas-content {
            flex: 1;
            position: relative;
            z-index: 1;
        }

        .tugas-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }

        .tugas-status {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .tugas-status.completed {
            background: rgba(72, 187, 120, 0.2);
            color: #38a169;
            border: 1px solid rgba(72, 187, 120, 0.3);
        }

        .tugas-status.pending {
            background: rgba(49, 130, 206, 0.2);
            color: #2b6cb0;
            border: 1px solid rgba(49, 130, 206, 0.3);
        }

        .tugas-deadline {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: #4a5568;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            padding: 0.8rem 1.2rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .tugas-deadline.urgent {
            background: rgba(254, 202, 202, 0.3);
            border-color: rgba(245, 101, 101, 0.3);
            color: #c53030;
            font-weight: 600;
            animation: pulse 2s infinite;
        }

        .tugas-deadline.soon {
            background: rgba(255, 235, 156, 0.3);
            border-color: rgba(236, 201, 75, 0.3);
            color: #b7791f;
            font-weight: 600;
        }

        .tugas-deadline.normal {
            background: rgba(190, 242, 100, 0.3);
            border-color: rgba(154, 230, 180, 0.3);
            color: #38a169;
            font-weight: 500;
        }

        .tugas-deadline.overdue {
            background: rgba(254, 202, 202, 0.4);
            border-color: rgba(245, 101, 101, 0.4);
            color: #c53030;
            font-weight: 700;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            border-radius: 15px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            position: relative;
            z-index: 1;
            width: 100%;
            justify-content: center;
        }

        .btn.completed {
            background: linear-gradient(135deg, #48bb78, #38a169);
            box-shadow: 0 8px 25px rgba(72, 187, 120, 0.4);
        }

        .btn.disabled {
            background: rgba(107, 114, 128, 0.5);
            cursor: not-allowed;
            box-shadow: none;
        }

        .btn:hover:not(.disabled) {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.5);
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
        }

        .btn.completed:hover {
            box-shadow: 0 12px 35px rgba(72, 187, 120, 0.5);
            background: linear-gradient(135deg, #38a169, #2f855a);
        }

        .btn:active {
            transform: translateY(-1px);
        }

        .empty-state {
            text-align: center;
            padding: 4rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .empty-state i {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            opacity: 0.6;
        }

        .empty-state h3 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .empty-state p {
            font-size: 1.2rem;
            opacity: 0.8;
        }

        
        /* Responsive */
        @media (max-width: 1024px) {
            .tugas-grid {
                grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            main {
                padding: 0 1rem;
            }

            .greeting {
                padding: 2rem 1.5rem;
                margin-bottom: 2rem;
            }

            .greeting h1 {
                font-size: 2.2rem;
            }

            .greeting p {
                font-size: 1rem;
            }

            .tugas-container {
                padding: 2rem;
            }

            .tugas-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .tugas-card {
                padding: 1.5rem;
                min-height: auto;
            }

            .tugas-header {
                gap: 1rem;
            }

            .tugas-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .tugas-title {
                font-size: 1.3rem;
            }

            .tugas-deadline {
                font-size: 0.9rem;
                padding: 0.6rem 1rem;
            }

            .btn {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            main {
                margin: 1rem auto;
                padding: 0 0.5rem;
            }

            .greeting {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }

            .greeting h1 {
                font-size: 1.8rem;
            }

            .tugas-container {
                padding: 1.5rem;
            }

            .tugas-card {
                padding: 1.2rem;
            }

            .tugas-header {
                flex-direction: row;
                align-items: flex-start;
                gap: 1rem;
            }

            .tugas-icon {
                width: 45px;
                height: 45px;
                font-size: 1.3rem;
            }

            .tugas-title {
                font-size: 1.2rem;
            }


        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    {{-- Include navbar --}}
    @include('anak.navbar')

    <main>
        <section class="greeting">
            <h1><i class="fas fa-book-open"></i> Daftar Tugas</h1>
            <p>Kerjakan tugas-tugas yang diberikan dengan penuh semangat dan ketelitian</p>
        </section>

        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="tugas-container">

            @php
                $now = time();
                
                // Kelompokkan tugas berdasarkan status
                $tugasAktif = collect();
                $tugasSelesai = collect();
                $tugasTerlambat = collect();
                
                foreach ($tugas as $item) {
                    // Cek apakah tugas sudah dikumpulkan (asumsi ada kolom 'dikumpulkan' atau 'status')
                    // Sesuaikan dengan struktur database Anda
                    $sudahDikumpulkan = in_array($item->id, $tugasDikumpulkan);
                    // Atau bisa pakai: $sudahDikumpulkan = $item->status == 'dikumpulkan';
                    
                    if ($sudahDikumpulkan) {
                        $tugasSelesai->push($item);
                    } else {
                        $deadline = $item->batas_waktu ? strtotime($item->batas_waktu) : null;
                        if ($deadline && $deadline < $now) {
                            $tugasTerlambat->push($item);
                        } else {
                            $tugasAktif->push($item);
                        }
                    }
                }
                
                // Urutkan masing-masing kelompok
                $tugasAktif = $tugasAktif->sortBy(function($item) {
                    return $item->batas_waktu ? strtotime($item->batas_waktu) : strtotime($item->created_at) + (365 * 24 * 60 * 60);
                });
                
                $tugasTerlambat = $tugasTerlambat->sortBy(function($item) {
                    return $item->batas_waktu ? strtotime($item->batas_waktu) : strtotime($item->created_at);
                });
                
                $tugasSelesai = $tugasSelesai->sortByDesc(function($item) {
                    return $item->updated_at ? strtotime($item->updated_at) : strtotime($item->created_at);
                });
            @endphp

            {{-- Tugas Aktif --}}
            @if($tugasAktif->count() > 0)
                <div class="section-header">
                    <h3><i class="fas fa-clock"></i> Tugas Aktif</h3>
                    <p>Tugas yang masih harus dikerjakan</p>
                </div>
                <div class="tugas-grid">
                    @foreach ($tugasAktif as $item)
                        <div class="tugas-card">
                            <div class="tugas-header">
                                <div class="tugas-icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="tugas-content">
                                    <h3 class="tugas-title">{{ $item->judul }}</h3>
                                    <div class="tugas-status pending">
                                        <i class="fas fa-hourglass-half"></i>
                                        Belum Dikerjakan
                                    </div>
                                    <div class="tugas-deadline {{ $item->batas_waktu ? (strtotime($item->batas_waktu) - $now <= 86400 ? 'urgent' : (strtotime($item->batas_waktu) - $now <= 259200 ? 'soon' : 'normal')) : 'normal' }}">
                                        <i class="fas fa-clock"></i>
                                        @if($item->batas_waktu)
                                            @php
                                                $deadline = strtotime($item->batas_waktu);
                                                $diff = $deadline - $now;
                                                $days = floor($diff / (24 * 60 * 60));
                                                $hours = floor(($diff % (24 * 60 * 60)) / (60 * 60));
                                                $minutes = floor(($diff % (60 * 60)) / 60);
                                            @endphp
                                            @if($days == 0 && $hours >= 0 && $minutes >= 0)
                                                <span style="color: #e53e3e; font-weight: bold;">
                                                    Hari ini! ({{ $hours }} jam {{ $minutes }} menit lagi)
                                                </span>
                                            @elseif($days == 1)
                                                <span style="color: #d69e2e; font-weight: bold;">Besok</span>
                                            @else
                                                {{ $days }} hari lagi ({{ date('d M Y', $deadline) }})
                                            @endif
                                        @else
                                            <span style="color: #4a5568;">Tidak ada batas waktu</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('anak.tugas.kumpul', $item->id) }}" class="btn">
                                        <i class="fas fa-pencil-alt"></i>
                                        Kerjakan Tugas
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Tugas Terlambat --}}
            @if($tugasTerlambat->count() > 0)

                <div class="tugas-grid">
                    @foreach ($tugasTerlambat as $item)
                        <div class="tugas-card overdue">
                            <div class="tugas-header">
                                <div class="tugas-icon overdue">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="tugas-content">
                                    <h3 class="tugas-title">{{ $item->judul }}</h3>
                                    <div class="tugas-status pending">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Terlambat
                                    </div>
                                    <div class="tugas-deadline overdue">
                                        <i class="fas fa-clock"></i>
                                        @php
                                            $deadline = strtotime($item->batas_waktu);
                                            $diff = $now - $deadline;
                                            $days = floor($diff / (24 * 60 * 60));
                                        @endphp
                                        <span style="color: #e53e3e; font-weight: bold;">
                                            Terlambat {{ $days }} hari ({{ date('d M Y', $deadline) }})
                                        </span>
                                    </div>
                                    <a href="{{ route('anak.tugas.kumpul', $item->id) }}" class="btn">
                                        <i class="fas fa-pencil-alt"></i>
                                        Kerjakan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Tugas Selesai --}}
            @if($tugasSelesai->count() > 0)
                <div class="tugas-grid">
                    @foreach ($tugasSelesai as $item)
                        <div class="tugas-card completed">
                            <div class="tugas-header">
                                <div class="tugas-icon completed">
                                    <i class="fas fa-check-circle"></i>
                                    <div class="status-badge">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="tugas-content">
                                    <h3 class="tugas-title">{{ $item->judul }}</h3>
                                    <div class="tugas-status completed">
                                        <i class="fas fa-check-circle"></i>
                                        Sudah Dikumpulkan
                                    </div>
                                    <div class="tugas-deadline normal">
                                        <i class="fas fa-calendar-check"></i>
                                        @if($item->batas_waktu)
                                            Deadline: {{ date('d M Y', strtotime($item->batas_waktu)) }}
                                        @else
                                            Tidak ada batas waktu
                                        @endif
                                    </div>
                                    <a href="" class="btn completed">
                                        <i class="fas fa-eye"></i>
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Jika tidak ada tugas sama sekali --}}
            @if($tugasAktif->count() == 0 && $tugasTerlambat->count() == 0 && $tugasSelesai->count() == 0)
                <div class="empty-state">
                    <i class="fas fa-clipboard-list"></i>
                    <h3>Belum Ada Tugas</h3>
                    <p>Tugas belum tersedia saat ini. Silakan cek kembali nanti.</p>
                </div>
            @endif
        </div>
    </main>

    <script>
        // Function to update time remaining for today's deadline
        function updateTimeRemaining() {
            const deadlineElements = document.querySelectorAll('.tugas-deadline.urgent');
            deadlineElements.forEach(element => {
                const timeText = element.querySelector('span');
                if (timeText && timeText.textContent.includes('Hari ini!')) {
                    // Extract deadline from the card (you might need to pass this from PHP)
                    // For now, we'll update every minute
                    const now = new Date();
                    const endOfDay = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 23, 59, 59);
                    const diff = endOfDay - now;
                    
                    if (diff > 0) {
                        const hours = Math.floor(diff / (1000 * 60 * 60));
                        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                        timeText.innerHTML = `Hari ini! (${hours} jam ${minutes} menit lagi)`;
                    }
                }
            });
        }

        // Add entrance animations
        window.addEventListener('load', () => {
            const cards = document.querySelectorAll('.tugas-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 150);
            });
        });

        // Add smooth hover effects
        document.querySelectorAll('.tugas-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                if (!this.classList.contains('completed')) {
                    this.style.transform = 'translateY(-12px) scale(1.03)';
                } else {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Update time remaining every minute
        updateTimeRemaining();
        setInterval(updateTimeRemaining, 60000);

        // Add notification sound for urgent deadlines (optional)
        function checkUrgentDeadlines() {
            const urgentDeadlines = document.querySelectorAll('.tugas-deadline.urgent');
            if (urgentDeadlines.length > 0) {
                // You can add notification logic here
                console.log('Ada tugas dengan deadline hari ini!');
            }
        }

        // Check urgent deadlines on page load
        checkUrgentDeadlines();

        // Add click effect for buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                // Create ripple effect
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple effect CSS
        const style = document.createElement('style');
        style.textContent = `
            .btn {
                position: relative;
                overflow: hidden;
            }
            
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }
            
            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
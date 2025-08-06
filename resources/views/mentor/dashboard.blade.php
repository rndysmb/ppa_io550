<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Mentor</title>

    <link rel="stylesheet" href="/css/navbar.css" />
    <link rel="stylesheet" href="/css/main.css" />
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
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            padding: 2rem;
        }

        .hero-content {
            max-width: 800px;
            color: white;
            z-index: 2;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            border: 4px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            animation: float 3s ease-in-out infinite;
        }

        .profile-avatar i {
            font-size: 4rem;
            color: white;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .hero-description {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.8;
            line-height: 1.6;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .cta-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cta-btn.primary {
            background: white;
            color:rgb(76, 145, 92);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .cta-btn.primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            text-decoration: none;
            color: #667eea;
        }

        .cta-btn.secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .cta-btn.secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
            text-decoration: none;
            color: white;
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: floatAround 20s infinite linear;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: -7s;
        }

        .floating-element:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: -14s;
        }

        @keyframes floatAround {
            0% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(50px, -50px) rotate(120deg); }
            66% { transform: translate(-30px, 30px) rotate(240deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
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

        /* About Section */
        .about-section {
            background: white;
            padding: 5rem 2rem;
            position: relative;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-content h2 {
            font-size: 2.5rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .about-content p {
            color: #4a5568;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 2rem;
        }

        .skill-item {
            background: #f7fafc;
            padding: 1rem;
            border-radius: 12px;
            text-align: center;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .skill-item:hover {
            border-color: #537D5D;
            transform: translateY(-5px);
        }

        .skill-item i {
            font-size: 2rem;
            color:rgb(76, 145, 92);
            margin-bottom: 0.5rem;
        }

        .skill-item span {
            display: block;
            font-weight: 600;
            color: #2d3748;
        }

        .stats-showcase {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat-showcase {
            text-align: center;
            padding: 2rem;
            background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            border-radius: 20px;
            color: white;
            box-shadow: 0 15px 35px rgba(41, 82, 14, 0.3);
        }

        .stat-showcase-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-showcase-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Journey Section */
        .journey-section {
            background: #f7fafc;
            padding: 5rem 2rem;
        }

        .journey-container {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .journey-container h2 {
            font-size: 2.5rem;
            color: #2d3748;
            margin-bottom: 3rem;
            background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .timeline {
            position: relative;
            margin: 3rem 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin: 3rem 0;
            display: flex;
            align-items: center;
        }

        .timeline-item:nth-child(odd) {
            justify-content: flex-end;
        }

        .timeline-item:nth-child(even) {
            justify-content: flex-start;
        }

        .timeline-content {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 45%;
            position: relative;
        }

        .timeline-content::before {
            content: '';
            position: absolute;
            top: 50%;
            width: 0;
            height: 0;
            border: 15px solid transparent;
            transform: translateY(-50%);
        }

        .timeline-item:nth-child(odd) .timeline-content::before {
            left: -30px;
            border-right-color: white;
        }

        .timeline-item:nth-child(even) .timeline-content::before {
            right: -30px;
            border-left-color: white;
        }

        .timeline-year {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            z-index: 10;
        }

        .timeline-content h3 {
            color: #2d3748;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .timeline-content p {
            color: #4a5568;
            line-height: 1.6;
        }

        /* Contact Section */
        .contact-section {
            
            background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            padding: 5rem 2rem;
            color: white;
            text-align: center;
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-container h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .contact-container p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .about-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .skills-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-showcase {
                grid-template-columns: 1fr;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .timeline::before {
                left: 20px;
            }
            
            .timeline-item {
                justify-content: flex-start;
                padding-left: 50px;
            }
            
            .timeline-content {
                width: 100%;
            }
            
            .timeline-content::before {
                left: -30px !important;
                border-right-color: white !important;
                border-left-color: transparent !important;
            }
            
            .timeline-year {
                left: 20px;
                transform: none;
            }
            
            .contact-methods {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

    {{-- Include navbar --}}
    @include('mentor.navbar')

    <!-- Hero Section -->
    <section class="hero-section">
        <!-- Floating Elements -->
        <div class="floating-element">
            <i class="fas fa-graduation-cap" style="font-size: 5rem;"></i>
        </div>
        <div class="floating-element">
            <i class="fas fa-book" style="font-size: 4rem;"></i>
        </div>
        <div class="floating-element">
            <i class="fas fa-lightbulb" style="font-size: 6rem;"></i>
        </div>

        <div class="hero-content">
            <div class="profile-avatar">
                <i class="fas fa-user-tie"></i>
            </div>
            <h1 class="hero-title">{{ Auth::guard('mentor')->user()->nama }}</h1>
            <p class="hero-subtitle">{{ Auth::guard('mentor')->user()->expertise ?? 'Mentor' }}</p>
            <p class="hero-description">
                Selamat datang di halaman dashboard, Mentor! Perjalanan ini mungkin tidak selalu mudah, tapi setiap waktu yang kamu luangkan, setiap kata yang kamu ucapkan, dan setiap langkah yang kamu dampingi, adalah investasi besar dalam hidup seorang anak. Teruslah melangkah dengan semangat, karena perubahan besar dimulai dari hati yang tulus dan tindakan yang konsisten.
            </p>
            <div class="cta-buttons">
                <a href="{{ route('mentor.tugas.create') }}" class="cta-btn primary">
                    <i class="fas fa-play"></i>
                    Mulai Tugas
                </a>
                <a href="{{ route('mentor.akun') }}" class="cta-btn secondary">
                    <i class="fas fa-user-lock"></i>
                    Akun
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="about-container">
            <div class="about-content">
                <h2>Tentang Saya</h2>
                <p>
                    Dengan pengalaman lebih dari {{ Auth::guard('mentor')->user()->experience ?? '5' }} tahun dalam dunia pendidikan, saya berkomitmen untuk memberikan pembelajaran berkualitas tinggi yang menginspirasi dan memberdayakan setiap siswa.
                </p>
                <p>
                    Saya percaya bahwa setiap individu memiliki potensi unik yang dapat dikembangkan melalui pendekatan pembelajaran yang tepat. Melalui metode pengajaran yang inovatif dan personal, saya membantu siswa tidak hanya memahami materi, tetapi juga mengembangkan keterampilan berpikir kritis.
                </p>
                
                <div class="skills-grid">
                    
                    <a href="{{ route('mentor.data_anak') }}" class="skill-item" style="text-decoration: none; color: inherit;">
                        <i class="fas fa-users"></i>
                        <span>Data Anak</span>
                    </a>
                    <a href="{{ route('mentor.laporan') }}" class="skill-item" style="text-decoration: none; color: inherit;">
                        <i class="fas fa-chart-line"></i>
                        <span>Analisis Progress</span>
                    </a>

                </div>
            </div>
            
            <div class="stats-showcase">
                <div class="stat-showcase">
    <div class="stat-showcase-number">{{ $jumlahAnak }}</div>
    <div class="stat-showcase-label">Jumlah Anak Binaan</div>
</div>

                <div class="stat-showcase">
                    <div class="stat-showcase-number">10</div>
                    <div class="stat-showcase-label">Kursus Dibuat</div>
                </div>
                <div class="stat-showcase">
                    <div class="stat-showcase-number">20</div>
                    <div class="stat-showcase-label">Rencana</div>
                </div>
                <div class="stat-showcase">
                    <div class="stat-showcase-number">29</div>
                    <div class="stat-showcase-label">Usia</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Section -->
    <section class="journey-section">
        <div class="journey-container">
            <h2>Alasan Mengajar Saya</h2>
            
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-year">1</div>
                    <div class="timeline-content">
                        <h3>Berakar pada Firman</h3>
                        <p>Sebagai mentor, saya akan menjadikan Alkitab sebagai dasar dalam membimbing, mengajarkan anak-anak untuk mencintai Firman Tuhan, dan membangun karakter mereka berdasarkan kebenaran-Nya, bukan opini dunia.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2</div>
                    <div class="timeline-content">
                        <h3>Menabur dengan Kasih</h3>
                        <p>Saya akan membimbing dengan hati yang sabar, menyampaikan isi Alkitab dengan penuh cinta dan pengertian, agar anak-anak merasakan bahwa membaca Alkitab adalah sukacita, bukan beban.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">3</div>
                    <div class="timeline-content">
                        <h3>Hadir sebagai Teladan</h3>
                        <p>Anak-anak belajar lebih banyak dari apa yang mereka lihat daripada yang mereka dengar. Saya akan menunjukkan hidup yang mencerminkan nilai-nilai Alkitab, sehingga mereka terinspirasi untuk mengikuti.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">4</div>
                    <div class="timeline-content">
                        <h3>Setia Menyemangati</h3>
                        <p>Saya tidak akan menyerah ketika mereka mulai malas atau bosan. Saya akan terus menyemangati, mendoakan, dan mendampingi mereka agar tetap setia berjalan bersama Firman setiap hari.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="contact-container">
            <h2>Tetap Semangat</h2>
            <p>Siap memulai perjalanan pembelajaran yang menginspirasi? Mari kita wujudkan potensi terbaik Anda!</p>
            
            
        </div>
    </section>
    
</body>
</html>
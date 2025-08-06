<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karonese - Team Portfolio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInDown 1s ease-out;
        }

        .team-name {
            font-size: 4rem;
            font-weight: 800;
            background: linear-gradient(45deg, #fff, #f0f8ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(255,255,255,0.3);
        }

        .team-subtitle {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.9);
            font-weight: 300;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .member-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 2rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
        }

        .member-card:nth-child(1) { animation-delay: 0.1s; }
        .member-card:nth-child(2) { animation-delay: 0.2s; }
        .member-card:nth-child(3) { animation-delay: 0.3s; }
        .member-card:nth-child(4) { animation-delay: 0.4s; }

        .member-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .member-card:hover::before {
            left: 100%;
        }

        .member-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            border-color: rgba(255,255,255,0.4);
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            font-weight: bold;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .member-card:hover .avatar {
            transform: scale(1.1) rotate(5deg);
        }

        .avatar::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            transition: transform 0.6s;
        }

        .avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}


        .member-card:hover .avatar::after {
            transform: rotate(45deg) translate(50%, 50%);
        }

        .member-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
        }

        .member-details {
            color: rgba(255,255,255,0.8);
            line-height: 1.6;
        }

        .detail-item {
            margin-bottom: 0.5rem;
            padding: 0.3rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .detail-label {
            font-weight: 600;
            color: rgba(114, 18, 18, 0.9);
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
                padding: 1rem;
            }
            
            .team-name {
                font-size: 2.5rem;
            }
            
            .team-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .member-card {
                padding: 1.5rem;
            }
            
            .avatar {
                width: 100px;
                height: 100px;
                font-size: 2.5rem;
            }
        }

        @media (max-width: 480px) {
            .team-name {
                font-size: 2rem;
            }
            
            .member-name {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <div class="header">
            <h1 class="team-name">KARONESE</h1>
            <p class="team-subtitle">Kelompok Mahasiswa Berprestasi</p>
        </div>

        <div class="team-grid">
            <div class="member-card">
                <div class="avatar"><img src="{{ asset('images/asetuts.png') }}" alt="Foto Anggota"></div>
                <h3 class="member-name">Rendy Ananda Sembiring</h3>
                <div class="member-details">
                    <div class="detail-item">
                        <span class="detail-label">NIM:</span> 2303310676
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Kelas:</span> IF-C Siang
                    </div>
                </div>
            </div>

            <div class="member-card">
                <div class="avatar"><img src="{{ asset('images/asetuts.png') }}" alt="Foto Anggota"></div>
                <h3 class="member-name">Anggota Kedua</h3>
                <div class="member-details">
                    <div class="detail-item">
                        <span class="detail-label">NIM:</span> 123456790
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Kelas:</span> IF-A
                    </div>
                </div>
            </div>

            <div class="member-card">
                <div class="avatar"><img src="{{ asset('images/asetuts.png') }}" alt="Foto Anggota"></div>
                <h3 class="member-name">Anggota Ketiga</h3>
                <div class="member-details">
                    <div class="detail-item">
                        <span class="detail-label">NIM:</span> 123456791
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Kelas:</span> IF-A
                    </div>
                </div>
            </div>

            <div class="member-card">
                <div class="avatar"><img src="{{ asset('images/asetuts.png') }}" alt="Foto Anggota"></div>
                <h3 class="member-name">Anggota Keempat</h3>
                <div class="member-details">
                    <div class="detail-item">
                        <span class="detail-label">NIM:</span> 123456792
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Kelas:</span> IF-A
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add smooth scroll and interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.member-card');
            
            // Add click effect
            cards.forEach(card => {
                card.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'translateY(-10px) scale(1.02)';
                    }, 150);
                });
            });

            // Parallax effect for floating shapes
            document.addEventListener('mousemove', function(e) {
                const shapes = document.querySelectorAll('.shape');
                const x = e.clientX / window.innerWidth;
                const y = e.clientY / window.innerHeight;
                
                shapes.forEach((shape, index) => {
                    const speed = (index + 1) * 0.5;
                    shape.style.transform = `translate(${x * speed * 10}px, ${y * speed * 10}px)`;
                });
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.prinsh.com/NathanPrinsley-textstyle/nprinsh-stext.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
            background: #000;
            scroll-behavior: smooth;
            font-family: comic sans ms;
        }

        /* Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            object-fit: cover;
            opacity: 0.8;
        }

        .video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(20px);
        }

        .nav-logo {
            display: flex;
            align-items: center;
        }

        .nav-logo-icon {
            width: 40px;
            height: 40px;
            background: transparent;
            border-radius: 8px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .nav-logo-text {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 300;
            transition: all 0.3s ease;
            opacity: 0.8;
            cursor: pointer;
        }

        .nav-links a:hover, .nav-links a.active {
            opacity: 1;
            text-shadow: 0 0 10px rgba(255,255,255,0.3);
            color: #e74c3c;
        }

        /* Section Styling */
        .section {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Login Section dengan Animasi Background */
        .login-section {
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            position: relative;
            overflow: hidden;
        }
       
        .login-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 50px;
            width: 100%;
            max-width: 1200px;
            gap: 50px;
            z-index: 2;
            position: relative;
        }

        .left-content {
            flex: 1;
            max-width: 500px;
        }

        .welcome-text {
            color: white;
            margin-bottom: 20px;
        }

        .welcome-text h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            min-height: 60px;
        }

        .welcome-text h2 {
            font-size: 24px;
            font-weight: 300;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .welcome-text p {
            font-size: 16px;
            line-height: 1.6;
            opacity: 0.8;
            margin-bottom: 30px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .social-links a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }

        .login-form {
            background: rgba(0,0,0,0.5);
            padding: 40px;
            border-radius: 20px;
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255,255,255,0.15);
            width: 350px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
        }

        .login-form h3 {
            color: white;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 300;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255,255,255,0.1);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input::placeholder {
            color: rgba(255,255,255,0.6);
        }

        .form-group .icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.6);
        }

         
        .sign-in-btn {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: 100%;
            border:none;
        }

        .sign-in-btn {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            text-decoration: none;
            text-align: center;
            padding: 1.2rem 2rem;
            font-weight: 600;
            font-size: 20px;
            border-radius: 15px;
            user-select: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.8s ease forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .sign-in-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .sign-in-btn:hover {
            transform: scale(1.05) translateY(-3px);
            box-shadow: 0 12px 32px rgba(231,76,60,0.3);
        }

        .sign-in-btn:hover::before {
            left: 100%;
        }

        
        .team-section {
            background: linear-gradient(-45deg, 
                Gray 0%, 
                Black 25%, 
                rgb(58, 18, 18) 50%, 
                Black 75%, 
                Gray 100%);
            background-size: 400% 400%;
            animation: teamGradientShift 20s ease infinite;
            padding: 100px 0 50px;
            position: relative;
            overflow: hidden;
        }

        /* Efek Mesh Gradient untuk Team Section (warna lebih halus dan sesuai tone) */
        .team-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(ellipse at top left, rgba(255, 100, 100, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at top right, rgba(255, 70, 70, 0.06) 0%, transparent 50%),
                radial-gradient(ellipse at bottom left, rgba(255, 120, 80, 0.07) 0%, transparent 50%),
                radial-gradient(ellipse at bottom right, rgba(255, 100, 80, 0.06) 0%, transparent 50%);
            animation: meshRotate 30s linear infinite;
            pointer-events: none;
        }
        .team-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                linear-gradient(rgba(255,255,255,0.015) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.015) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 15s linear infinite;
            pointer-events: none;
        }

        .team-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            z-index: 2;
            position: relative;
        }

        .team-header {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInDown 1s ease-out;
        }

        .team-name {
            font-size: 4rem;
            font-weight: 800;
            background: linear-gradient(45deg, #fff, #f0f8ff, #e3f2fd, #bbdefb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(255,255,255,0.3);
            animation: textShimmer 3s ease-in-out infinite;
        }

        .team-subtitle {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.9);
            font-weight: 300;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .member-card {
            background: rgba(34, 34, 34, 0.44);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 1.8rem;
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
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 1.2rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            font-weight: bold;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .member-card:hover .avatar {
            transform: scale(1.1) rotate(5deg);
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .member-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.8rem;
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
            color: white;
        }

        /* Floating Shapes */
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

        .social-icons {
            display: flex;
            justify-content: left;
            gap: 15px;
        }

        .social-icons a {
            color: #b07f44;
            font-size: 40px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        /* Keyframe Animations */
        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes teamGradientShift {
            0% {
                background-position: 0% 50%;
            }
            25% {
                background-position: 100% 50%;
            }
            50% {
                background-position: 100% 100%;
            }
            75% {
                background-position: 50% 100%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes waveMove {
            0%, 100% {
                transform: translateX(0) translateY(0) rotate(0deg);
            }
            25% {
                transform: translateX(5px) translateY(-10px) rotate(1deg);
            }
            50% {
                transform: translateX(-5px) translateY(5px) rotate(-1deg);
            }
            75% {
                transform: translateX(10px) translateY(-5px) rotate(0.5deg);
            }
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(0px) rotate(0deg);
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
            }
        }

        @keyframes meshRotate {
            0% {
                transform: rotate(0deg) scale(1);
            }
            50% {
                transform: rotate(180deg) scale(1.1);
            }
            100% {
                transform: rotate(360deg) scale(1);
            }
        }

        @keyframes gridMove {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(50px, 50px);
            }
        }

        @keyframes textShimmer {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
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

        /* Mobile Responsive */
        @media (max-width: 1200px) {
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
            
            .member-card {
                padding: 2rem;
            }
            
            .avatar {
                width: 120px;
                height: 120px;
                font-size: 3rem;
            }
            
            .member-name {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }

            .nav-logo-text {
                font-size: 20px;
            }

            .nav-links {
                gap: 20px;
            }

            .nav-links a {
                font-size: 14px;
            }

            .login-container {
                flex-direction: column;
                padding: 20px;
                gap: 30px;
            }

            .left-content {
                margin-top:80px;
                width: 100%;
                max-width: none;
                text-align: center;
                order: 1; 
            }

            .login-form {
                width: 100%;
                max-width: 350px;
                padding: 30px 25px;
                order: 2; 
                margin: 0 auto;
            }

           
            .welcome-text h1 {
                font-size: 36px;
            }

            .welcome-text h2 {
                font-size: 20px;
            }

            .team-container {
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

            /* Atur social icons untuk mobile */
            .social-icons {
                justify-content: center;
                margin-top: 20px;
            }
        }

        @media (max-width: 480px) {
            .welcome-text h1 {
                font-size: 28px;
            }

            .team-name {
                font-size: 2rem;
            }
            
            .member-name {
                font-size: 1.3rem;
            }

            .social-icons a {
                font-size: 35px;
            }
        }
    </style>
</head>
<body>
    <div class="video-background" style="background: linear-gradient(45deg, #1a1a2e, #16213e, #0f3460); opacity: 0.9;"></div>
    
    <div class="video-overlay"></div>
    
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-logo">
    <div class="nav-logo-icon">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px; width: auto;">
    </div>
    <div class="nav-logo-text">PPA IO-550</div>
</div>

        <div class="nav-links">
            <a href="#home" class="nav-link active">Welcome</a>
            <a href="#team" class="nav-link">About</a>
        </div>
    </nav>

    <!-- Login Section -->
    <section id="home" class="section login-section">
        <div class="login-container">
            <div class="left-content">
                <div class="welcome-text">
                    <h1 id="typewriter"></h1>
                    <p>Satu hari, satu halaman, satu perjalanan yang akan membentukmu dari dalam. Ayo mulai hari ini dengan semangat baru.</p>
                </div>
                
                <div class="social-icons nprinsley-text-redan">
                    <a href="https://www.tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
                    <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Form Login (akan muncul di bawah pada mobile) -->
            <div class="login-form">
                <form id="loginForm" method="POST" action="{{ route('login.process') }}">
    @csrf
    <h3>Log-In Box</h3>
    @if($errors->any())
        <div class="error-message" style="color: #ff6b6b; text-align:center; margin-bottom:15px;">
            {{ $errors->first() }}
        </div>
    @endif
    <div class="form-group">
        <input type="text" name="username" placeholder="Username" required autofocus>
        <span class="icon"><i class="fa fa-user"></i></span>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password" required id="passwordInput">
        <span class="icon" id="togglePassword" style="cursor:pointer;">
            <i class="fa fa-eye"></i>
        </span>
    </div>
    <button type="submit" class="sign-in-btn">Login</button>
</form>
            </div>
        </div>
    </section>

    <!-- Team Portfolio Section -->
    <section id="team" class="section team-section">
        <div class="team-container">
            <div class="team-header">
                <h1 class="team-name">Made by Mee</h1>
                <p class="team-subtitle">Front-End  &  Back-End</p>
            </div>

            <div class="team-grid">
                <div class="member-card">
                    <div class="avatar">
                        <span>R</span>
                    </div>
                    <h3 class="member-name">Rendy Ananda Sembiring</h3>
                    <div class="member-details">
                        <div class="detail-item">
                            <span class="detail-label">
                                Seorang mahasiswa aktif dari kelas IF-C Siang
                                yang memiliki minat besar dalam pengembangan web dan desain antarmuka.
                                Dalam proyek ini, Rendy bertanggung jawab dalam pembuatan tampilan dan dokumentasi.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="member-card">
                    <div class="avatar">
                        <span>R</span>
                    </div>
                    <h3 class="member-name">Rendy</h3>
                    <div class="member-details">
                        <div class="detail-item">
                            <span class="detail-label">Seorang mahasiswa aktif dari kelas IF-C Siang
                                yang memiliki minat besar dalam pengembangan web dan desain antarmuka.
                                Dalam proyek ini, Angel bertanggung jawab dalam pembuatan tampilan dan dokumentasi.</span>
                        </div>
                    </div>
                </div>

                <div class="member-card">
                    <div class="avatar">
                        <span>R</span>
                    </div>
                    <h3 class="member-name">Rendy</h3>
                    <div class="member-details">
                        <div class="detail-item">
                            <span class="detail-label">Seorang mahasiswa aktif dari kelas IF-C Siang
                                yang memiliki minat besar dalam pengembangan web dan desain antarmuka.
                                Dalam proyek ini, Sindy bertanggung jawab dalam pembuatan tampilan dan dokumentasi.</span>
                        </div>
                    </div>
                </div>

                <div class="member-card">
                    <div class="avatar">
                        <span>S</span>
                    </div>
                    <h3 class="member-name">Sembiring</h3>
                    <div class="member-details">
                        <div class="detail-item">
                            <span class="detail-label">Seorang mahasiswa aktif dari kelas IF-C Siang
                                yang memiliki minat besar dalam pengembangan web dan desain antarmuka.
                                Dalam proyek ini, Christina bertanggung jawab dalam pembuatan tampilan dan dokumentasi.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Navigation functionality
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            const navbar = document.getElementById('navbar');
            
            // Smooth scrolling for navigation links
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetSection = document.querySelector(targetId);
                    
                    if (targetSection) {
                        targetSection.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                    
                    // Update active link
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }

                // Update active navigation based on scroll position
                const sections = document.querySelectorAll('.section');
                const scrollPos = window.scrollY + 100;

                sections.forEach(section => {
                    const top = section.offsetTop;
                    const bottom = top + section.offsetHeight;
                    const id = section.getAttribute('id');

                    if (scrollPos >= top && scrollPos <= bottom) {
                        navLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${id}`) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            });
        });

        // Toggle password visibility
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#passwordInput');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function () {
                // toggle tipe input
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // toggle ikon mata/garis
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }

        // Typewriter effect
        document.addEventListener('DOMContentLoaded', function() {
            const typewriterElement = document.getElementById('typewriter');
            const text = 'Hallo, Selamat Datang!';
            let i = 0;
            let blinkInterval;

            const showCursor = () => {
                if (!typewriterElement.textContent.endsWith('|')) {
                    typewriterElement.textContent += '|';
                }
            };

            const hideCursor = () => {
                if (typewriterElement.textContent.endsWith('|')) {
                    typewriterElement.textContent = typewriterElement.textContent.slice(0, -1);
                }
            };

            const blinkCursor = (duration, callback) => {
                let visible = true;
                blinkInterval = setInterval(() => {
                    if (visible) {
                        hideCursor();
                        visible = false;
                    } else {
                        showCursor();
                        visible = true;
                    }
                }, 500);

                setTimeout(() => {
                    clearInterval(blinkInterval);
                    hideCursor();
                    callback();
                }, duration);
            };

            const typeWriter = () => {
                if (i < text.length) {
                    typewriterElement.textContent = text.substring(0, i + 1) + '|';
                    i++;

                    let delay = 150;
                    if (text.charAt(i - 1) === ',') {
                        delay = 1000;
                    }

                    setTimeout(typeWriter, delay);
                } else {
                    blinkCursor(3000, () => {
                        i = 0;
                        typewriterElement.textContent = '';
                        setTimeout(typeWriter, 500);
                    });
                }
            };

            setTimeout(typeWriter, 1000);
        });

        // Team cards interaction
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.member-card');
            
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

        // Placeholder function for social links
        function showAlert(platform) {
            alert(`Redirecting to ${platform}...`);
        }
    </script>
</body>
</html>
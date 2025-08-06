<nav>
    <a href="{{ route('anak.dashboard') }}" class="nav-brand">
        <i class="fas fa-book-reader"></i>
        <span>Ruang {{ Auth::guard('anak')->user()->nama }}</span>
    </a>
    <button class="nav-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </button>
    <div class="nav-links" id="navLinks">
        <a href="{{ route('anak.dashboard') }}" class="nav-item active">
            <i class="fas fa-home"></i> 
            <span>Dashboard</span>
        </a>
        <a href="{{ route('anak.baca') }}" class="nav-item active">
            <i class="fas fa-star"></i> 
            <span>Progres</span>
        </a>
        <a href="{{ route('anak.video') }}" class="nav-item active">
            <i class="fas fa-file-alt"></i> 
            <span>Refensi</span>
        </a>
        <a href="{{ route('anak.tugas.index') }}" class="nav-item active">
            <i class="fas fa-book"></i> 
            <span>Tugas Saya</span>
        </a>

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="logout-button">
                <i class="fas fa-sign-out-alt"></i> 
                <span>Logout</span>
            </button>
        </form>
    </div>
</nav>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    nav {
        background: #357a32;
        backdrop-filter: blur(10px);
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        padding-top: 80px;
    }

    .nav-brand {
        color: white;
        font-size: 1.4rem;
        font-weight: 700;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        transition: all 0.3s ease;
    }

    .nav-brand:hover {
        transform: translateY(-2px);
    }

    .nav-brand i {
        font-size: 1.6rem;
    }

    .nav-toggle {
        display: none;
        font-size: 1.5rem;
        color: white;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .nav-toggle:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: scale(1.1);
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .nav-item {
        color: white;
        text-decoration: none;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.8rem 1.2rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    

    

    
    .nav-item i {
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .nav-item:hover i {
        transform: scale(1.2);
    }

    .logout-button {
        padding: 0.8rem 1.2rem;
        background: #ca3120;
        color: white;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    

    .logout-button:hover::before {
        left: 100%;
    }


    .logout-button i {
        transition: transform 0.3s ease;
    }

    .logout-button:hover i {
        transform: rotate(180deg);
    }

    @media (max-width: 768px) {
        nav {
            padding: 1rem;
        }

        .nav-brand {
            font-size: 1.2rem;
        }

    
        .nav-links {
            display: none;
            flex-direction: column;
            background: #357a32;
            backdrop-filter: blur(15px);
            position: fixed;
            top: 80px;
            left: 0;
            right: 0;
            padding: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border-radius: 0 0 20px 20px;
            gap: 1rem;
            z-index: 999;
        }

        .nav-links.show {
            display: flex;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .nav-toggle {
            display: block;
        }

        .nav-item,
        .logout-button {
            width: 100%;
            justify-content: flex-start;
            margin-bottom: 0.5rem;
            padding: 1rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .nav-brand i {
            font-size: 1.4rem;
        }
    }
</style>

<script>
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('show');
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const nav = document.querySelector('nav');
        const navLinks = document.getElementById('navLinks');
        
        if (!nav.contains(event.target)) {
            navLinks.classList.remove('show');
        }
    });

    // Add smooth scrolling and enhanced interactions
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.02)';
        });
        
        item.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'translateY(0) scale(1)';
            }
        });
    });
</script>
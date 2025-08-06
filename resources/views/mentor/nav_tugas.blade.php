<nav>
    <a href="{{ route('mentor.dashboard') }}" class="nav-brand">
        <i class="fas fa-user-tie"></i>
        <span>Panel {{ Auth::guard('mentor')->user()->nama }}</span>
    </a>
    <button class="nav-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </button>
    <div class="nav-links" id="navLinks">
        <a href="{{ route('mentor.tugas.index') }}" class="nav-item active">
        <i class="fas fas fa-undo"></i>
        <span>Kembali</span>
        </a>
    </div>
</nav>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    nav {
        background:rgb(20, 49, 19);
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
        padding-top: 90px; /* Adjust based on navbar height */
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

    
    @media (max-width: 768px) {
        nav {
            padding: 1rem;
        }

        .nav-brand {
            font-size: 1.2rem;
        }


        .nav-links {{
            display: flex !important;
            flex-direction: column;
            background: rgb(20, 49, 19);
            backdrop-filter: blur(15px);
            padding: 1rem;
            gap: 1rem;
            background: rgb(20, 49, 19);
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

           
    }
}

    @media (max-width: 480px) {
        .nav-brand i {
            font-size: 1.4rem;
        }
    }
</style>

</script>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bacaan Alkitab</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'comic sans ms', 'Times New Roman', serif;
      background: linear-gradient(-85deg, #30e8bf, #ff8235);
      min-height: 100vh;
      color: #333;
      line-height: 1.7;
      overflow-x: hidden;
    }

   
    /* Navigation */
    nav {
      background: #357a32;
      backdrop-filter: blur(20px);
      padding: 1rem 2rem;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      transform: translateY(-100%);
      animation: slideDown 0.8s ease-out 0.3s forwards;
    }

    @keyframes slideDown {
      to { transform: translateY(0); }
    }

    nav h2 {
      color: white;
      font-size: 1.6rem;
      font-weight: 700;
      margin: 0;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .kembali {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.6rem 1rem;
      background: #ca3120;
      color: white;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .kembali i {
      transition: transform 0.3s ease;
    }

    .kembali:hover i {
      transform: rotate(-180deg);
    }

    /* Main content */
    main {
      margin-top: 100px;
      padding: 2rem;
      max-width: 900px;
      margin-left: auto;
      margin-right: auto;
      background: rgba(255, 255, 255, 0.54);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      opacity: 0;
      transform: translateY(50px);
      animation: fadeInUp 1s ease-out 0.5s forwards;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    main h3 {
      text-align: center;
      color: black;
      font-size: 2.2rem;
      margin-bottom: 2rem;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .judul-bagian {
      color: black;
      padding: 1rem 1.5rem;
      margin: 2rem 0 1rem 0;
      border-radius: 15px;
      font-weight: 600;
      font-size: 1.1rem;
      text-align: center;
      transform: scale(0.95);
      opacity: 0;
      animation: scaleIn 0.6s ease-out forwards;
    }

    @keyframes scaleIn {
      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    /* Verses styling */
    ol {
      list-style: none;
      counter-reset: verse-counter;
      padding: 0;
    }

    ol li {
      counter-increment: verse-counter;
      position: relative;
      padding: 1.2rem 1.5rem 1.2rem 4rem;
      background:transparent;
      border-radius: 5px;
      border-left: 4px solid transparent;
      background-origin: border-box;
      background-clip: padding-box, border-box;
      box-shadow: 0px 1px rgba(0, 0, 0, 0.25);
      transition: all 0.3s ease;
      opacity: 0;
      transform: translateX(-20px);
      animation: slideInLeft 0.6s ease-out forwards;
    }

    ol li:nth-child(even) {
      animation-delay: 0.1s;
    }

    ol li:nth-child(odd) {
      animation-delay: 0.2s;
    }

    @keyframes slideInLeft {
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    ol li::before {
      content: counter(verse-counter);
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: black;
      border-radius: 50%;
      width: 28px;
      height: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 18px;
    }

    ol li:hover {
      transform: translateX(5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      background: rgba(255, 255, 255, 0.7);
    }

    /* Scroll animations */
    .scroll-reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease-out;
    }

    .scroll-reveal.revealed {
      opacity: 1;
      transform: translateY(0);
    }

    /* Enhanced Navigation buttons */
    .navigasi {
      display: flex;
      justify-content: center;

      align-items: center;
      margin-top: 3rem;
      padding: 2rem 0;
      gap: 5rem;
    }

    .navigasi a {
  display: inline-block;
  padding: 10px 30px;
  color: white;
  text-align:center;
  background-color: #4CAF50;
  text-decoration: none;
  border-radius: 10px;
  transition: background 0.3s ease, transform 0.3s ease;
}

    .navigasi a {
      color: #333;
    }

    .navigasi a:hover{
      background:green;
    }
  


    /* Enhanced Save Progress Button */
    .btn-simpan-progres {
  background-color: #22c55e; /* hijau stabilitas */
  color: white;
  border: none;
  padding: 0.75rem 2rem;
  border-radius: 8px;
  font-weight: 600;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.btn-simpan-progres:hover {
  background-color: #16a34a; /* hijau tegas */
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
}



   
    /* Success message styling */
    .success-message {
      background: linear-gradient(135deg, #d1fae5, #a7f3d0);
      border: 2px solid #10b981;
      padding: 1rem 1.5rem;
      border-radius: 15px;
      color: #064e3b;
      margin-bottom: 1rem;
      font-weight: 600;
      text-align: center;
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
      animation: slideInDown 0.5s ease-out;
    }

    @keyframes slideInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }


    /* Enhanced floating reading progress */
    .reading-progress {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.8));
      backdrop-filter: blur(20px);
      padding: 1rem 1.5rem;
      border-radius: 50px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      border: 2px solid rgba(102, 126, 234, 0.2);
      font-weight: 600;
      color: #667eea;
      transform: translateY(100px);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .reading-progress.show {
      transform: translateY(0);
    }

    .reading-progress:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
    }

    /* Enhanced scroll to top button */
    .scroll-to-top {
      position: fixed;
      bottom: 30px;
      left: 30px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      border: none;
      border-radius: 50%;
      width: 55px;
      height: 55px;
      cursor: pointer;
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
      transform: translateY(100px);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: 1000;
      font-size: 1.2rem;
    }

    .scroll-to-top.show {
      transform: translateY(0);
    }

    .scroll-to-top:hover {
      transform: translateY(-4px) scale(1.1);
      box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
      background: linear-gradient(135deg, #5a67d8, #6b46c1);
    }

    .scroll-to-top:active {
      transform: translateY(-2px) scale(1.05);
    }

    /* Button hover effects */
    @keyframes buttonBounce {
      0%, 20%, 60%, 100% { transform: translateY(0); }
      40% { transform: translateY(-4px); }
      80% { transform: translateY(-2px); }
    }

    
    /* Responsive design */
    @media (max-width: 768px) {
      nav {
        padding: 1rem;
      }
      
      nav h2 {
        font-size: 1.4rem;
      }
      
      main {
        margin-top: 80px;
        padding: 1.5rem;
        margin-left: 1rem;
        margin-right: 1rem;
      }
      
      main h3 {
        font-size: 1.8rem;
      }
      
      ol li {
        padding: 1rem 1rem 1rem 3.5rem;
      }
      
      .navigasi {
        flex-direction: column;
        gap: 1rem;
      }
      
      .navigasi a, .navigasi span {
        margin: 0;
        width: 100%;
      }

      .btn-simpan-progres {
        width: 100%;
        padding: 1.2rem 2rem;
        margin-bottom:100px;
      }
    }

    .disabled-link {
        pointer-events: none;
        opacity: 0.5;
        cursor: not-allowed;
        text-decoration: none;
    }
  </style>
</head>
<body>



<!-- Progress bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Navigation -->
<nav>
  <h2><i class="fas fa-book-open"></i> Bacaan</h2>
  <a class="kembali" href="{{ route('anak.dashboard') }}">Kembali<i class="fas fa-angle-double-right"></i> </a>
</nav>

<!-- Main content -->
<main>
  <h3> {{ $kitab }} Pasal {{ $pasal }}</h3>
  @php $judulSudahDitampilkan = false; @endphp

    <!-- Enhanced Success Message -->
   @if (session('success'))
    <div class="success-message">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

  <ol>
    @foreach ($isi as $ayat)
      @if (!empty($ayat['title']) && !$judulSudahDitampilkan)
        <div class="judul-bagian">{{ $ayat['title'] }}</div>
        @php $judulSudahDitampilkan = true; @endphp
      @endif
      <li class="scroll-reveal">{{ str_replace(['<t />', '<t \/>'], '', $ayat['text']) }}</li>
    @endforeach
  </ol>

  <div class="navigasi">
    @if($pasal > 1)
      <a href="{{ route('anak.baca', ['pasal' => $pasal - 1]) }}"><i class="fas fa-arrow-left"></i> Sebelumnya</a>
    @else
      <span style="flex:1;"></span>
    @endif
    <a href="{{ route('anak.baca', ['pasal' => $pasal + 1]) }}"
   id="nextButton"
   class="disabled-link"
   onclick="return false;">
    Selanjutnya <i class="fas fa-arrow-right"></i>
</a>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const nextBtn = document.getElementById("nextButton");
        let timeLeft = 5; // WAKTU NYA

        const timer = setInterval(() => {
            timeLeft--;

            if (timeLeft <= 0) {
                clearInterval(timer);
                nextBtn.classList.remove("disabled-link");
                nextBtn.removeAttribute("onclick");
                nextBtn.style.opacity = 1;
                nextBtn.style.cursor = 'pointer';
            } else {
                // Tampilkan sisa waktu pada tombol (opsional)
                let m = Math.floor(timeLeft / 60);
                let s = timeLeft % 60;
                nextBtn.innerHTML = `Selanjutnya (${m}:${s.toString().padStart(2, '0')}) <i class="fas fa-arrow-right"></i>`;
            }
        }, 1000);
    });
</script>


<!-- Enhanced Save Progress Form -->
<form method="POST" action="{{ route('anak.baca.simpan') }}" style="margin-top: 2rem; text-align: center;">
    @csrf
    <input type="hidden" name="kitab" value="{{ $kitab }}">
    <input type="hidden" name="pasal" value="{{ $pasal }}">
    <button type="submit" class="btn-simpan-progres">
        <i class="fas fa-save"></i> Simpan Progres
    </button>
</form>

</main>

<!-- Reading progress indicator -->
<div class="reading-progress" id="readingProgress">
  <i class="fas fa-book-reader"></i> <span id="progressText">0%</span>
</div>

<!-- Scroll to top button -->
<button class="scroll-to-top" id="scrollToTop">
  <i class="fas fa-arrow-up"></i>
</button>

<script>
  

  // Progress bar functionality
  function updateProgressBar() {
    const scrollTop = window.pageYOffset;
    const docHeight = document.body.scrollHeight - window.innerHeight;
    const scrollPercent = (scrollTop / docHeight) * 100;
    
    document.getElementById('progressBar').style.width = scrollPercent + '%';
    
    // Update reading progress
    const progressText = document.getElementById('progressText');
    const readingProgress = document.getElementById('readingProgress');
    
    if (scrollPercent > 5) {
      readingProgress.classList.add('show');
      progressText.textContent = Math.round(scrollPercent) + '%';
    } else {
      readingProgress.classList.remove('show');
    }
  }

  // Scroll reveal animation
  function revealOnScroll() {
    const reveals = document.querySelectorAll('.scroll-reveal');
    
    reveals.forEach(reveal => {
      const windowHeight = window.innerHeight;
      const elementTop = reveal.getBoundingClientRect().top;
      const elementVisible = 150;
      
      if (elementTop < windowHeight - elementVisible) {
        reveal.classList.add('revealed');
      }
    });
  }

  // Scroll to top functionality
  function handleScrollToTop() {
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    if (window.pageYOffset > 300) {
      scrollToTopBtn.classList.add('show');
    } else {
      scrollToTopBtn.classList.remove('show');
    }
  }

  // Smooth scroll to top
  document.getElementById('scrollToTop').addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  // Event listeners
  window.addEventListener('scroll', () => {
    updateProgressBar();
    revealOnScroll();
    handleScrollToTop();
  });

  // Initialize
  document.addEventListener('DOMContentLoaded', () => {
    revealOnScroll();
  });

  // Enhanced copy protection with better notification
  document.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && e.key === 'c') {
      e.preventDefault();
      // Create a more elegant notification
      const notification = document.createElement('div');
      notification.innerHTML = '<i class="fas fa-lock"></i> Menyalin teks tidak diperbolehkan!';
      notification.style.cssText = `
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 1.2rem 2.5rem;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        z-index: 10000;
        font-weight: 600;
        animation: fadeInOut 2s ease-in-out forwards;
        border: 2px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
      `;
      
      // Add fadeInOut animation
      const style = document.createElement('style');
      style.textContent = `
        @keyframes fadeInOut {
          0% { opacity: 0; transform: translate(-50%, -50%) scale(0.8); }
          20% { opacity: 1; transform: translate(-50%, -50%) scale(1.05); }
          25% { transform: translate(-50%, -50%) scale(1); }
          80% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
          100% { opacity: 0; transform: translate(-50%, -50%) scale(0.8); }
        }
      `;
      document.head.appendChild(style);
      document.body.appendChild(notification);
      
      setTimeout(() => {
        document.body.removeChild(notification);
        document.head.removeChild(style);
      }, 2000);
    }
  });
</script>

</body>
</html>
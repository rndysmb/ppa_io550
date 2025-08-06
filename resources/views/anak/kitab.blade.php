<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $kitab ?? 'Tidak Dikenal' }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
 <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Georgia', 'Times New Roman', serif;
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
    }

    nav h2 {
      color: white;
      font-size: 1.8rem;
      font-weight: 700;
      margin: 0;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    nav a {
      color: white;
      text-decoration: none;
      padding: 0.8rem 1.5rem;
      border-radius: 25px;
      font-weight: 600;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }

    nav a:hover {
      background-color: rgb(183, 32, 15);
      color: white;
    }

/* Search bar */
.search-container {
  position: fixed;
  top: 100px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 999;
  background-color: #ffffff;
  padding: 1rem 1.5rem;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  border: 1px solid #e5e7eb;
  display: flex;
  gap: 1rem;
  align-items: center;
}

.search-label {
  color: #357a32;
  font-weight: 600;
  font-size: 0.9rem;
}

.search-input {
  padding: 0.6rem 1rem;
  border: 2px solid #e5e7eb;
  border-radius: 8px;
  font-size: 1rem;
  width: 140px;
  text-align: center;
  outline: none;
  transition: border-color 0.2s, box-shadow 0.2s;
}

.search-input:focus {
  border-color: #30e8bf;
  box-shadow: 0 0 0 3px rgba(48, 232, 191, 0.1);
}

.search-btn {
  background-color: #357a32;
  color: #ffffff;
  border: none;
  padding: 0.6rem 1.2rem;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  transition: background-color 0.2s;
}

.search-btn:hover {
  background-color: #2c6429;
}

    /* Main content */
main {
  margin-top: 200px;
  padding: 2rem;
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  background-color: rgba(255, 255, 255, 0.54);
  backdrop-filter: blur(20px);
  border-radius: 20px;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

main h2 {
  text-align: center;
  color: #000;
  font-size: 2.2rem;
  margin-bottom: 2rem;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Message styling */
.message {
  background: linear-gradient(135deg, #fef3c7, #fcd34d);
  border: 2px solid #f59e0b;
  padding: 1rem 1.5rem;
  border-radius: 15px;
  color: #92400e;
  margin-bottom: 2rem;
  font-weight: 600;
  text-align: center;
  box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

/* Chapter container */
.chapter-container {
  margin-bottom: 3rem;
  background: rgba(255, 255, 255, 0.3);
  backdrop-filter: blur(10px);
  border-radius: 15px;
  padding: 2rem;
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.chapter-title {
  color: #357a32;
  font-size: 1.8rem;
  font-weight: 700;
  margin-bottom: 1rem;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-bottom: 2px solid #357a32;
  padding-bottom: 0.5rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.chapter-subtitle {
  font-style: italic;
  color: #666;
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
  padding: 0.5rem 1rem;
  background: rgba(255, 255, 255, 0.4);
  border-radius: 10px;
  border-left: 4px solid #357a32;
}

/* Verses styling */
.verses-container {
  display: grid;
  gap: 1rem;
}

.verse {
  padding: 1rem 1.5rem;
  background: rgba(255, 255, 255, 0.6);
  border-radius: 10px;
  border-left: 4px solid #30e8bf;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.verse:hover {
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
  background: rgba(255, 255, 255, 0.8);
  border-left-color: #ff8235;
}

.verse-number {
  font-weight: bold;
  color: #357a32;
  font-size: 1.1rem;
  margin-right: 0.5rem;
}

.verse-text {
  display: inline;
}

    /* Search result notification */
    .search-notification {
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
      border: 2px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      display: none;
      animation: popIn 0.3s ease-out;
    }

    @keyframes popIn {
      0% { opacity: 0; transform: translate(-50%, -50%) scale(0.8); }
      100% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
    }

    .search-notification.show {
      display: block;
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

    
    /* Empty state */
    .empty-state {
      text-align: center;
      padding: 3rem;
      color: #666;
    }

    .empty-state i {
      font-size: 4rem;
      color: #ccc;
      margin-bottom: 1rem;
    }

    /* Mobile menu toggle */
    .mobile-menu-toggle {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
      padding: 0.5rem;
    }

    /* Responsive design */
    @media (max-width: 768px) {
      /* Reduce particles on mobile for better performance */
      .particle {
        width: 2px;
        height: 2px;
      }

      /* Navigation adjustments */
      nav {
        padding: 0.8rem 1rem;
        flex-wrap: wrap;
      }
      
      nav h2 {
        font-size: 1.2rem;
        order: 1;
      }

      nav a {
        font-size: 0.9rem;
        padding: 0.6rem 1rem;
        order: 2;
      }

      .mobile-menu-toggle {
        display: block;
        order: 3;
      }

      /* Search container mobile adjustments */
      .search-container {
        position: relative;
        top: auto;
        left: auto;
        transform: none;
        margin: 68px 15px 1px 15px;
        padding: 1rem;
        flex-direction: column;
        gap: 0.8rem;
        border-radius: 12px;
        animation: none;
        opacity: 1;
      }

      .search-input {
        width: 80px;
        padding: 0.6rem 0.8rem;
        font-size: 0.9rem;
      }

      .search-btn {
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
        width: 100%;
      }

      .search-label {
        font-size: 0.8rem;
      }
      
      /* Main content adjustments */
      main {
        margin-top: 20px;
        padding: 1rem;
        margin-left: 0.5rem;
        margin-right: 0.5rem;
        border-radius: 15px;
        animation: none;
        opacity: 1;
        transform: none;
      }
      
      main h2 {
        font-size: 1.4rem;
        margin-bottom: 1.5rem;
        line-height: 1.3;
      }
      
      /* Chapter container mobile adjustments */
      .chapter-container {
        padding: 1rem;
        margin-bottom: 2rem;
        border-radius: 12px;
        animation: none;
        opacity: 1;
        transform: none;
      }
      
      .chapter-title {
        font-size: 1.3rem;
        margin-bottom: 0.8rem;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.3rem;
      }

      .chapter-subtitle {
        font-size: 1rem;
        padding: 0.5rem 0.8rem;
        margin-bottom: 1rem;
      }
      
      /* Verse adjustments */
      .verse {
        padding: 0.8rem 1rem;
        border-radius: 8px;
        margin-bottom: 0.5rem;
      }

      .verse:hover {
        transform: none;
      }

      .verse-number {
        font-size: 1rem;
        display: block;
        margin-bottom: 0.3rem;
      }

      .verse-text {
        font-size: 0.95rem;
        line-height: 1.6;
      }
      
      
      /* Adjust floating elements for mobile */
      .reading-progress {
        bottom: 15px;
        right: 15px;
        padding: 0.6rem 1rem;
        font-size: 0.8rem;
        border-radius: 20px;
      }

      .scroll-to-top {
        bottom: 15px;
        left: 15px;
        width: 45px;
        height: 45px;
        font-size: 1rem;
      }

      /* Search notification mobile adjustments */
      .search-notification {
        padding: 1rem 1.5rem;
        font-size: 0.9rem;
        margin: 0 1rem;
        max-width: calc(100% - 2rem);
        border-radius: 15px;
      }

      /* Message adjustments */
      .message {
        padding: 0.8rem 1rem;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
      }

      /* Empty state adjustments */
      .empty-state {
        padding: 2rem 1rem;
      }

      .empty-state i {
        font-size: 3rem;
      }

      .empty-state h3 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
      }

      .empty-state p {
        font-size: 0.9rem;
      }
    }

    

    /* Landscape mobile adjustments */
    @media (max-width: 768px) and (orientation: landscape) {
      .search-container {
        flex-direction: row;
        gap: 0.5rem;
        padding: 0.8rem;
      }

      .search-btn {
        width: auto;
        padding: 0.6rem 1rem;
      }

      main {
        margin-top: 120px;
      }
    }

    /* Prevent zoom on input focus (iOS) */
    @media screen and (-webkit-min-device-pixel-ratio: 0) {
      .search-input {
        font-size: 16px;
      }
    }

    /* Touch-friendly adjustments */
    @media (hover: none) and (pointer: coarse) {
      .verse:hover {
        transform: none;
        background: rgba(255, 255, 255, 0.6);
        border-left-color: #30e8bf;
      }

      .search-btn:hover {
        transform: none;
        box-shadow: 0 4px 15px rgba(53, 122, 50, 0.3);
      }

      .scroll-to-top:hover {
        transform: none;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
      }
    }
  </style>
</head>
<body>


<!-- Navigation -->
<nav>
  <h2><i class="fas fa-book-open"></i> Kitab</h2>
  <a href="{{ route('anak.dashboard') }}"><i class="fas fa-chevron-left"></i> Kembali</a>
</nav>

<!-- Search Container -->
<div class="search-container">
  <span class="search-label"><i class="fas fa-search"></i> Cari:</span>
  <input type="number" id="searchPasal" class="search-input" placeholder="Pasal" min="1">
  <span class="search-label">:</span>
  <input type="number" id="searchAyat" class="search-input" placeholder="Ayat" min="1">
  <button class="search-btn" onclick="searchVerse()">
    <i class="fas fa-arrow-right"></i> Cari
  </button>
</div>

<!-- Search notification -->
<div class="search-notification" id="searchNotification">
  <i class="fas fa-search"></i>
  <span id="notificationText"></span>
</div>


<!-- Main content -->
<main>
  <h2>{{ $kitab ?? 'Tidak Dikenal' }}</h2>

  <!-- Message -->
  @if (!empty($pesan))
    <div class="message">
      <i class="fas fa-info-circle"></i> {{ $pesan }}
    </div>
  @endif

  <!-- Chapters and Verses -->
  @forelse ($isiKitab as $pasal => $ayatList)
    <div class="chapter-container scroll-reveal" id="pasal-{{ $pasal }}">
      <h3 class="chapter-title">
        <i class="fas fa-bookmark"></i>
        Pasal {{ $pasal }}
      </h3>

      @if (!empty($ayatList[0]['title']))
        <div class="chapter-subtitle">
          <i class="fas fa-quote-left"></i>
          {{ $ayatList[0]['title'] }}
        </div>
      @endif

      <div class="verses-container">
        @foreach ($ayatList as $ayat)
          <div class="verse scroll-reveal" id="ayat-{{ $pasal }}-{{ $ayat['verse'] }}">
            <span class="verse-number">{{ $ayat['verse'] }}.</span>
            <span class="verse-text">{{ str_replace(['<t />', '<t \/>'], '', $ayat['text']) }}</span>
          </div>
        @endforeach
      </div>
    </div>
  @empty
    <div class="empty-state">
      <i class="fas fa-book-open"></i>
      <h3>Tidak ada isi kitab ditemukan</h3>
      <p>Silakan coba lagi atau hubungi administrator.</p>
    </div>
  @endforelse

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
  
  // Search verse function
  function searchVerse() {
    const pasal = document.getElementById('searchPasal').value;
    const ayat = document.getElementById('searchAyat').value;
    
    if (!pasal) {
      showNotification('Masukkan nomor pasal!', 'error');
      return;
    }

   
    if (ayat) {
      // Search specific verse
      const targetVerse = document.getElementById(`ayat-${pasal}-${ayat}`);
      if (targetVerse) {
        targetVerse.scrollIntoView({ behavior: 'smooth', block: 'center' });
        targetVerse.classList.add('highlight');
        showNotification(`Ditemukan: Pasal ${pasal} Ayat ${ayat}`, 'success');
        
        // Remove highlight after 5 seconds
        setTimeout(() => {
          targetVerse.classList.remove('highlight');
        }, 5000);
      } else {
        showNotification(`Pasal ${pasal} Ayat ${ayat} tidak ditemukan!`, 'error');
      }
    } else {
      // Search chapter
      const targetChapter = document.getElementById(`pasal-${pasal}`);
      if (targetChapter) {
        targetChapter.scrollIntoView({ behavior: 'smooth', block: 'start' });
        showNotification(`Menuju Pasal ${pasal}`, 'success');
      } else {
        showNotification(`Pasal ${pasal} tidak ditemukan!`, 'error');
      }
    }
  }

  // Show notification
  function showNotification(message, type = 'success') {
    const notification = document.getElementById('searchNotification');
    const notificationText = document.getElementById('notificationText');
    
    notificationText.textContent = message;
    
    if (type === 'error') {
      notification.style.background = 'linear-gradient(135deg, #ef4444, #dc2626)';
    } else {
      notification.style.background = 'linear-gradient(135deg, #10b981, #059669)';
    }
    
    notification.classList.add('show');
    
    setTimeout(() => {
      notification.classList.remove('show');
    }, 3000);
  }

  // Handle Enter key in search inputs
  document.getElementById('searchPasal').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      searchVerse();
    }
  });

  document.getElementById('searchAyat').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      searchVerse();
    }
  });

  // Progress bar functionality
  function updateProgressBar() {
    const scrollTop = window.pageYOffset;
    const docHeight = document.body.scrollHeight - window.innerHeight;
    const scrollPercent = (scrollTop / docHeight) * 100;
    
    // Update reading progress
    const progressText = document.getElementById('progressText');
    const readingProgress = document.getElementById('readingProgress');
    
    if (scrollPercent > 0) {
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
      const elementVisible = 0;
      
      if (elementTop < windowHeight - elementVisible) {
        reveal.classList.add('revealed');
      }
    });
  }

  // Scroll to top functionality
  function handleScrollToTop() {
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    if (window.pageYOffset > 0) {
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
    createParticles();
    revealOnScroll();
  });

  // Enhanced copy protection
  document.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && e.key === 'c') {
      e.preventDefault();
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
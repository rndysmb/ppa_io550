<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<title>Dashboard Anak</title>
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
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 1rem;
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

  @keyframes slideInDown {
    from {
      opacity: 0;
      transform: translateY(-30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .greeting p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.1rem;
    font-weight: 400;
    animation: slideInUp 1s ease 0.3s both;
  }

  @keyframes slideInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Bible Books Section - Layout Horizontal */
  .bible-books {
    margin: 3rem 0;
    width: 100%;
  }

  .section-title {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    color: #ffffff;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    margin-bottom: 2rem;
    animation: slideInDown 1s ease;
  }

  .testament-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
  }

  .tab-btn {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.2);
    color: rgba(255, 255, 255, 0.9);
    padding: 1rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .tab-btn.active {
    background: #20c997;
    color: white;
    box-shadow:rgba(32, 201, 150, 0.6);;
    transform: translateY(-2px);
  }

  .tab-btn:hover:not(.active) {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
  }

  .books-container {
    position: relative;
  }

  .testament-books {
    display: none;
    animation: fadeIn 0.5s ease;
  }

  .testament-books.active {
    display: block;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* Horizontal scrolling layout untuk books */
  .books-wrapper {
    overflow-x: auto;
    overflow-y: hidden;
    padding: 2rem 0;
    margin: 0 -1rem;
    scrollbar-width: thin;
    scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
  }

  .books-wrapper::-webkit-scrollbar {
    height: 8px;
  }

  .books-wrapper::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
  }

  .books-wrapper::-webkit-scrollbar-thumb {
    background: linear-gradient(90deg, #4c51bf, #667eea);
    border-radius: 10px;
  }

  .books-wrapper::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(90deg, #3730a3, #4c51bf);
  }

  .books-grid {
    display: flex;
    gap: 1.5rem;
    padding: 0 1rem 1rem 1rem;
    min-width: fit-content;
  }

  .book-card {
    background-color: rgba(255, 255, 255, 0.33); 
    backdrop-filter: blur(20px);
    border-radius: 15px;
    padding: 2rem 1.5rem;
    text-align: center;
    cursor: pointer;
    color:black;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
    min-width: 180px;
    width: 180px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
  }

  .book-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
    pointer-events: none;
  }

  .book-card:hover {
    transform: translateY(-8px) scale(1.05);
    box-shadow: 0 16px 48px rgba(0, 0, 0, 0.2);
    border-color: #ffffff;
  }

  .book-card:active {
    transform: translateY(-4px) scale(1.02);
  }

  .book-card i {
    font-size: 3rem;
    margin-bottom: 1rem;
    display: block;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    animation: iconFloat 3s ease-in-out infinite;
  }

  @keyframes iconFloat {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
  }

  .book-card h4 {
    font-size: 1.1rem;
    font-weight: 600;
    color:  #437849;
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 1;
    line-height: 1.3;
  }

  .book-card p {
    font-size: 0.9rem;
    color: rgb(var(--color_primary));
    font-weight: 500;
    position: relative;
    z-index: 1;
  }

  /* Scroll hint */
  .scroll-hint {
    text-align: center;
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
    margin-top: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
  }

  .scroll-hint::before {
    content: "←";
    animation: scrollArrow 2s ease-in-out infinite;
  }

  .scroll-hint::after {
    content: "→";
    animation: scrollArrow 2s ease-in-out infinite reverse;
  }

  @keyframes scrollArrow {
    0%, 100% { transform: translateX(0); opacity: 1; }
    50% { transform: translateX(10px); opacity: 0.5; }
  }

  .action-buttons {
    margin-top: 2rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    width: 100%;
  }

  .action-buttons a {
    background: #357a32;
    color: white;
    text-decoration: none;
    text-align: center;
    padding: 1.2rem 2rem;
    font-weight: 600;
    font-size: 1.2rem;
    border-radius: 15px;
    user-select: none;
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


  .action-buttons a:hover {
  }

 

  @media (max-width: 768px) {
    .books-grid {
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 0.8rem;
    }
    .testament-tabs {
      flex-direction: column;
      align-items: center;
    }
    
    .tab-btn {
      width: 100%;
      max-width: 250px;
    }

    .book-card {
      min-width: 150px;
      width: 150px;
      padding: 1.5rem 1rem;
    }
    
    .book-card i {
      font-size: 2.5rem;
    }
    
    .book-card h4 {
      font-size: 1rem;
    }
    
    .book-card p {
      font-size: 0.8rem;
    }
  }

  @media (max-width: 480px) {
    .nav-container {
      padding: 0 1rem;
    }
    
    .nav-brand {
      font-size: 1.5rem;
    }
    
    main {
      margin: 1rem auto;
      padding: 0 0.5rem;
    }
    
    .greeting {
      padding: 1.5rem;
      margin-bottom: 2rem;
    }
    
    .greeting h1 {
      font-size: 2rem;
    }
    
    .section-title {
      font-size: 1.7rem;
    }
    
    .book-card {
      min-width: 130px;
      width: 130px;
      padding: 1.2rem 0.8rem;
    }
  }

  /* Smooth scrolling */
  html {
    scroll-behavior: smooth;
  }

  .greeting {
  display: flex;
  align-items: center;
  gap: 20px;
  flex-wrap: wrap; /* biar responsif di layar kecil */
}

.profile-video {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 50%;
  border: 3px solid #ccc;
}

.greeting-text {
  flex: 1;
}


/* Tampilan desktop */
  @media (max-width: 768px) {
    .greeting {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .profile-video {
      display:block;
    }
  }

  
</style>
</head>
<body>


<div class="HomepageHeroHeader">

{{-- Include navbar --}}
    @include('anak.navbar')

<main>
 <section class="greeting">
  <video class="profile-video" src="{{ asset('video/hallomore.mp4') }}" autoplay muted loop></video>

  <div class="greeting-text">
    <h1>Halo, {{ Auth::guard('anak')->user()->nama }}</h1>
    <p id="motivasi-text"></p>
  </div>
</section>


<script>
  const teksMotivasi = [
    "Hari ini mungkin biasa aja, tapi tetap ada alasan buat bersyukur",
    "Lagi down? Coba buka Alkitab, ada harapan di sana",
    "Deketin Tuhan itu bikin hati lebih tenang dan adem, lho",
    "Ayo buka Alkitab sebentar, ada pesan khusus buat hari ini",
    "Santai aja bacanya, yang penting dinikmati dan dipahami isinya",
    "Terus baca!! dihalaman selanjutnya mungkin ada jawaban-Nya",
    "Konsisten itu bukan soal cepat, tapi soal tetap jalan",
    "Sekarang berat ya? Tapi nanti kamu bakal bangga ke diri sendiri"
  ];

  let index = 0;
  const elemenTeks = document.getElementById("motivasi-text");

  elemenTeks.textContent = teksMotivasi[index];

  setInterval(() => {
    index = (index + 1) % teksMotivasi.length;
    elemenTeks.textContent = teksMotivasi[index];
  }, 3000);
</script>

  <section class="bible-books">
    <h2 class="section-title">Kitab Alkitab</h2>
    <div class="testament-tabs">
      <button class="tab-btn active" onclick="showTestament('old')">Perjanjian Lama</button>
      <button class="tab-btn" onclick="showTestament('new')">Perjanjian Baru</button>
    </div>
    @yield('content')
    <div class="books-container">
      <!-- Perjanjian Lama -->
      <div class="testament-books active" id="old-testament">
        <div class="books-wrapper">
          <div class="books-grid">
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Kejadian']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Kejadian</h4>
              <p>50 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Keluaran']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Keluaran</h4>
              <p>50 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Imamat']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Imamat</h4>
              <p>27 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Bilangan']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Bilangan</h4>
              <p>36 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Ulangan']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Ulangan</h4>
              <p>34 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Yosua']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Yosua</h4>
              <p>24 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Hakim-hakim']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Hakim-hakim</h4>
              <p>21 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Rut']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Rut</h4>
              <p>4 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '1 Samuel']) }}">
              <i class="fas fa-scroll"></i>
              <h4>1 Samuel</h4>
              <p>31 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '2 Samuel']) }}">
              <i class="fas fa-scroll"></i>
              <h4>2 Samuel</h4>
              <p>24 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '1 Raja-raja']) }}">
              <i class="fas fa-scroll"></i>
              <h4>1 Raja-raja</h4>
              <p>22 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '2 Raja-raja']) }}">
              <i class="fas fa-scroll"></i>
              <h4>2 Raja-raja</h4>
              <p>25 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '1 Tawarikh']) }}">
              <i class="fas fa-scroll"></i>
              <h4>1 Tawarikh</h4>
              <p>29 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '2 Tawarikh']) }}">
              <i class="fas fa-scroll"></i>
              <h4>2 Tawarikh</h4>
              <p>36 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Ezra']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Ezra</h4>
              <p>10 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Nehemia']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Nehemia</h4>
              <p>13 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Ester']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Ester</h4>
              <p>10 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Ayub']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Ayub</h4>
              <p>42 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Mazmur']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Mazmur</h4>
              <p>150 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Amsal']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Amsal</h4>
              <p>31 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Pengkhotbah']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Pengkhotbah</h4>
              <p>12 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Kidung Agung']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Kidung Agung</h4>
              <p>8 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Yesaya']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Yesaya</h4>
              <p>66 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Yeremia']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Yeremia</h4>
              <p>52 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Ratapan']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Ratapan</h4>
              <p>5 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Yehezkiel']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Yehezkiel</h4>
              <p>48 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Daniel']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Daniel</h4>
              <p>12 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Hosea']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Hosea</h4>
              <p>14 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Yoel']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Yoel</h4>
              <p>3 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Amos']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Amos</h4>
              <p>9 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Obaja']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Obaja</h4>
              <p>1 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Yunus']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Yunus</h4>
              <p>4 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Mikha']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Mikha</h4>
              <p>7 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Nahum']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Nahum</h4>
              <p>3 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Habakuk']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Habakuk</h4>
              <p>3 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Zefanya']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Zefanya</h4>
              <p>3 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Hagai']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Hagai</h4>
              <p>2 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Zakharia']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Zakharia</h4>
              <p>14 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Maleakhi']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Maleakhi</h4>
              <p>4 pasal</p>
            </a>
        </div>

        </div>
      </div>

            <!-- Perjanjian Baru -->
      <div class="testament-books" id="new-testament">
        <div class="books-wrapper">
          <div class="books-grid">
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Matius']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Matius</h4>
              <p>28 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Markus']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Markus</h4>
              <p>16 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Lukas']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Lukas</h4>
              <p>24 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Yohanes']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Yohanes</h4>
              <p>21 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Kisah Para Rasul']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Kisah Para Rasul</h4>
              <p>28 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Roma']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Roma</h4>
              <p>16 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '1 Korintus']) }}">
              <i class="fas fa-scroll"></i>
              <h4>1 Korintus</h4>
              <p>16 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '2 Korintus']) }}">
              <i class="fas fa-scroll"></i>
              <h4>2 Korintus</h4>
              <p>13 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Galatia']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Galatia</h4>
              <p>6 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Efesus']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Efesus</h4>
              <p>6 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Filipi']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Filipi</h4>
              <p>4 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Kolose']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Kolose</h4>
              <p>4 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '1 Tesalonika']) }}">
              <i class="fas fa-scroll"></i>
              <h4>1 Tesalonika</h4>
              <p>5 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '2 Tesalonika']) }}">
              <i class="fas fa-scroll"></i>
              <h4>2 Tesalonika</h4>
              <p>3 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '1 Timotius']) }}">
              <i class="fas fa-scroll"></i>
              <h4>1 Timotius</h4>
              <p>6 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '2 Timotius']) }}">
              <i class="fas fa-scroll"></i>
              <h4>2 Timotius</h4>
              <p>4 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Titus']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Titus</h4>
              <p>3 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Filemon']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Filemon</h4>
              <p>1 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Ibrani']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Ibrani</h4>
              <p>13 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Yakobus']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Yakobus</h4>
              <p>5 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '1 Petrus']) }}">
              <i class="fas fa-scroll"></i>
              <h4>1 Petrus</h4>
              <p>5 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '2 Petrus']) }}">
              <i class="fas fa-scroll"></i>
              <h4>2 Petrus</h4>
              <p>3 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '1 Yohanes']) }}">
              <i class="fas fa-scroll"></i>
              <h4>1 Yohanes</h4>
              <p>5 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '2 Yohanes']) }}">
              <i class="fas fa-scroll"></i>
              <h4>2 Yohanes</h4>
              <p>1 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => '3 Yohanes']) }}">
              <i class="fas fa-scroll"></i>
              <h4>3 Yohanes</h4>
              <p>1 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Yudas']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Yudas</h4>
              <p>1 pasal</p>
            </a>
            <a class="book-card" href="{{ route('anak.kitab', ['kitab' => 'Wahyu']) }}">
              <i class="fas fa-scroll"></i>
              <h4>Wahyu</h4>
              <p>22 pasal</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>

  
</main>

<script>
 

  // Testament tab functionality
  function showTestament(testament) {
    // Update active tab
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.classList.remove('active');
    });
    event.target.classList.add('active');

    // Show/hide testament books
    document.querySelectorAll('.testament-books').forEach(books => {
      books.classList.remove('active');
    });
    document.getElementById(testament + '-testament').classList.add('active');
  }

  

  // Add entrance animations with stagger
  window.addEventListener('load', () => {
    const elements = document.querySelectorAll('.action-buttons a');
    elements.forEach((el, index) => {
      el.style.animationDelay = (index * 0.2) + 's';
    });
  });
</script>

</body>
</html>
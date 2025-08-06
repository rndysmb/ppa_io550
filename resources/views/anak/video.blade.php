<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
/>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<title>Refensi</title>
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
    background: transparent;
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

  /* Video Categories Section */
  .video-categories {
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

  .category-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
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
    box-shadow: 0 8px 25px rgba(32, 201, 150, 0.6);
    transform: translateY(-2px);
  }

  .tab-btn:hover:not(.active) {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
  }

  .videos-container {
    position: relative;
    width: 100%;
  }

  .category-videos {
    display: none;
    animation: fadeIn 0.5s ease;
  }

  .category-videos.active {
    display: block;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* NEW: Grid Layout for Murid Yesus */
  .videos-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    padding: 1rem;
    width: 100%;
  }

  /* For other categories - maintain horizontal scroll */
  .videos-wrapper {
    overflow-x: auto;
    overflow-y: hidden;
    padding: 2rem 0;
    margin: 0 -1rem;
    scrollbar-width: thin;
    scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
  }

  .videos-wrapper::-webkit-scrollbar {
    height: 8px;
  }

  .videos-wrapper::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
  }

  .videos-wrapper::-webkit-scrollbar-thumb {
    background: linear-gradient(90deg, #4c51bf, #667eea);
    border-radius: 10px;
  }

  .videos-wrapper::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(90deg, #3730a3, #4c51bf);
  }

  .videos-grid-horizontal {
    display: flex;
    gap: 1.5rem;
    padding: 0 1rem 1rem 1rem;
    min-width: fit-content;
  }

  .video-card {
    background-color: rgba(255, 255, 255, 0.33); 
    backdrop-filter: blur(20px);
    border-radius: 15px;
    padding: 1.5rem;
    cursor: pointer;
    color: black;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
  }

  /* For grid layout */
  .videos-grid .video-card {
    width: 100%;
    max-width: none;
    min-width: auto;
  }

  /* For horizontal scroll layout */
  .videos-grid-horizontal .video-card {
    min-width: 320px;
    width: 320px;
  }

  .video-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
    pointer-events: none;
  }

  .video-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 16px 48px rgba(0, 0, 0, 0.2);
    border-color: #ffffff;
  }

  .video-card.playing {
    border-color: #20c997;
    box-shadow: 0 0 0 3px rgba(32, 201, 150, 0.3);
  }

  .video-thumbnail-container {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 1rem;
    background: #000;
  }

  .video-thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: opacity 0.3s ease;
  }

  .video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .video-card:hover .video-overlay {
    opacity: 1;
  }

  .play-button {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #ff0000;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
  }

  .play-button:hover {
    transform: scale(1.1);
    background: rgba(255, 255, 255, 1);
  }

  .video-player {
    width: 100%;
    height: 100%;
    display: none;
    border-radius: 12px;
  }

  .video-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #437849;
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 1;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .video-description {
    font-size: 0.9rem;
    color: rgba(0, 0, 0, 0.7);
    font-weight: 500;
    position: relative;
    z-index: 1;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
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

  /* Hide scroll hint for grid layout */
  .category-videos.active .scroll-hint {
    display: none;
  }

  #lagu-videos .scroll-hint,
  #renungan-videos .scroll-hint,
  #film-videos .scroll-hint {
    display: flex !important;
  }

  
  /* Tablet responsive */
  @media (max-width: 1024px) {
    .videos-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 1.2rem;
    }
  }

  /* Mobile responsive */
  @media (max-width: 768px) {
    .category-tabs {
      flex-direction: column;
      align-items: center;
    }
    
    .tab-btn {
      width: 100%;
      max-width: 250px;
    }

    /* Mobile: 2 columns for Murid Yesus */
    .videos-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 1rem;
      padding: 0.5rem;
    }

    .video-card {
      padding: 1.2rem;
    }

    .videos-grid-horizontal .video-card {
      min-width: 280px;
      width: 280px;
    }
    
    .play-button {
      width: 50px;
      height: 50px;
      font-size: 20px;
    }
    
    .video-title {
      font-size: 1rem;
    }
    
    .video-description {
      font-size: 0.8rem;
    }

    .greeting {
      max-width: 90%;
    }

    .greeting h1 {
      font-size: 2rem;
    }
  }

  @media (max-width: 480px) {
    main {
      margin: 1rem auto;
      padding: 0 0.5rem;
    }
    
    .greeting {
      padding: 1.5rem;
      margin-bottom: 2rem;
    }
    
    .section-title {
      font-size: 1.7rem;
    }
    
    .videos-grid {
      gap: 0.8rem;
      padding: 0.3rem;
    }
    
    .video-card {
      padding: 1rem;
    }

    .videos-grid-horizontal .video-card {
      min-width: 250px;
      width: 250px;
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
    <h1>Referensi</h1>
    <p>Dapatkan banyak hal bermakna disini</p>
  </section>

  <section class="video-categories">
    <h2 class="section-title">Kategori Video</h2>
    <div class="category-tabs">
      <button class="tab-btn active" onclick="showCategory('kesaksian')">Murid Yesus</button>
      <button class="tab-btn" onclick="showCategory('lagu')">Lagu Rohani Anak</button>
      <button class="tab-btn" onclick="showCategory('renungan')">Renungan Harian</button>
      <button class="tab-btn" onclick="showCategory('film')">Film Rohani</button>
    </div>
    
    <div class="videos-container">
      <!-- Murid Yesus - Grid Layout -->
      <div class="category-videos active" id="kesaksian-videos">
        <div class="videos-grid">

        <div class="video-card" data-video-id="jdBx0ztiJS4">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/jdBx0ztiJS4/maxresdefault.jpg" alt="Petrus">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">PETRUS</div>
            <div class="video-description">Nelayan yang menjadi pemimpin para rasul. Ia dikenal berani namun pernah menyangkal Yesus.</div>
          </div>

          <div class="video-card" data-video-id="WfnDW5npSf4">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/WfnDW5npSf4/maxresdefault.jpg" alt="Andreas">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">ANDREAS</div>
            <div class="video-description">Saudara Petrus dan murid pertama Yesus. Ia dikenal suka membawa orang kepada Yesus.</div>
          </div>

          <div class="video-card" data-video-id="yugwnVtcZ0M">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/yugwnVtcZ0M/maxresdefault.jpg" alt="Yakobus">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">YAKOBUS (ANAK ZEBEDEUS)</div>
            <div class="video-description">Salah satu dari tiga murid terdekat Yesus. Ia mati sebagai rasul pertama yang menjadi martir.</div>
          </div>

          <div class="video-card" data-video-id="32BfetE37WE">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/32BfetE37WE/maxresdefault.jpg" alt="Yohanes">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">YOHANES</div>
            <div class="video-description">Adik Yakobus dan penulis Injil Yohanes. Ia disebut murid yang dikasihi Yesus.</div>
          </div>

          <div class="video-card" data-video-id="AqCWoHhp7EA">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/AqCWoHhp7EA/maxresdefault.jpg" alt="Filipus">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">FILIPUS</div>
            <div class="video-description">Memperkenalkan Bartolomeus. Ia dikenal karena pertanyaannya tentang Bapa.</div>
          </div>

          <div class="video-card" data-video-id="xcR2F-OpTzw">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/xcR2F-OpTzw/maxresdefault.jpg" alt="Bartolomeus">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">BARTOLOMEUS</div>
            <div class="video-description">Seorang yang jujur dan tulus hati. Ia memberitakan Injil hingga ke luar negeri.</div>
          </div>

          <div class="video-card" data-video-id="pCg5vOcz3jw">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/pCg5vOcz3jw/maxresdefault.jpg" alt="Matius">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">MATIUS</div>
            <div class="video-description">Dari pemungut cukai menjadi murid Yesus</div>
          </div>

          <div class="video-card" data-video-id="g_FLwetuFn4">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/g_FLwetuFn4/maxresdefault.jpg" alt="Tomas">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">TOMAS</div>
            <div class="video-description">Dikenal karena meragukan kebangkitan Yesus. Namun akhirnya mengakui Yesus sebagai Tuhan dan Allahnya.</div>
          </div>
          

          <div class="video-card" data-video-id="axIcSaerFRo">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/axIcSaerFRo/maxresdefault.jpg" alt="Simon">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">YAKOBUS (ANAK ALFEUS)</div>
            <div class="video-description">Disebut juga Yakobus Kecil. Tidak banyak dicatat, tapi tetap setia sebagai rasul.</div>
          </div>


          <div class="video-card" data-video-id="XaZ7Dx1kSpQ">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/XaZ7Dx1kSpQ/maxresdefault.jpg" alt="Yudas Iskariot">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">TADEUS</div>
            <div class="video-description">Bertanya kepada Yesus mengapa Dia menyatakan diri kepada murid-murid. Memberitakan Injil ke daerah Siria.</div>
          </div>
          <div class="video-card" data-video-id="4yvTOuCrvnE">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/4yvTOuCrvnE/maxresdefault.jpg" alt="Tadeus">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">SIMON ORANG ZELOT</div>
            <div class="video-description">Dahulu seorang nasionalis radikal. Ia berubah menjadi pengikut setia Yesus.</div>
          </div>

          <div class="video-card" data-video-id="UJ1Xf6KRyOY">
            <div class="video-thumbnail-container">
              <img class="video-thumbnail" src="https://img.youtube.com/vi/UJ1Xf6KRyOY/maxresdefault.jpg" alt="Yakobus anak Alfeus">
              <div class="video-overlay">
                <div class="play-button">▶</div>
              </div>
              <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-title">YUDAS ISKARIOT</div>
            <div class="video-description">Mengkhianati Yesus dengan mencium-Nya. Setelah itu, ia menyesal dan mengakhiri hidupnya.</div>
          </div>
        </div>
      </div>

      
      <!-- Lagu Rohani Anak -->
      <div class="category-videos" id="lagu-videos">
        <div class="videos-wrapper">
          <div class="videos-grid">
            <div class="video-card" data-video-id="kgovNdv3T5o">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/kgovNdv3T5o/maxresdefault.jpg" alt="Yesus Pokok dan Kitalah Carangnya">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">YESUS POKOK DAN KITALAH CARANGNYA</div>
              <div class="video-description">Gerak & Lagu Sekolah Minggu yang mengajarkan tentang persatuan dengan Yesus</div>
            </div>

            <div class="video-card" data-video-id="BQrFY-NZDNs">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/BQrFY-NZDNs/maxresdefault.jpg" alt="Bintang Kecil">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">Bintang Kecil - Lagu Rohani Anak yang Ceria</div>
              <div class="video-description">Lagu yang mengajarkan anak-anak untuk menjadi terang bagi sesama</div>
            </div>

            <div class="video-card" data-video-id="nWq70BuQ89s">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/nWq70BuQ89s/maxresdefault.jpg" alt="Maria & Yusuf Mencari Tuhan Yesus">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">MARIA & YUSUF MENCARI TUHAN YESUS</div>
              <div class="video-description">Kisah inspiratif tentang pencarian Maria dan Yusuf terhadap Tuhan Yesus</div>
            </div>

            <div class="video-card" data-video-id="jK_G-wRl2eg">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/jK_G-wRl2eg/maxresdefault.jpg" alt="Kudaki Daki Gunung yang Tinggi">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">Kudaki Daki Gunung yang Tinggi Yesus Besertaku</div>
              <div class="video-description">Gerak Lagu Sekolah Minggu yang penuh semangat dan iman</div>
            </div>
          </div>
        </div>
        <div class="scroll-hint">Geser untuk melihat video lainnya</div>
      </div>

      <!-- Renungan Harian -->
      <div class="category-videos" id="renungan-videos">
        <div class="videos-wrapper">
          <div class="videos-grid">
            <div class="video-card" data-video-id="9OR9mO3EJNs">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/9OR9mO3EJNs/maxresdefault.jpg" alt="Lakukan dengan Segenap Hati">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">Lakukan dengan Segenap Hati - Kolose 3:23</div>
              <div class="video-description">Cerita sekolah minggu yang mengajarkan tentang dedikasi dan kesetiaan</div>
            </div>

            <div class="video-card" data-video-id="nWq70BuQ89s">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/nWq70BuQ89s/maxresdefault.jpg" alt="Maria & Yusuf Mencari Tuhan Yesus">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">MARIA & YUSUF MENCARI TUHAN YESUS</div>
              <div class="video-description">Kisah inspiratif tentang pencarian Maria dan Yusuf terhadap Tuhan Yesus</div>
            </div>

            <div class="video-card" data-video-id="sIBNZ3KhPJw">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/sIBNZ3KhPJw/maxresdefault.jpg" alt="Semut dan Belalang">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">Cerita Anak Sekolah Minggu: Semut dan Belalang</div>
              <div class="video-description">Pelajaran berharga tentang kerja keras dan ketekunan</div>
            </div>

            <div class="video-card" data-video-id="YUmfT8q2vbc">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/YUmfT8q2vbc/maxresdefault.jpg" alt="Kehidupan Yusuf">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">Memelihara Kasih Persaudaraan - Kehidupan Yusuf</div>
              <div class="video-description">Renungan harian tentang kasih dan pengampunan dalam keluarga</div>
            </div>
          </div>
        </div>
        <div class="scroll-hint">Geser untuk melihat video lainnya</div>
      </div>

      <!-- Film Rohani -->
      <div class="category-videos" id="film-videos">
        <div class="videos-wrapper">
          <div class="videos-grid">
            <div class="video-card" data-video-id="tcV00Jhmk24">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/tcV00Jhmk24/maxresdefault.jpg" alt="Kisah Kelahiran Yesus">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">Animasi Alkitab Kisah Kelahiran Yesus Full Video</div>
              <div class="video-description">Superbook Indonesia - Film lengkap tentang kelahiran Yesus Kristus</div>
            </div>

            <div class="video-card" data-video-id="D559krmdJ8w">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/D559krmdJ8w/maxresdefault.jpg" alt="Samuel Dipanggil Tuhan">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">SAMUEL DIPANGGIL TUHAN UNTUK LAKUKAN HAL INI</div>
              <div class="video-description">Kisah panggilan Tuhan kepada Samuel sejak usia muda</div>
            </div>

            <div class="video-card" data-video-id="nWq70BuQ89s">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/nWq70BuQ89s/maxresdefault.jpg" alt="Maria & Yusuf Mencari Tuhan Yesus">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">MARIA & YUSUF MENCARI TUHAN YESUS</div>
              <div class="video-description">Kisah inspiratif tentang pencarian Maria dan Yusuf terhadap Tuhan Yesus</div>
            </div>

            <div class="video-card" data-video-id="YIYk91A9St8">
              <div class="video-thumbnail-container">
                <img class="video-thumbnail" src="https://img.youtube.com/vi/YIYk91A9St8/maxresdefault.jpg" alt="Kisah Musa">
                <div class="video-overlay">
                  <div class="play-button">▶</div>
                </div>
                <iframe class="video-player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="video-title">KISAH MUSA - TUHAN MENGUTUS MUSA</div>
              <div class="video-description">Super Animasi Superbook Full - Kisah pemanggilan Musa untuk bangsa Israel</div>
            </div>
          </div>
        </div>
        <div class="scroll-hint">Geser untuk melihat video lainnya</div>
      </div>
    </div>
  </section>
</main>


<script>
  let currentPlayingVideo = null;

  
  function showCategory(category) {
   
    stopCurrentVideo();
    
    // Update active tab
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.classList.remove('active');
    });
    event.target.classList.add('active');

    // Show/hide category videos
    document.querySelectorAll('.category-videos').forEach(videos => {
      videos.classList.remove('active');
    });
    document.getElementById(category + '-videos').classList.add('active');
  }

  function stopCurrentVideo() {
    if (currentPlayingVideo) {
      const iframe = currentPlayingVideo.querySelector('.video-player');
      const thumbnail = currentPlayingVideo.querySelector('.video-thumbnail');
      const overlay = currentPlayingVideo.querySelector('.video-overlay');
      
      // Stop video by removing src
      iframe.src = '';
      iframe.style.display = 'none';
      thumbnail.style.display = 'block';
      overlay.style.display = 'flex';
      
      // Remove playing class
      currentPlayingVideo.classList.remove('playing');
      currentPlayingVideo = null;
    }
  }

  // Add click events to all video cards
  document.querySelectorAll('.video-card').forEach(card => {
    card.addEventListener('click', function() {
      // Check if this video is already playing
      if (currentPlayingVideo === this) {
        return;
      }
      
      // Stop current video
      stopCurrentVideo();
      
      // Play clicked video
      const videoId = this.dataset.videoId;
      const iframe = this.querySelector('.video-player');
      const thumbnail = this.querySelector('.video-thumbnail');
      const overlay = this.querySelector('.video-overlay');
      
      iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
      thumbnail.style.display = 'none';
      overlay.style.display = 'none';
      iframe.style.display = 'block';
      
      // Set as currently playing
      this.classList.add('playing');
      currentPlayingVideo = this;
    });
  });

  // Add entrance animations with stagger
  window.addEventListener('load', () => {
    const elements = document.querySelectorAll('.video-card');
    elements.forEach((el, index) => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      setTimeout(() => {
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        el.style.opacity = '1';
        el.style.transform = 'translateY(0)';
      }, index * 100);
    });
  });
</script>

</body>
</html>
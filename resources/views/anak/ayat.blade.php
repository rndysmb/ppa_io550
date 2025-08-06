<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayat Motivasi</title>
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

        .greeting p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            font-weight: 400;
            animation: slideInUp 1s ease 0.3s both;
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

        .pencet {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .tombol {
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
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .tombol.active {
            background: #20c997;
            color: white;
            box-shadow: 0 8px 20px rgba(32, 201, 150, 0.3);
            transform: translateY(-2px);
        }

        .tombol:hover:not(.active) {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .section {
            display: none;
            width: 100%;
        }

        .section.active {
            display: block;
        }

        .stats {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .stats h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .stats p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .search-bar {
            margin-bottom: 2rem;
            text-align: center;
        }

        .search-bar input {
            width: 100%;
            max-width: 500px;
            padding: 15px 25px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            outline: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .search-bar input:focus {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        /* Vertical grid layout */
        .verses-container {
            width: 100%;
            padding: 1rem 0;
        }

        .verse-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            padding: 0 1rem;
            width: 100%;
        }

        .verse-card {
            background: rgba(255, 255, 255, 0.33);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem 1.5rem;
            color: black;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 250px;
        }

        .verse-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #30e8bf, #ff8235);
        }

        .verse-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.2);
            border-color: #ffffff;
        }

        .verse-text {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 15px;
            color: #2c3e50;
            font-style: italic;
            position: relative;
            flex-grow: 1;
        }

        .verse-text::before {
            content: '"';
            font-size: 3rem;
            color: #30e8bf;
            position: absolute;
            top: -10px;
            left: -15px;
            opacity: 0.3;
        }

        .verse-reference {
            font-weight: 700;
            color: #437849;
            font-size: 1rem;
            margin-bottom: 15px;
            text-align: right;
        }

        .verse-actions {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .favorite-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .favorite-btn.add {
            background: #357a32;
            color: white;
        }

        .favorite-btn.remove {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
        }

        .favorite-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .favorite-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .heart-icon {
            font-size: 1.2rem;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: white;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            grid-column: 1 / -1;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            opacity: 0.9;
        }

        .empty-state p {
            font-size: 1rem;
            opacity: 0.7;
        }

        .animation-bounce {
            animation: bounce 0.6s ease-in-out;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Load more button */
        .load-more-container {
            text-align: center;
            margin: 2rem 0;
            width: 100%;
        }

        .load-more-btn {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.9);
            padding: 1rem 3rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .load-more-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

 
        @media (max-width: 768px) {
            .greeting {
                max-width: 95%;
                padding: 1.5rem;
            }

            .greeting h1 {
                font-size: 2rem;
            }

            .pencet {
                flex-direction: column;
                align-items: center;
            }

            .tombol {
                width: 100%;
                max-width: 250px;
            }

            .verse-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .verse-card {
                padding: 1.5rem 1rem;
                min-height: 220px;
            }

            .verse-actions {
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            .verse-card {
                padding: 1.2rem 0.8rem;
                min-height: 200px;
            }

            .verse-text {
                font-size: 1rem;
            }

            .verse-reference {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    {{-- Include navbar --}}
    @include('anak.navbar')
    <main>
        <div class="greeting">
            <h1>📖 Ayat Alkitab Favorit</h1>
            <p>Kumpulkan ayat-ayat yang menyentuh hati Anda</p>
        </div>

        <div class="pencet">
            <button class="tombol active" onclick="showSection('all-verses')">
                Semua Ayat
            </button>
            <button class="tombol" onclick="showSection('favorites')">
                ❤️ Favorit Saya
            </button>
        </div>

        <div id="all-verses" class="section active">
            <div class="stats">
                <h3>✨ Pilih Ayat Favorit Anda</h3>
                <p>Total <span id="total-verses"></span> ayat tersedia</p>
            </div>
            <div class="search-bar">
                <input type="text" id="search-input" onkeyup="filterVerses()" placeholder="Cari ayat atau referensi...">
            </div>
            <div class="verses-container">
                <div class="verse-grid" id="all-verses-grid">
                </div>
            </div>
        </div>

        <div id="favorites" class="section">
            <div class="stats">
                <h3>❤️ Koleksi Favorit Anda</h3>
                <p><span id="favorites-count">0</span> ayat telah disimpan</p>
            </div>
            <div class="verses-container">
                <div class="verse-grid" id="favorites-grid">
                </div>
            </div>
        </div>
    </main>

    <script>
        const verses = [
            { id: 1, text: "Karena begitu besar kasih Allah akan dunia ini, sehingga Ia telah mengaruniakan Anak-Nya yang tunggal, supaya setiap orang yang percaya kepada-Nya tidak binasa, melainkan beroleh hidup yang kekal.", reference: "Yohanes 3:16" },
            { id: 2, text: "TUHAN adalah gembalaku, takkan kekurangan aku.", reference: "Mazmur 23:1" },
            { id: 3, text: "Aku sanggup melakukan segala sesuatu di dalam Dia yang memberi kekuatan kepadaku.", reference: "Filipi 4:13" },
            { id: 4, text: "Janganlah hendaknya kamu kuatir tentang apa pun juga, tetapi nyatakanlah dalam segala hal keinginanmu kepada Allah dalam doa dan permohonan dengan ucapan syukur.", reference: "Filipi 4:6" },
            { id: 5, text: "Sebab Aku ini mengetahui rancangan-rancangan apa yang ada pada-Ku mengenai kamu, demikianlah firman TUHAN, yaitu rancangan damai sejahtera dan bukan rancangan kecelakaan, untuk memberikan kepadamu hari depan yang penuh harapan.", reference: "Yeremia 29:11" },
            { id: 6, text: "Kasihilah sesamamu manusia seperti dirimu sendiri.", reference: "Matius 22:39" },
            { id: 7, text: "Bergembiralah senantiasa dalam Tuhan! Sekali lagi kukatakan: Bergembiralah!", reference: "Filipi 4:4" },
            { id: 8, text: "Datanglah kepada-Ku, semua yang letih lesu dan berbeban berat, Aku akan memberi kelegaan kepadamu.", reference: "Matius 11:28" },
            { id: 9, text: "Allah adalah kasih, dan barangsiapa tetap berada di dalam kasih, ia tetap berada di dalam Allah dan Allah di dalam dia.", reference: "1 Yohanes 4:16" },
            { id: 10, text: "Tetapi orang-orang yang menanti-nantikan TUHAN mendapat kekuatan baru: mereka seumpama rajawali yang naik terbang dengan kekuatan sayapnya.", reference: "Yesaya 40:31" },
            { id: 11, text: "Janganlah takut, sebab Aku menyertai engkau, janganlah bimbang, sebab Aku ini Allahmu; Aku akan meneguhkan, bahkan akan menolong engkau.", reference: "Yesaya 41:10" },
            { id: 12, text: "Kepada-Mu, ya TUHAN, aku mengangkat jiwaku. Allahku, kepada-Mulah aku percaya.", reference: "Mazmur 25:1-2" },
            { id: 13, text: "Karena kasih karunia Allah yang menyelamatkan semua manusia sudah nyata.", reference: "Titus 2:11" },
            { id: 14, text: "Damai sejahtera Kutinggalkan bagimu. Damai sejahtera-Ku Kuberikan kepadamu, dan apa yang Kuberikan tidak seperti yang diberikan oleh dunia kepadamu.", reference: "Yohanes 14:27" },
            { id: 15, text: "Pada mulanya Allah menciptakan langit dan bumi.", reference: "Kejadian 1:1" },
            { id: 16, text: "Sebab di mana dua atau tiga orang berkumpul dalam nama-Ku, di situ Aku ada di tengah-tengah mereka.", reference: "Matius 18:20" },
            { id: 17, text: "Percayalah kepada TUHAN dengan segenap hatimu, dan janganlah bersandar kepada pengertianmu sendiri.", reference: "Amsal 3:5" },
            { id: 18, text: "Sebab upah dosa ialah maut; tetapi karunia Allah ialah hidup yang kekal dalam Kristus Yesus, Tuhan kita.", reference: "Roma 6:23" },
            { id: 19, text: "Aku datang, supaya mereka mempunyai hidup, dan mempunyainya dalam segala kelimpahan.", reference: "Yohanes 10:10" },
            { id: 20, text: "Sebab itu janganlah kamu kuatir akan hari esok, karena hari esok mempunyai kesusahannya sendiri. Kesusahan sehari cukuplah untuk sehari.", reference: "Matius 6:34" },
            { id: 21, text: "Berjaga-jagalah dan berdoalah, supaya kamu jangan jatuh ke dalam pencobaan: roh memang penurut, tetapi daging lemah.", reference: "Matius 26:41" },
            { id: 22, text: "Segala sesuatu ada masanya, ada waktu untuk setiap maksud di bawah kolong langit.", reference: "Pengkhotbah 3:1" },
            { id: 23, text: "Tetapi carilah dahulu Kerajaan Allah dan kebenarannya, maka semuanya itu akan ditambahkan kepadamu.", reference: "Matius 6:33" },
            { id: 24, text: "Dan kita tahu sekarang, bahwa Allah turut bekerja dalam segala sesuatu untuk mendatangkan kebaikan bagi mereka yang mengasihi Dia, yaitu bagi mereka yang terpanggil sesuai dengan rencana Allah.", reference: "Roma 8:28" },
            { id: 25, text: "Sebab di dalam Dia dan oleh darah-Nya kita beroleh penebusan, yaitu pengampunan dosa, menurut kekayaan kasih karunia-Nya.", reference: "Efesus 1:7" },
            { id: 26, text: "Ujilah segala sesuatu dan peganglah yang baik.", reference: "1 Tesalonika 5:21" },
            { id: 27, text: "Dan inilah kemenangan yang mengalahkan dunia: iman kita.", reference: "1 Yohanes 5:4" },
            { id: 28, text: "Lihatlah, Aku berdiri di muka pintu dan mengetok; jikalau ada orang yang mendengar suara-Ku dan membukakan pintu, Aku akan masuk mendapatkannya dan Aku makan bersama-sama dengan dia, dan ia bersama-sama dengan Aku.", reference: "Wahyu 3:20" },
            { id: 29, text: "Berbahagialah orang yang tidak berjalan menurut nasihat orang fasik, yang tidak berdiri di jalan orang berdosa, dan yang tidak duduk dalam kumpulan pencemooh.", reference: "Mazmur 1:1" },
            { id: 30, text: "Firman-Mu itu pelita bagi kakiku dan terang bagi jalanku.", reference: "Mazmur 119:105" }
        ];

        let favorites = [];

        function showSection(sectionName) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            
            document.querySelectorAll('.tombol').forEach(btn => {
                btn.classList.remove('active');
            });
            
            document.getElementById(sectionName).classList.add('active');
            const targetButton = document.querySelector(`.tombol[onclick="showSection('${sectionName}')"]`);
            if (targetButton) {
                targetButton.classList.add('active');
            }
            
            if (sectionName === 'favorites') {
                renderFavorites();
            } else if (sectionName === 'all-verses') {
                renderAllVerses();
                document.getElementById('search-input').value = '';
            }
        }

        function addToFavorites(verseId) {
            const verse = verses.find(v => v.id === verseId);
            if (verse && !favorites.find(f => f.id === verseId)) {
                favorites.push(verse);
                updateFavoritesCount();
                renderAllVerses();
                
                const btn = document.querySelector(`[onclick="addToFavorites(${verseId})"]`);
                if (btn) {
                    btn.classList.add('animation-bounce');
                    setTimeout(() => btn.classList.remove('animation-bounce'), 600);
                }
                
                showNotification(`"${verse.reference}" ditambahkan ke favorit!`);
            }
        }

        function removeFromFavorites(verseId) {
            const verse = favorites.find(f => f.id === verseId);
            favorites = favorites.filter(f => f.id !== verseId);
            updateFavoritesCount();
            renderAllVerses();
            renderFavorites();
            
            if (verse) {
                showNotification(`"${verse.reference}" dihapus dari favorit.`);
            } else {
                showNotification('Ayat dihapus dari favorit.');
            }
        }

        function renderVerseCard(verse, isFavorite = false) {
            const isInFavorites = favorites.find(f => f.id === verse.id);
            
            return `
                <div class="verse-card">
                    <div class="verse-content">
                        <div class="verse-text">${verse.text}</div>
                        <div class="verse-reference">${verse.reference}</div>
                    </div>
                    <div class="verse-actions">
                        ${isFavorite ? 
                            `<button class="favorite-btn remove" onclick="removeFromFavorites(${verse.id})">
                                <span class="heart-icon">💔</span>
                                Hapus dari Favorit
                            </button>` :
                            `<button class="favorite-btn add" onclick="addToFavorites(${verse.id})" ${isInFavorites ? 'disabled' : ''}>
                                <span class="heart-icon">${isInFavorites ? '💖' : '🤍'}</span>
                                ${isInFavorites ? 'Sudah Difavoritkan' : 'Tambah ke Favorit'}
                            </button>`
                        }
                    </div>
                </div>
            `;
        }

        function renderAllVerses(filteredVerses = verses) {
            const grid = document.getElementById('all-verses-grid');
            grid.innerHTML = filteredVerses.map(verse => renderVerseCard(verse)).join('');
            document.getElementById('total-verses').textContent = filteredVerses.length;
        }

        function renderFavorites() {
            const grid = document.getElementById('favorites-grid');
            
            if (favorites.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <h3>🤍 Belum Ada Ayat Favorit</h3>
                        <p>Klik tombol hati pada ayat yang Anda sukai untuk menambahkannya ke koleksi favorit</p>
                    </div>
                `;
            } else {
                grid.innerHTML = favorites.map(verse => renderVerseCard(verse, true)).join('');
            }
        }

        function updateFavoritesCount() {
            document.getElementById('favorites-count').textContent = favorites.length;
        }

        function filterVerses() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const filtered = verses.filter(verse => 
                verse.text.toLowerCase().includes(searchTerm) || 
                verse.reference.toLowerCase().includes(searchTerm)
            );
            renderAllVerses(filtered);
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: linear-gradient(45deg, #30e8bf, #ff8235);
                color: white;
                padding: 15px 25px;
                border-radius: 15px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.2);
                z-index: 1000;
                font-weight: 600;
                transform: translateX(400px);
                transition: transform 0.3s ease;
                backdrop-filter: blur(10px);
            `;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            setTimeout(() => {
                notification.style.transform = 'translateX(400px)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Initialize the app
        document.addEventListener('DOMContentLoaded', function() {
            renderAllVerses();
            updateFavoritesCount();
            document.getElementById('total-verses').textContent = verses.length;
        });
    </script>
</body>
</html>
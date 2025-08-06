<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Anak</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
             background: linear-gradient(135deg, #537D5D 0%, #D2D0A0 100%);
            min-height: 100vh;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .header-section {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }
        
        h1 {
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 600;
            margin: 0 0 0.5rem 0;
            text-align: center;
        }
        
        .subtitle {
            text-align: center;
            color: #6c757d;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }
        
        .add-button-container {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }
        
        a.button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background-color:   #537D5D;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2);
        }
        
        a.button:hover {
            background-color:  #537D5D ;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(7, 108, 30, 0.61);
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: transparent;
        }
        
        th, td {
            padding: 16px 20px;
            text-align: left;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
        }
        
        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        tr {
            transition: background-color 0.2s ease;
        }
        
        tr:hover {
            background-color: #f8f9fa;
        }
        
        .empty-row {
            text-align: center;
            font-style: italic;
            color: #6c757d;
            padding: 3rem;
            font-size: 1.1rem;
        }
        
        .empty-row::before {
            content: "📝";
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
        }
        
        /* Action buttons dengan desain modern */
        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .action-buttons a.btn-edit,
        .action-buttons button.btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            color: white;
            min-width: 70px;
            height: 32px;
        }
        
        .action-buttons a.btn-edit {
            background-color: #007bff;
        }
        
        .action-buttons a.btn-edit:hover {
            background-color: #0056b3;
            transform: translateY(-1px);
        }
        
        .action-buttons button.btn-delete {
            background-color: #dc3545;
        }
        
        .action-buttons button.btn-delete:hover {
            background-color: #c82333;
            transform: translateY(-1px);
        }
        
        /* Animasi untuk loading state */
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
        
        .table-container {
            animation: fadeInUp 0.6s ease;
        }
        
        .header-section {
            animation: fadeInUp 0.4s ease;
        }
        
        /* Responsive design yang lebih baik */
        @media (max-width: 768px) {
            body {
                padding: 1rem 0;
            }
            
            .container {
                padding: 0 1rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .header-section {
                padding: 1.5rem;
                border-radius: 15px;
            }
            
            .table-container {
                border-radius: 15px;
            }
            
            table, thead, tbody, th, td, tr {
                display: block;
            }
            
            thead tr {
                display: none;
            }
            
            tr {
                margin-bottom: 1.5rem;
                border-radius: 15px;
                padding: 1rem;
                background: rgba(255, 255, 255, 0.9);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                border: 1px solid rgba(0, 0, 0, 0.05);
            }
            
            tr:hover {
                transform: none;
            }
            
            td {
                border: none;
                padding: 0.8rem 0;
                position: relative;
                text-align: right;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            td::before {
                content: attr(data-label) ":";
                font-weight: 700;
                color: #2c3e50;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                font-size: 0.9rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 8px;
                width: 100%;
            }
            
            .action-buttons a.btn-edit,
            .action-buttons button.btn-delete {
                width: 100%;
                justify-content: center;
            }
            
            .empty-row {
                padding: 2rem 1rem;
            }
        }
        
        /* Hover effects untuk mobile */
        @media (hover: none) and (pointer: coarse) {
            tr:hover {
                background: transparent;
                transform: none;
            }
            
            .header-section {
                border-radius: 10px;
                padding: 1.5rem;
            }
            
            .table-container {
                border-radius: 10px;
            }
            
            .action-buttons a.btn-edit:hover,
            .action-buttons button.btn-delete:hover,
            a.button:hover {
                transform: none;
            }
        }
        
        /* Search Section Styles */
        .search-section {
            margin-bottom: 2rem;
        }
        
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        .search-input-wrapper {
            position: relative;
            width: 100%;
            max-width: 500px;
        }
        
        .search-input-wrapper input {
            width: 100%;
            padding: 12px 45px 12px 45px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 0.95rem;
            background: white;
            transition: all 0.2s ease;
            color: #495057;
        }
        
        .search-input-wrapper input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }
        
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1rem;
        }
        
        .clear-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .clear-btn:hover {
            background: #c82333;
            transform: translateY(-50%) scale(1.1);
        }
        
        .clear-btn.show {
            display: flex;
        }
        
        .search-results-info {
            text-align: center;
            color: #6c757d;
            font-size: 0.95rem;
            min-height: 20px;
        }
        
        .search-results-info.highlight {
            color: #007bff;
            font-weight: 500;
        }
        
        /* Highlight search results */
        .highlight-text {
            background-color: #fff3cd;
            padding: 2px 4px;
            border-radius: 3px;
            font-weight: 500;
        }
        
        /* Hidden rows animation */
        .table-row-hidden {
            display: none !important;
        }
        
        .table-row-visible {
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* No results message */
        .no-results {
            text-align: center;
            padding: 3rem 2rem;
            color: #6c757d;
            font-size: 1.1rem;
        }
        
        .no-results::before {
            content: "🔍";
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
        }

        /* Animasi yang lebih halus */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .table-container {
            animation: fadeInUp 0.3s ease;
        }
        
        .header-section {
            animation: fadeInUp 0.2s ease;
        }
    </style>
</head>
<body>

    {{-- Include navbar --}}
    @include('mentor.navbar')


    <div class="container">
        <div class="header-section">
            <h1>Data Anak</h1>
            <p class="subtitle">Kelola data anak-anak</p>
            
            <!-- Search Section -->
            <div class="search-section">
                <div class="search-container">
                    <div class="search-input-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchInput" placeholder="Cari berdasarkan nama atau nomor induk..." />
                        <button id="clearSearch" class="clear-btn" title="Hapus pencarian">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="search-results-info">
                    <span id="searchResults"></span>
                </div>
            </div>
            
            <div class="add-button-container">
                <a href="{{ route('mentor.data_anak.create') }}" class="button">
                    <i class="fas fa-plus"></i> Tambah Anak
                </a>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Induk</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anakList as $index => $anak)
                    <tr class="data-row">
                        <td data-label="No">{{ $index + 1 }}</td>
                        <td data-label="Nomor Induk" class="nomor-induk">{{ $anak->nomor_induk }}</td>
                        <td data-label="Nama" class="nama-anak">{{ $anak->nama }}</td>
                        <td data-label="Aksi" class="action-buttons">
                            <a href="{{ route('mentor.data_anak.edit', $anak->id) }}" class="btn-edit" title="Edit Anak">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            
                            <form action="{{ route('mentor.data_anak.destroy', $anak->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" title="Hapus Anak" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="empty-state">
                        <td colspan="4" class="empty-row">Belum ada data anak yang tersedia</td>
                    </tr>
                    @endforelse
                    
                    <!-- No search results message (hidden by default) -->
                    <tr id="noResults" class="no-results-row" style="display: none;">
                        <td colspan="4" class="no-results">
                            Tidak ada data yang cocok dengan pencarian Anda
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearBtn = document.getElementById('clearSearch');
            const searchResults = document.getElementById('searchResults');
            const dataRows = document.querySelectorAll('.data-row');
            const emptyState = document.querySelector('.empty-state');
            const noResults = document.getElementById('noResults');
            
            let totalRows = dataRows.length;
            
            // Update search results info
            function updateSearchInfo(visibleCount, searchTerm = '') {
                if (searchTerm) {
                    searchResults.textContent = `Menampilkan ${visibleCount} dari ${totalRows} data`;
                    searchResults.classList.add('highlight');
                } else {
                    searchResults.textContent = totalRows > 0 ? `Total ${totalRows} data anak` : '';
                    searchResults.classList.remove('highlight');
                }
            }
            
            // Highlight matching text
            function highlightText(element, searchTerm) {
                const originalText = element.textContent;
                const regex = new RegExp(`(${searchTerm})`, 'gi');
                
                if (searchTerm && originalText.toLowerCase().includes(searchTerm.toLowerCase())) {
                    element.innerHTML = originalText.replace(regex, '<span class="highlight-text">$1</span>');
                } else {
                    element.textContent = originalText;
                }
            }
            
            // Remove highlights
            function removeHighlights() {
                dataRows.forEach(row => {
                    const namaCell = row.querySelector('.nama-anak');
                    const nomorIndukCell = row.querySelector('.nomor-induk');
                    
                    if (namaCell) namaCell.textContent = namaCell.textContent;
                    if (nomorIndukCell) nomorIndukCell.textContent = nomorIndukCell.textContent;
                });
            }
            
            // Search function
            function performSearch(searchTerm) {
                const term = searchTerm.toLowerCase().trim();
                let visibleCount = 0;
                
                if (!term) {
                    // Show all rows
                    dataRows.forEach(row => {
                        row.style.display = '';
                        row.classList.remove('table-row-hidden');
                        row.classList.add('table-row-visible');
                    });
                    
                    // Hide no results message
                    if (noResults) noResults.style.display = 'none';
                    
                    // Show empty state if no data
                    if (emptyState && totalRows === 0) {
                        emptyState.style.display = '';
                    }
                    
                    removeHighlights();
                    visibleCount = totalRows;
                } else {
                    // Hide empty state during search
                    if (emptyState) emptyState.style.display = 'none';
                    
                    dataRows.forEach(row => {
                        const namaCell = row.querySelector('.nama-anak');
                        const nomorIndukCell = row.querySelector('.nomor-induk');
                        
                        const nama = namaCell ? namaCell.textContent.toLowerCase() : '';
                        const nomorInduk = nomorIndukCell ? nomorIndukCell.textContent.toLowerCase() : '';
                        
                        const isMatch = nama.includes(term) || nomorInduk.includes(term);
                        
                        if (isMatch) {
                            row.style.display = '';
                            row.classList.remove('table-row-hidden');
                            row.classList.add('table-row-visible');
                            
                            // Highlight matching text
                            if (namaCell) highlightText(namaCell, term);
                            if (nomorIndukCell) highlightText(nomorIndukCell, term);
                            
                            visibleCount++;
                        } else {
                            row.style.display = 'none';
                            row.classList.add('table-row-hidden');
                            row.classList.remove('table-row-visible');
                        }
                    });
                    
                    // Show/hide no results message
                    if (noResults) {
                        noResults.style.display = visibleCount === 0 ? '' : 'none';
                    }
                }
                
                updateSearchInfo(visibleCount, term);
                
                // Show/hide clear button
                if (term) {
                    clearBtn.classList.add('show');
                } else {
                    clearBtn.classList.remove('show');
                }
            }
            
            // Search input event
            searchInput.addEventListener('input', function() {
                performSearch(this.value);
            });
            
            // Clear search button
            clearBtn.addEventListener('click', function() {
                searchInput.value = '';
                performSearch('');
                searchInput.focus();
            });
            
            // Clear search on Escape key
            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    this.value = '';
                    performSearch('');
                }
            });
            
            // Initialize search info
            updateSearchInfo(totalRows);
            
            // Focus on search input with Ctrl+F or Cmd+F
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                    e.preventDefault();
                    searchInput.focus();
                }
            });
        });
    </script>

</body>
</html>
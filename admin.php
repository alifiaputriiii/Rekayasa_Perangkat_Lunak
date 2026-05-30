<!DOCTYPE html>
<html lang="id">
<head>
    <title>D-Care Admin - Dashboard</title>
    <?php include 'components/head.php'; ?>
</head>
<body id="app-body" class="bg-view-green transition-colors duration-1000 min-h-screen flex flex-col text-slate-800">
    
    <?php include 'components/navbar_user.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col w-full relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

        <?php 
            // Memanggil semua view section
            include 'views_admin/home.php'; 
            include 'views_admin/artikel.php'; 
            include 'views_admin/pengguna.php'; 
        ?>

    </main>

    <?php include 'components/footer.php'; ?>

    <?php include 'components/modal_artikel.php'; ?>
    
    <!-- Kotak Pesan Kustom (Pengganti Alert - Sesuai Tema User) -->
    <div id="custom-message-box" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/40 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-2xl max-w-sm w-11/12 transform scale-95 transition-transform duration-300 flex flex-col items-center text-center border-b-4 border-blue-600">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-4 shadow-inner">
                <i class="fa-solid fa-check text-4xl text-green-500"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Berhasil!</h3>
            <p class="text-gray-600 mb-8 font-medium leading-relaxed" id="custom-message-text">Aksi berhasil dilakukan.</p>
            <button onclick="closeMessageBox()" class="bg-blue-600 text-white px-10 py-3 rounded-full font-bold hover:bg-blue-700 transition-all active:scale-95 shadow-md w-full">Tutup</button>
        </div>
    </div>

    <script>
        // Custom Message Box Logic (Konsisten dengan sisi User)
        function showMessageBox(message) {
            const modal = document.getElementById('custom-message-box');
            const textEl = document.getElementById('custom-message-text');
            textEl.innerText = message;
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }

        function closeMessageBox() {
            const modal = document.getElementById('custom-message-box');
            modal.classList.add('opacity-0');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Logika Navigasi Admin
        function navigateAdmin(viewId) {
            // Sembunyikan semua section
            document.querySelectorAll('.admin-section').forEach(el => {
                el.classList.add('hidden');
            });
            
            // Reset style Navbar tombol (Garis bawah animasi)
            document.querySelectorAll('nav button').forEach(btn => {
                if(btn.id && btn.id.startsWith('nav-')) {
                    btn.classList.remove('text-blue-600');
                    const spanLine = btn.querySelector('span:last-child');
                    if(spanLine) {
                        spanLine.className = 'absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full';
                    }
                }
            });

            // Tampilkan section yang dipilih
            const target = document.getElementById('view-' + viewId);
            if (target) {
                target.classList.remove('hidden');
            }

            // Aktifkan style tombol navbar yang dipilih
            const activeBtn = document.getElementById('nav-' + viewId);
            if (activeBtn) {
                activeBtn.classList.add('text-blue-600');
                const spanLine = activeBtn.querySelector('span:last-child');
                if(spanLine) {
                    spanLine.className = 'absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transition-all';
                }
            }

            // Update Background color based on view (Konsisten dengan sisi User)
            const body = document.getElementById('app-body');
            
            // Halaman dengan background Hijau Gradien
            if (viewId === 'home' || viewId === 'pengguna') {
                body.className = 'bg-view-green transition-colors duration-1000 min-h-screen flex flex-col text-slate-800';
            } 
            // Halaman dengan background Ungu Gradien
            else if (viewId === 'artikel') {
                body.className = 'bg-view-purple transition-colors duration-1000 min-h-screen flex flex-col text-slate-800';
            }

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Logika Modal Form Artikel
        function openModalArtikel() {
            const modal = document.getElementById('modal-artikel');
            const backdrop = document.getElementById('modal-backdrop');
            const content = document.getElementById('modal-content');
            
            modal.classList.remove('hidden');
            
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                content.classList.remove('opacity-0', 'scale-95');
                content.classList.add('opacity-100', 'scale-100');
            }, 10);
        }

        function closeModalArtikel() {
            const modal = document.getElementById('modal-artikel');
            const backdrop = document.getElementById('modal-backdrop');
            const content = document.getElementById('modal-content');
            
            backdrop.classList.add('opacity-0');
            content.classList.remove('opacity-100', 'scale-100');
            content.classList.add('opacity-0', 'scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); 
        }

        // Submit Form Artikel 
        function submitArtikel(event) {
            event.preventDefault(); 
            closeModalArtikel();
            showMessageBox("Artikel edukasi berhasil ditambahkan ke database.");
        }

        // Log Out 
        function logoutAdmin() {
            // Karena tidak boleh pakai alert/confirm native, kita bisa modifikasi sedikit message box atau langsung kembali ke login
            // Untuk simulasi ini, kita tampilkan message box sukses dan redirect fiktif
            showMessageBox("Sesi Admin telah diakhiri. Mengarahkan ke halaman login...");
            // window.location.href = 'index.html'; // Contoh redirect
        }
    </script>
</body>
</html>
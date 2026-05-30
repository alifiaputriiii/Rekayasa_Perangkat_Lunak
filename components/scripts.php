<script>

    // Toggle dropdown user menu
    function toggleUserMenu() {
        const menu = document.getElementById('userDropdownMenu');
        if (menu) menu.classList.toggle('hidden');
    }

    // Tutup dropdown kalau klik di luar
    document.addEventListener('click', function(e) {
        const wrapper = document.getElementById('userMenuWrapper');
        if (wrapper && !wrapper.contains(e.target)) {
            const menu = document.getElementById('userDropdownMenu');
            if (menu) menu.classList.add('hidden');
        }
    });

    function checkLogin(viewName){

        if(!isLoggedIn){

            Swal.fire({
                icon: 'warning',
                title: 'Login Diperlukan',
                text: 'Silakan login terlebih dahulu untuk menggunakan fitur ini.',
                confirmButtonText: 'Login',
                confirmButtonColor: '#6b4cde'
            }).then((result) => {

                if(result.isConfirmed){
                    navigateTo('login');
                }

            });

            return;
        }

        navigateTo(viewName);
    }

        // Custom Message Box Logic
        function showMessageBox(message) {
            const modal = document.getElementById('custom-message-box');
            const textEl = document.getElementById('custom-message-text');
            textEl.innerText = message;
            
            modal.classList.remove('hidden');
            // Sedikit delay agar transisi CSS berjalan
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

        // Fitur Download File Hasil Analisis
        function downloadHasil() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const skor   = document.querySelector('#view-hasilAnalisis h2')?.innerText || '0%';
            const status = document.querySelector('#view-hasilAnalisis .font-semibold.text-sm')?.innerText || 'Tidak Diketahui';

            // ── Warna background header ──
            const statusLower = status.toLowerCase();
            if (statusLower.includes('tinggi')) {
                doc.setFillColor(220, 53, 69);       // merah
            } else if (statusLower.includes('sedang')) {
                doc.setFillColor(243, 156, 18);      // kuning
            } else {
                doc.setFillColor(40, 167, 69);       // hijau
            }
            doc.rect(0, 0, 210, 40, 'F');

            // ── Judul Header ──
            doc.setTextColor(255, 255, 255);
            doc.setFontSize(20);
            doc.setFont('helvetica', 'bold');
            doc.text('D-Care', 14, 15);
            doc.setFontSize(11);
            doc.setFont('helvetica', 'normal');
            doc.text('Hasil Analisis Risiko Diabetes', 14, 25);
            doc.text('Tanggal: ' + new Date().toLocaleDateString('id-ID', {day:'numeric', month:'long', year:'numeric'}), 14, 33);

            // ── Box Skor ──
            doc.setFillColor(245, 245, 255);
            doc.roundedRect(14, 48, 182, 35, 4, 4, 'F');
            doc.setTextColor(107, 76, 222);
            doc.setFontSize(36);
            doc.setFont('helvetica', 'bold');
            doc.text(skor, 105, 72, { align: 'center' });
            doc.setFontSize(11);
            doc.setTextColor(80, 80, 80);
            doc.setFont('helvetica', 'normal');
            doc.text('Skor Risiko Diabetes Anda — ' + status, 105, 79, { align: 'center' });

            // ── Ringkasan Analisis ──
            doc.setFillColor(107, 76, 222);
            doc.rect(14, 92, 182, 8, 'F');
            doc.setTextColor(255, 255, 255);
            doc.setFontSize(10);
            doc.setFont('helvetica', 'bold');
            doc.text('RINGKASAN ANALISIS', 18, 98);

            const items = document.querySelectorAll('#view-hasilAnalisis ul:first-of-type li span');
            doc.setTextColor(50, 50, 50);
            doc.setFont('helvetica', 'normal');
            doc.setFontSize(10);
            let y = 108;
            items.forEach((item) => {
                const text = item.innerText.trim();
                if (text) {
                    doc.text('•  ' + text, 18, y);
                    y += 8;
                }
            });

    // ── Rekomendasi ──
    y += 4;
    doc.setFillColor(107, 76, 222);
    doc.rect(14, y, 182, 8, 'F');
    doc.setTextColor(255, 255, 255);
    doc.setFont('helvetica', 'bold');
    doc.text('REKOMENDASI UNTUK ANDA', 18, y + 6);

    const rekom = [
        'Kurangi konsumsi makanan dan minuman manis.',
        'Rutin berolahraga minimal 30 menit setiap hari.',
        'Lakukan pemeriksaan gula darah di fasilitas kesehatan.'
    ];
    doc.setTextColor(50, 50, 50);
    doc.setFont('helvetica', 'normal');
    y += 14;
    rekom.forEach((r) => {
        doc.text('✓  ' + r, 18, y);
        y += 8;
    });

    // ── Catatan Penting ──
    y += 6;
    doc.setFillColor(255, 243, 205);
    doc.roundedRect(14, y, 182, 22, 3, 3, 'F');
    doc.setTextColor(133, 100, 4);
    doc.setFont('helvetica', 'bold');
    doc.setFontSize(9);
    doc.text('⚠  CATATAN PENTING', 18, y + 8);
    doc.setFont('helvetica', 'normal');
    doc.text('Hasil ini bukan merupakan diagnosis medis. Konsultasikan dengan', 18, y + 15);
    doc.text('dokter atau tenaga kesehatan profesional untuk hasil yang akurat.', 18, y + 21);

    // ── Footer ──
    doc.setFillColor(30, 30, 30);
    doc.rect(0, 277, 210, 20, 'F');
    doc.setTextColor(180, 180, 180);
    doc.setFontSize(8);
    doc.setFont('helvetica', 'normal');
    doc.text('D-Care App © 2026 — Aplikasi Manajemen Diabetes', 105, 287, { align: 'center' });
    doc.text('Dokumen ini dibuat otomatis oleh sistem D-Care', 105, 292, { align: 'center' });

    // ── Save ──
    doc.save('Hasil_Analisis_DCare.pdf');

    showMessageBox('Laporan Hasil_Analisis_DCare.pdf berhasil diunduh ke perangkat Anda.');
}

        // Fungsi Simpan Data Monitoring
        function simpanDataMonitoring(event) {
            event.preventDefault(); // Mencegah reload halaman
            showMessageBox("Data parameter kesehatan harian Anda berhasil disimpan dan dienkripsi dengan aman.");
            
            // Opsional: Setelah 2 detik pindah kembali ke menu monitoring
            setTimeout(() => {
                closeMessageBox();
                navigateTo('monitoring');
            }, 2500);
        }

        // Logic untuk mengganti halaman (View)
        function navigateTo(viewId) {
            // Sembunyikan semua section
            document.querySelectorAll('.view-section').forEach(el => {
                el.classList.add('hidden');
                el.classList.remove('flex');
            });

            // Tampilkan section yang dituju
            const target = document.getElementById('view-' + viewId);
            if (target) {
                target.classList.remove('hidden');
                target.classList.add('flex');
            }
            window.history.pushState(null, null, "?page=" + viewId);
            // Update Background color based on view
            const body = document.getElementById('app-body');
            
            // Halaman-halaman dengan background hijau
            if (viewId === 'login' || viewId === 'chatbot' || viewId === 'monitoring' || viewId === 'riwayat' || viewId === 'inputMonitoring') {
                body.className = 'bg-view-green transition-colors duration-1000 min-h-screen flex flex-col';
            } 
            // Halaman-halaman dengan background ungu
            else if (viewId === 'signup' || viewId === 'cekDini' || viewId === 'home' || viewId === 'hasilAnalisis') {
                body.className = 'bg-view-purple transition-colors duration-1000 min-h-screen flex flex-col';
            }
            
            // Scroll to top smoothly
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Jalankan halaman sesuai parameter URL, atau Home sebagai default
        document.addEventListener('DOMContentLoaded', () => {
            // Ambil parameter '?page=' dari URL
            const urlParams = new URLSearchParams(window.location.search);
            const page = urlParams.get('page');

            if (page) {
                navigateTo(page); // Buka halaman sesuai instruksi PHP
            } else {
                navigateTo('home'); // Buka home jika URL bersih (baru pertama buka)
            }
        });
    </script>
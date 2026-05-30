<!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Custom Styles & Animations */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* Background Colors untuk Transisi Halaman */
        .bg-view-green { background: linear-gradient(180deg, #f8fafc 0%, #d1fae5 100%); }
        .bg-view-purple { background: linear-gradient(180deg, #f8fafc 0%, #e0e7ff 100%); }
        
        /* Pattern Progress Bar */
        .pattern-dots {
            background-image: radial-gradient(black 1px, transparent 1px);
            background-size: 4px 4px;
        }

        /* Animasi Transisi Halus */
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }
        
        .animate-slide-up {
            animation: slideUp 0.5s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; filter: blur(4px); }
            to { opacity: 1; filter: blur(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Hover efek pada input */
        input:focus, select:focus, textarea:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>
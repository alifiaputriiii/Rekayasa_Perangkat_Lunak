<section id="view-home" class="view-section hidden flex-col items-center flex-1 w-full animate-fade-in">

    <div class="w-full text-left mb-6 px-8 pt-6">
        <h1 class="text-3xl font-bold text-gray-900">Edukasi dan Pantangan Diabetes</h1>
    </div>

    <!-- Edukasi Diabetes Box -->
    <div class="bg-[#9c99c7] p-2 w-full shadow-lg mb-8 hover:shadow-xl transition-shadow duration-300">
        <div class="bg-white p-6 md:p-10 flex flex-col md:flex-row gap-8 items-center border border-gray-100">
            <div class="flex-shrink-0">
                <h2 class="text-2xl text-gray-800 font-light mb-6">Edukasi Diabetes</h2>
                <div class="w-48 h-48 bg-teal-50 rounded-2xl flex items-center justify-center relative overflow-hidden border-2 border-teal-100">
                    <img src="assets/images/edu.png">
                </div>
            </div>

            <div class="text-gray-800 flex-1 space-y-4">
                <p class="font-medium text-sm md:text-base mb-6 leading-relaxed">
                    Diabetes adalah kondisi ketika kadar gula dalam darah terlalu tinggi karena tubuh tidak dapat menggunakan insulin dengan baik.
                </p>
                <ul class="space-y-3 text-sm md:text-base">
                    <li class="flex items-start"><span class="text-blue-500 mr-2">&rarr;</span> <span>Diabetes tipe 1: Tubuh tidak memproduksi insulin</span></li>
                    <li class="flex items-start"><span class="text-blue-500 mr-2">&rarr;</span> <span>Diabetes tipe 2: Tubuh tidak menggunakan insulin dengan efektif</span></li>
                    <li class="flex items-start"><span class="text-blue-500 mr-2">&rarr;</span> <span>Gejala umum: sering haus, sering buang air kecil, mudah lelah, luka sulit sembuh</span></li>
                    <li class="flex items-start"><span class="text-blue-500 mr-2">&rarr;</span> <span>Komplikasi: penyakit jantung, kerusakan ginjal, gangguan penglihatan, dan lainnya</span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Pantangan Diabetes Box -->
    <div class="bg-[#9c99c7] p-2 w-full shadow-lg hover:shadow-xl transition-shadow duration-300 animate-slide-up" style="animation-delay: 0.1s;">
        <div class="bg-white p-6 md:p-10 border border-gray-100">
            <h2 class="text-2xl text-gray-800 font-light mb-8">Pantangan Diabetes</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kartu Makanan Manis -->
                <div class="bg-[#f3cce3] rounded-3xl p-6 text-center shadow-sm hover:shadow-md hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-full h-32 bg-white rounded-xl mb-4 overflow-hidden relative">
                        <div class="absolute inset-0 bg-orange-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <img src="assets/images/manis.png">
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Makanan Manis</h3>
                    <p class="text-xs text-gray-800 px-2 leading-relaxed">Hindari kue, permen, minuman manis dan makanan tinggi gula</p>
                </div>

                <!-- Kartu Makanan Berlemak -->
                <div class="bg-[#f3cce3] rounded-3xl p-6 text-center shadow-sm hover:shadow-md hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-full h-32 bg-white rounded-xl mb-4 overflow-hidden relative">
                        <div class="absolute inset-0 bg-yellow-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <img src="assets/images/lemak.png">
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Makanan Berlemak</h3>
                    <p class="text-xs text-gray-800 px-2 leading-relaxed">Hindari makanan gorengan, santan kental, dan lemak jenuh</p>
                </div>

                <!-- Kartu Terlalu Asin -->
                <div class="bg-[#f3cce3] rounded-3xl p-6 text-center shadow-sm hover:shadow-md hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-full h-32 bg-white rounded-xl mb-4 overflow-hidden relative">
                        <div class="absolute inset-0 bg-gray-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <img src="assets/images/asin.png">
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Terlalu Asin</h3>
                    <p class="text-xs text-gray-800 px-2 leading-relaxed">Kurangi makanan yang asin seperti keripik, makanan olahan, dan kalengan</p>
                </div>
            </div>
        </div>
    </div>

</section>
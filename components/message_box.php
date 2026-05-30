<div id="custom-message-box" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/40 backdrop-blur-sm opacity-0 transition-opacity duration-300">
            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-2xl max-w-sm w-11/12 transform scale-95 transition-transform duration-300 flex flex-col items-center text-center border-b-4 border-blue-600">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-4 shadow-inner">
                    <i class="fa-solid fa-check text-4xl text-green-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Berhasil!</h3>
                <p class="text-gray-600 mb-8 font-medium leading-relaxed" id="custom-message-text">File berhasil diproses.</p>
                <button onclick="closeMessageBox()" class="bg-blue-600 text-white px-10 py-3 rounded-full font-bold hover:bg-blue-700 transition-all active:scale-95 shadow-md w-full">Tutup</button>
            </div>
        </div>
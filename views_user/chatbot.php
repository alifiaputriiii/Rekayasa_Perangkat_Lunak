<section id="view-chatbot" class="view-section hidden flex-col items-center flex-1 w-full py-6 animate-fade-in">
    <div class="bg-[#a5dbb7] rounded-[2rem] w-full shadow-2xl border-b-4 border-r-4 border-[#8ebf9e] overflow-hidden flex flex-col transition-shadow hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)]">
        
        <!-- Header -->
        <div class="bg-[#8ebf9e] py-5 px-8 border-b border-[#7bab8a] flex items-center justify-center shadow-sm">
            <h1 class="text-2xl font-bold text-gray-800 tracking-wide flex items-center gap-2">
                <i class="fa-solid fa-robot text-gray-700"></i> Chat Bot
            </h1>
        </div>

        <!-- Chat Messages Area -->
        <div id="chat-messages" class="flex-1 p-6 md:p-8 space-y-6 min-h-[400px] max-h-[500px] overflow-y-auto bg-white/30 backdrop-blur-sm scroll-smooth">
            
            <!-- Pesan awal bot -->
            <div class="flex items-start gap-4 animate-slide-up">
                <div class="w-12 h-12 rounded-full bg-[#bc705b] border-2 border-white shadow-md flex items-center justify-center flex-shrink-0 mt-1">
                    <i class="fa-solid fa-user-nurse text-white text-xl"></i>
                </div>
                <div class="bg-white px-6 py-4 rounded-2xl rounded-tl-none shadow-md max-w-[85%] relative">
                    <div class="absolute w-4 h-4 bg-white -left-2 top-0 transform rotate-45"></div>
                    <p class="text-gray-800 leading-relaxed font-medium">
                        Halo! Saya chatbot kesehatan <span class="inline-block animate-bounce">👋</span><br/>
                        Saya bisa membantu informasi seputar diabetes melitus.<br/>
                        Mau tanya apa hari ini?
                    </p>
                </div>
            </div>
        </div>

        <!-- Chat Input -->
        <div class="bg-white p-4 flex items-center gap-4 border-t border-[#8ebf9e]/50">
            <input type="text" id="chat-input" placeholder="Ketik pesan Anda..." 
                class="flex-1 bg-gray-100 rounded-full px-5 py-3 outline-none focus:ring-2 focus:ring-[#8ebf9e] transition-all"
                onkeydown="if(event.key==='Enter') kirimPesan()" />
            <button onclick="kirimPesan()" id="btn-kirim"
                class="bg-[#bc705b] text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-[#a6624e] hover:shadow-md active:scale-90 transition-all">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </div>
    </div>
</section>

<script>
function kirimPesan() {
    const input = document.getElementById('chat-input');
    const pesan = input.value.trim();
    if (!pesan) return;

    const chatBox = document.getElementById('chat-messages');
    const btnKirim = document.getElementById('btn-kirim');

    // Tampilkan pesan user
    chatBox.innerHTML += `
        <div class="flex items-start gap-4 justify-end animate-slide-up">
            <div class="bg-blue-500 px-6 py-4 rounded-2xl rounded-tr-none shadow-md max-w-[85%] relative text-white">
                <div class="absolute w-4 h-4 bg-blue-500 -right-2 top-0 transform rotate-45"></div>
                <p class="leading-relaxed font-medium">${escapeHtml(pesan)}</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-blue-800 border-2 border-white shadow-md flex items-center justify-center flex-shrink-0 mt-1">
                <i class="fa-solid fa-user text-white text-xl"></i>
            </div>
        </div>`;

    // Tampilkan indikator loading
    const loadingId = 'loading-' + Date.now();
    chatBox.innerHTML += `
        <div id="${loadingId}" class="flex items-start gap-4 animate-slide-up">
            <div class="w-12 h-12 rounded-full bg-[#bc705b] border-2 border-white shadow-md flex items-center justify-center flex-shrink-0 mt-1">
                <i class="fa-solid fa-user-nurse text-white text-xl"></i>
            </div>
            <div class="bg-white px-6 py-4 rounded-2xl rounded-tl-none shadow-md relative">
                <div class="absolute w-4 h-4 bg-white -left-2 top-0 transform rotate-45"></div>
                <div class="flex gap-1 items-center h-6">
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0s"></span>
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0.2s"></span>
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0.4s"></span>
                </div>
            </div>
        </div>`;

    input.value = '';
    btnKirim.disabled = true;
    chatBox.scrollTop = chatBox.scrollHeight;

    // Kirim ke backend
    fetch('proses/proses_chatbot.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ pesan: pesan })
    })
    .then(r => r.json())
    .then(data => {
        document.getElementById(loadingId)?.remove();

        const reply = data.reply || 'Maaf, saya tidak bisa menjawab saat ini.';
        // Format teks: newline jadi <br>, *teks* jadi bold
        const formatted = escapeHtml(reply)
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\*(.*?)\*/g, '<strong>$1</strong>')
            .replace(/\n/g, '<br>');

        chatBox.innerHTML += `
            <div class="flex items-start gap-4 animate-slide-up">
                <div class="w-12 h-12 rounded-full bg-[#bc705b] border-2 border-white shadow-md flex items-center justify-center flex-shrink-0 mt-1">
                    <i class="fa-solid fa-user-nurse text-white text-xl"></i>
                </div>
                <div class="bg-white px-6 py-4 rounded-2xl rounded-tl-none shadow-md max-w-[85%] relative hover:shadow-lg transition-shadow">
                    <div class="absolute w-4 h-4 bg-white -left-2 top-0 transform rotate-45"></div>
                    <p class="text-gray-800 leading-relaxed font-medium">${formatted}</p>
                </div>
            </div>`;

        chatBox.scrollTop = chatBox.scrollHeight;
    })
    .catch(() => {
        document.getElementById(loadingId)?.remove();
        chatBox.innerHTML += `
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-full bg-[#bc705b] border-2 border-white shadow-md flex items-center justify-center flex-shrink-0 mt-1">
                    <i class="fa-solid fa-user-nurse text-white text-xl"></i>
                </div>
                <div class="bg-red-50 px-6 py-4 rounded-2xl rounded-tl-none shadow-md max-w-[85%]">
                    <p class="text-red-500 font-medium">Maaf, terjadi kesalahan koneksi. Coba lagi.</p>
                </div>
            </div>`;
        chatBox.scrollTop = chatBox.scrollHeight;
    })
    .finally(() => {
        btnKirim.disabled = false;
    });
}

function escapeHtml(text) {
    return text
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;');
}
</script>
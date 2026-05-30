<section id="view-login" class="view-section flex flex-col items-center justify-center flex-1 px-4 z-10 animate-fade-in">

    <div class="bg-[#93c4a2] p-8 md:p-12 rounded-[2.5rem] w-full max-w-md shadow-2xl hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] transition-shadow duration-300">

        <!-- Toggle Login Signup -->
        <div class="flex justify-center gap-4 mb-8">
            <button type="button" class="bg-white px-8 py-2 rounded-full font-bold shadow-md transform hover:scale-105 transition-transform text-gray-800">
                LOGIN
            </button>
            <button type="button" onclick="navigateTo('signup')" class="bg-white/40 px-8 py-2 rounded-full font-bold text-gray-700 hover:bg-white/70 hover:shadow-md transition-all">
                SIGNUP
            </button>
        </div>

        <!-- ✅ Notifikasi Error -->
        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation text-red-500 text-lg"></i>
                <span class="text-sm font-medium"><?php echo htmlspecialchars($_GET['error']); ?></span>
            </div>
        <?php endif; ?>

        <!-- ✅ Notifikasi Sukses (misal setelah register) -->
        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                <i class="fa-solid fa-circle-check text-green-500 text-lg"></i>
                <span class="text-sm font-medium"><?php echo htmlspecialchars($_GET['success']); ?></span>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form action="proses/proses_login.php" method="POST">
            <div class="space-y-6">
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Email Address</label>
                    <input
                        type="email"
                        name="email"
                        required
                        placeholder="Input your email address......"
                        class="w-full px-5 py-3.5 rounded-xl border-none outline-none shadow-inner bg-white/90 focus:bg-white transition-all" />
                </div>

                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Password</label>
                    <div class="relative">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Input your password......"
                            class="w-full px-5 py-3.5 rounded-xl border-none outline-none shadow-inner bg-white/90 focus:bg-white transition-all pr-12" />
                        <i
                            class="fa-solid fa-eye-slash absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer hover:text-gray-800 transition-colors"
                            onclick="togglePassword()"></i>
                    </div>
                </div>

                <div class="pt-6 flex justify-center">
                    <button type="submit" class="bg-[#6b4cde] text-white font-bold px-12 py-3 rounded-full hover:bg-purple-700 hover:shadow-lg active:scale-95 transition-all duration-200">
                        Log In
                    </button>
                </div>
            </div>
        </form>

    </div>
</section>

<script>
function togglePassword() {
    const password = document.getElementById('password');
    password.type = password.type === 'password' ? 'text' : 'password';
}
</script>
<section id="view-signup" class="view-section hidden flex-col items-center justify-center flex-1 px-4 py-8 z-10 animate-fade-in">

    <div class="bg-[#9c99c7] p-8 md:p-10 rounded-[2.5rem] w-full max-w-2xl shadow-2xl">

        <!-- Toggle Login Signup -->
        <div class="flex justify-center gap-4 mb-8">

            <button
                onclick="navigateTo('login')"
                class="bg-white/40 px-8 py-2 rounded-full font-bold text-gray-700 hover:bg-white/70 transition-all">

                LOGIN

            </button>

            <button
                class="bg-white px-8 py-2 rounded-full font-bold shadow-md text-gray-800">

                SIGNUP

            </button>

        </div>

        <form action="proses/proses_signup.php" method="POST" class="space-y-5">

            <!-- Nama -->
            <div>
                <label class="block text-gray-900 font-semibold mb-2">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="nama"
                    required
                    placeholder="Masukkan nama lengkap"
                    class="w-full px-4 py-3 rounded-xl border-none outline-none bg-white shadow-inner">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-900 font-semibold mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    required
                    placeholder="Masukkan email"
                    class="w-full px-4 py-3 rounded-xl border-none outline-none bg-white shadow-inner">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-900 font-semibold mb-2">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    placeholder="Masukkan password"
                    class="w-full px-4 py-3 rounded-xl border-none outline-none bg-white shadow-inner">
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="block text-gray-900 font-semibold mb-2">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="confirm_password"
                    required
                    placeholder="Masukkan ulang password"
                    class="w-full px-4 py-3 rounded-xl border-none outline-none bg-white shadow-inner">
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label class="block text-gray-900 font-semibold mb-2">
                    Jenis Kelamin
                </label>

                <select
                    name="jenis_kelamin"
                    required
                    class="w-full px-4 py-3 rounded-xl border-none outline-none bg-white shadow-inner">

                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>

                </select>
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label class="block text-gray-900 font-semibold mb-2">
                    Tanggal Lahir
                </label>

                <input
                    type="date"
                    name="tanggal_lahir"
                    required
                    class="w-full px-4 py-3 rounded-xl border-none outline-none bg-white shadow-inner">
            </div>

            <!-- No HP -->
            <div>
                <label class="block text-gray-900 font-semibold mb-2">
                    Nomor HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    required
                    placeholder="08xxxxxxxxxx"
                    class="w-full px-4 py-3 rounded-xl border-none outline-none bg-white shadow-inner">
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-gray-900 font-semibold mb-2">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    rows="3"
                    required
                    placeholder="Masukkan alamat lengkap"
                    class="w-full px-4 py-3 rounded-xl border-none outline-none bg-white shadow-inner"></textarea>
            </div>

            <!-- Tombol -->
            <div class="pt-4 flex justify-center">

                <button
                    type="submit"
                    class="bg-[#6b4cde] text-white font-bold px-12 py-3 rounded-full hover:bg-purple-700 transition-all">

                    Sign Up

                </button>

            </div>

        </form>

    </div>

</section>
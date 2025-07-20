<div id="urlModal"
    class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[999] flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
    <div
        class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 relative transition-transform duration-300 scale-95">
        <h2 class="text-lg font-semibold mb-4 text-gray-800">Ganti URL Social Media</h2>

        <div class="space-y-3">
            <div>
                <label class="block text-sm text-gray-600 mb-1">Twitter</label>
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent text-sm"
                    placeholder="https://twitter.com/yourprofile" />
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Facebook</label>
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent text-sm"
                    placeholder="https://facebook.com/yourprofile" />
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">YouTube</label>
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent text-sm"
                    placeholder="https://youtube.com/yourchannel" />
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Instagram</label>
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-transparent text-sm"
                    placeholder="https://instagram.com/yourprofile" />
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-2 mt-6">
            <button onclick="closeUrlModal()"
                class="px-4 py-2 font-semibold text-sm bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200">Batal</button>
            <button class="px-4 py-2 font-semibold text-sm bg-violet-600 text-white rounded-lg hover:bg-violet-700">Simpan</button>
        </div>
    </div>
</div>

<script>
    const urlModal = document.getElementById('urlModal');
    const profileModal = document.getElementById('editProfileModal'); // id modal utama kamu

    function openUrlModal() {
        if (profileModal) {
            profileModal.classList.add('hidden');
        }

        urlModal.classList.remove('hidden');
        setTimeout(() => {
            urlModal.classList.remove('opacity-0');
        }, 10);
    }

    function closeUrlModal() {
        urlModal.classList.add('opacity-0');
        setTimeout(() => {
            urlModal.classList.add('hidden');
        }, 200);
    }
</script>
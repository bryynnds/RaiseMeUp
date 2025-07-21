<style>
    /* Custom class utk sembunyiin scrollbar tapi tetap scrollable */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>

<div id="withdrawalModal"
    class="fixed inset-0 bg-gradient-to-br from-black/60 to-gray-900/70 backdrop-blur-sm z-[999] flex items-center justify-center hidden">
    <div
        class="bg-white w-full max-w-md rounded-xl shadow-2xl p-5 relative transform transition-all duration-300 scale-95 opacity-0 modal-content mx-4 max-h-[90vh] overflow-y-auto no-scrollbar">

        <!-- Close Button -->
        <button onclick="toggleWithdrawalModal()"
            class="absolute top-3 right-3 w-7 h-7 flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-50 text-gray-400 hover:text-red-500 transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Header -->
        <div class="text-center mb-5">
            <div
                class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl mx-auto mb-3 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                    </path>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mb-1">Tarik Saldo</h2>
            <p class="text-sm text-gray-500">Tarik saldo Anda dengan mudah dan aman</p>
        </div>

        <!-- Form -->
        <form id="withdrawalForm" class="space-y-4" method="POST" action="{{ route('withdraw.store') }}">
            <!-- Balance Display -->
            @csrf
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-4 border border-indigo-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-600 mb-1">Saldo Tersedia</p>
                        <p class="text-2xl font-bold text-gray-900" id="currentBalance">Rp
                            {{ number_format($creator->total_income ?? 0, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Withdrawal Amount -->
            <div>
                <input type="hidden" name="jumlah_penarikan" id="jumlahFix">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Penarikan</label>
                <div class="relative">
                    <span
                        class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 font-medium text-sm">Rp</span>
                    <input type="text" placeholder="10.000" id="withdrawAmount"
                        class="pl-10 pr-16 py-3 w-full border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all duration-200 text-base font-semibold" />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="setMaxAmount()"
                            class="text-xs bg-indigo-100 text-indigo-600 px-2 py-1 rounded-md hover:bg-indigo-200 transition-colors">
                            Max
                        </button>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-1">Min Rp 10.000 - Max Rp 120.000</p>
            </div>

            <!-- Payment Method -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">Metode Pembayaran</label>
                <div class="grid grid-cols-3 gap-3">
                    <label class="cursor-pointer group">
                        <input type="radio" name="metode_penarikan" value="gopay" class="hidden peer" />
                        <div
                            class="border-2 border-gray-200 rounded-lg p-3 hover:border-indigo-300 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all duration-200 group-hover:shadow-md">
                            <div class="flex flex-col items-center gap-2">
                                <div class="w-8 h-8 bg-white rounded-lg shadow-sm flex items-center justify-center">
                                    <img src="/assets/icon/gopay.png" alt="GoPay" class="w-6 h-6">
                                </div>
                                <span
                                    class="text-xs font-medium text-gray-700 peer-checked:text-indigo-600">GoPay</span>
                            </div>
                        </div>
                    </label>

                    <label class="cursor-pointer group">
                        <input type="radio" name="metode_penarikan" value="dana" class="hidden peer" />
                        <div
                            class="border-2 border-gray-200 rounded-lg p-3 hover:border-indigo-300 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all duration-200 group-hover:shadow-md">
                            <div class="flex flex-col items-center gap-2">
                                <div class="w-8 h-8 bg-white rounded-lg shadow-sm flex items-center justify-center">
                                    <img src="/assets/icon/dana.png" alt="Dana" class="w-6 h-6">
                                </div>
                                <span class="text-xs font-medium text-gray-700 peer-checked:text-indigo-600">Dana</span>
                            </div>
                        </div>
                    </label>

                    <label class="cursor-pointer group">
                        <input type="radio" name="metode_penarikan" value="ovo" class="hidden peer" />
                        <div
                            class="border-2 border-gray-200 rounded-lg p-3 hover:border-indigo-300 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all duration-200 group-hover:shadow-md">
                            <div class="flex flex-col items-center gap-2">
                                <div class="w-8 h-8 bg-white rounded-lg shadow-sm flex items-center justify-center">
                                    <img src="/assets/icon/ovo.png" alt="OVO" class="w-6 h-6">
                                </div>
                                <span class="text-xs font-medium text-gray-700 peer-checked:text-indigo-600">OVO</span>
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Quick Amount Buttons -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Cepat</label>
                <div class="grid grid-cols-3 gap-2">
                    <button type="button" onclick="setAmount(25000)"
                        class="py-2 px-3 border-2 border-gray-200 rounded-lg text-xs font-medium text-gray-700 hover:border-indigo-300 hover:text-indigo-600 transition-all">
                        25K
                    </button>
                    <button type="button" onclick="setAmount(50000)"
                        class="py-2 px-3 border-2 border-gray-200 rounded-lg text-xs font-medium text-gray-700 hover:border-indigo-300 hover:text-indigo-600 transition-all">
                        50K
                    </button>
                    <button type="button" onclick="setAmount(100000)"
                        class="py-2 px-3 border-2 border-gray-200 rounded-lg text-xs font-medium text-gray-700 hover:border-indigo-300 hover:text-indigo-600 transition-all">
                        100K
                    </button>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-3">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white py-3 rounded-lg font-semibold text-base shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-[1.02] flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    Tarik Saldo Sekarang
                </button>
            </div>

            <!-- Security Info -->
            <div class="flex items-center gap-2 text-xs text-gray-500 pt-1">
                <svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                    </path>
                </svg>
                <span>Transaksi dilindungi SSL</span>
            </div>
        </form>

        <!-- Success Modal -->
        <!-- Success Modal (Full Screen Overlay, Pindah ke luar modal-content) -->
        <div id="successModal"
            class="fixed inset-0 bg-white z-[1000] flex flex-col items-center justify-center hidden p-5">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Penarikan Berhasil!</h3>
                <p class="text-gray-600 mb-3 text-sm">Saldo Anda telah berhasil ditarik</p>
                <p class="text-sm text-gray-500 mb-5" id="newBalanceText">
                    Sisa saldo: <span id="newBalance" class="font-semibold text-gray-700"></span>
                </p>
                <button onclick="closeSuccessModal()"
                    class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-2.5 rounded-lg font-medium hover:shadow-lg transition-all">
                    Tutup
                </button>
            </div>
        </div>

    </div>
</div>

<script>
    let currentBalanceAmount = {{ $creator->total_income ?? 0 }}; // Saldo awal
    let maxBalanceAmount = 120000;

    function toggleWithdrawalModal() {
        const modal = document.getElementById('withdrawalModal');
        const modalContent = modal.querySelector('.modal-content');

        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            // Animation in
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        } else {
            // Animation out
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
    }

    function setAmount(amount) {
        const input = document.getElementById('withdrawAmount');
        input.value = formatNumber(amount);
    }

    function setMaxAmount() {
        const input = document.getElementById('withdrawAmount');
        input.value = formatNumber(maxBalanceAmount);
    }

    function formatNumber(num) {
        return num.toLocaleString('id-ID');
    }

    function parseNumber(str) {
        if (!str) return 0;
        return parseInt(str.replace(/\./g, '')) || 0;
    }

    function formatRupiah(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(amount);
    }

    function updateBalanceDisplay() {
        document.getElementById('currentBalance').textContent = formatRupiah(currentBalanceAmount);
    }

    function showSuccessModal(withdrawnAmount) {
        const newBalance = currentBalanceAmount - withdrawnAmount;
        document.getElementById('newBalance').textContent = formatRupiah(newBalance);

        // Tampilkan overlay sukses full screen
        document.getElementById('successModal').classList.remove('hidden');

        // Update saldo
        currentBalanceAmount = newBalance;
        updateBalanceDisplay();
    }


    function closeSuccessModal() {
        document.getElementById('successModal').classList.add('hidden');
        toggleWithdrawalModal();
    }


    // Form submission handler
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('withdrawalForm').addEventListener('submit', function(e) {
            const rawAmount = parseNumber(document.getElementById('withdrawAmount').value);
            document.getElementById('jumlahFix').value = rawAmount;
        });
        updateBalanceDisplay();

        const withdrawalBtn = document.getElementById('withdrawalBtn');
        if (withdrawalBtn) {
            withdrawalBtn.addEventListener('click', toggleWithdrawalModal);
        }

        // Handle form submission
        // document.getElementById('withdrawalForm').addEventListener('submit', function (e) {
        //     e.preventDefault();

        //     const amountStr = document.getElementById('withdrawAmount').value;
        //     const amount = parseNumber(amountStr);
        //     const selectedMethod = document.querySelector('input[name="metode"]:checked');

        //     if (!amount || amount < 10000) {
        //         alert('Jumlah minimal penarikan adalah Rp 10.000');
        //         return;
        //     }

        //     if (amount > currentBalanceAmount) {
        //         alert('Jumlah penarikan melebihi saldo yang tersedia');
        //         return;
        //     }

        //     if (!selectedMethod) {
        //         alert('Silakan pilih metode pembayaran');
        //         return;
        //     }

        //     // Simulasi loading
        //     const submitBtn = document.querySelector('button[type="submit"]');
        //     submitBtn.innerHTML = '<svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg> Memproses...';
        //     submitBtn.disabled = true;

        //     setTimeout(() => {
        //         // Tambahin scrollTop biar modal ke atas
        //         const modalContent = document.querySelector('.modal-content');
        //         if (modalContent) modalContent.scrollTop = 0;

        //         showSuccessModal(amount);

        //         submitBtn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg> Tarik Saldo Sekarang';
        //         submitBtn.disabled = false;

        //         document.getElementById('withdrawalForm').reset();
        //     }, 2000);

        // });

        // Format input amount with better handling
        document.getElementById('withdrawAmount').addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^\d]/g, ''); // Only keep numbers
            if (value) {
                const numValue = parseInt(value);
                e.target.value = formatNumber(numValue);
            }
        });

        // Handle paste events
        document.getElementById('withdrawAmount').addEventListener('paste', function(e) {
            e.preventDefault();
            const paste = (e.clipboardData || window.clipboardData).getData('text');
            const numValue = parseInt(paste.replace(/[^\d]/g, ''));
            if (numValue) {
                e.target.value = formatNumber(numValue);
            }
        });
    });

    // Close modal when clicking outside
    document.getElementById('withdrawalModal').addEventListener('click', function(e) {
        if (e.target === this) {
            toggleWithdrawalModal();
        }
    });
</script>

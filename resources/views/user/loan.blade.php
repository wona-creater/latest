<x-app-layout>


    <!-- Main Content Wrapper -->
    <main class="main-content w-full place-items-center px-[var(--margin-x)] pb-12">
        <div class="py-5 text-center lg:py-6">
            <p class="text-sm uppercase">Crypto-Backed Loans</p>
            <h3 class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100">
                Borrow funds using your crypto as collateral
            </h3>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($loans as $loan)
                <div class="card p-4 text-center sm:p-5 relative bg-white dark:bg-navy-800 shadow-md rounded-lg">
                    <div class="absolute top-0 right-0 p-3">
                        <div class="badge rounded-full bg-info/10 text-info dark:bg-info/15">
                            Recommended
                        </div>
                    </div>
                    <div class="mt-8">
                        <i class="fa fa-plane text-6xl text-primary dark:text-accent-light"></i>
                    </div>
                    <div class="mt-5">
                        <h4 class="text-xl font-semibold text-slate-600 dark:text-navy-100">
                            {{ $loan->loan_type }}
                        </h4>
                    </div>
                    <div class="mt-5">
                        <span
                            class="text-4xl tracking-tight text-primary dark:text-accent-light">${{ number_format($loan->amount, 2) }}</span><br>
                        <b>/{{ $loan->repayment_period }} Months</b>
                    </div>
                    <div class="mt-8 space-y-4 text-left">
                        <div class="flex items-start space-x-3">
                            <div
                                class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="font-medium">Interest Rate <b>{{ $loan->interest_rate }}%</b></span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div
                                class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="font-medium">Monthly Repayment
                                <b>${{ number_format($loan->monthly_repayment, 2) }}</b></span>
                        </div>
                    </div>
                    <div class="mt-8">
                        <form action="{{ route('loan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="loan_id" value="{{ $loan->id }}">
                            <button type="submit"
                                class="btn rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Choose Plan
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 dark:text-navy-300 col-span-full">No loan plans available.</p>
            @endforelse
        </div>
        </div>
    </main>

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

</x-app-layout>

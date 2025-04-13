<x-app-layout>
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Investment Plans
            </h2>


            <div x-data="{ showModal: false }">
                <button @click="showModal = true"
                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    Add New Plan
                </button>
                <template x-teleport="#x-teleport-target">
                    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                        x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                        <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                            @click="showModal = false" x-show="showModal" x-transition:enter="ease-out"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"></div>
                        <div class="relative w-full max-w-2xl origin-bottom rounded-lg bg-white pb-4 transition-all duration-300 dark:bg-navy-700"
                            x-show="showModal" x-transition:enter="easy-out"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95">
                            <div
                                class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                                <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                    Add New Investment Plan
                                </h3>
                                <button @click="showModal = !showModal"
                                    class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <form action="{{ route('admin.investmentplans.store') }}" method="POST"
                                class="px-4 py-4 sm:px-5">
                                @csrf
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <!-- Plan Name -->
                                    <div>
                                        <label for="name"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Plan Name
                                        </label>
                                        <input type="text" name="name" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Plan Name">
                                        @error('name')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Minimum Amount -->
                                    <div>
                                        <label for="min_amount"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Minimum Amount
                                        </label>
                                        <input type="number" name="min_amount" id="min_amount" required step="0.01"
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Minimum Amount">
                                        @error('min_amount')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Maximum Amount -->
                                    <div>
                                        <label for="max_amount"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Maximum Amount
                                        </label>
                                        <input type="number" name="max_amount" id="max_amount" required step="0.01"
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Maximum Amount">
                                        @error('max_amount')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Profit Percentage -->
                                    <div>
                                        <label for="profit_percentage"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Profit Percentage
                                        </label>
                                        <input type="number" name="profit_percentage" id="profit_percentage" required
                                            step="0.01"
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Profit Percentage">
                                        @error('profit_percentage')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Duration -->
                                    <div>
                                        <label for="duration"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Duration (days)
                                        </label>
                                        <input type="number" name="duration" id="duration" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Duration Days">
                                        @error('duration')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-6 text-center">
                                    <button type="submit"
                                        class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Save Plan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </template>
            </div>
        </div>





        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($investmentplans as $investmentplan)
                <div class="card" x-data="{
                    amount: '',
                    minAmount: {{ $investmentplan->min_amount ?? 0 }},
                    maxAmount: {{ $investmentplan->max_amount ?? 0 }},
                    profitPercentage: {{ $investmentplan->profit_percentage ?? 0 }},
                    duration: {{ $investmentplan->duration ?? 0 }},
                    expectedProfit: '',
                    startDate: '',
                    endDate: '',
                    calculateValues() {
                        if (this.amount && this.amount >= this.minAmount && this.amount <= this.maxAmount) {
                            this.expectedProfit = ((this.amount * this.profitPercentage) / 100).toFixed(2);
                            const today = new Date();
                            this.startDate = today.toISOString().split('T')[0];
                            const end = new Date(today);
                            end.setDate(today.getDate() + parseInt(this.duration));
                            this.endDate = end.toISOString().split('T')[0];
                        } else {
                            this.expectedProfit = '';
                            this.startDate = '';
                            this.endDate = '';
                        }
                    }
                }">
                    <div class="rounded-t-lg bg-primary p-4 text-center dark:bg-accent sm:p-5">
                        <p class="mt-3 text-indigo-100">Plan</p>
                        <p class="text-xl font-medium text-white mb-5">{{ $investmentplan->name }}</p>
                        <p class="mt-3 text-5xl font-semibold text-white">{{ $investmentplan->profit_percentage }}</p>
                        <p class="mt-3 text-indigo-100">Percentage</p>
                    </div>
                    <div class="p-4 sm:p-5">

                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $investmentplan->id }}">
                        <div class="mt-3 space-y-4 text-left">
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span class="font-medium">Min_Amount <b>${{ $investmentplan->min_amount }}</b></span>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span class="font-medium">Max_Amount <b>${{ $investmentplan->max_amount }}</b></span>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span class="font-medium">Duration <b>{{ $investmentplan->duration }} days</b></span>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span class="font-medium">
                                    <input
                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="amount" type="number" name="amount" x-model="amount"
                                        @input="calculateValues" />
                                </span>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span class="font-medium">
                                    <label class="block">
                                        <input
                                            class="form-input w-full rounded-lg bg-transparent px-3 py-2 placeholder:text-slate-400/70 disabled:pointer-events-none disabled:select-none disabled:bg-zinc-100 dark:disabled:bg-navy-600"
                                            placeholder="Expected Profit" type="text" name="expected_profit"
                                            x-model="expectedProfit" readonly />
                                    </label>
                                </span>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-warning/10 text-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span class="font-medium">
                                    <label class="block">
                                        <input
                                            class="form-input w-full rounded-lg bg-transparent px-3 py-2 placeholder:text-slate-400/70 disabled:pointer-events-none disabled:select-none disabled:bg-zinc-100 dark:disabled:bg-navy-600"
                                            placeholder="Start Date" type="text" name="start_date"
                                            x-model="startDate" readonly />
                                    </label>
                                </span>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-warning/10 text-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                <span class="font-medium">
                                    <label class="block">
                                        <input
                                            class="form-input w-full rounded-lg bg-transparent px-3 py-2 placeholder:text-slate-400/70 disabled:pointer-events-none disabled:select-none disabled:bg-zinc-100 dark:disabled:bg-navy-600"
                                            placeholder="End Date" type="text" name="end_date" x-model="endDate"
                                            readonly />
                                    </label>
                                </span>
                            </div>
                        </div>
                      


                        <form action="{{ route('admin.investments.delete', $investmentplan->id) }}" method="POST"
                            class="w-full mt-5"
                            onsubmit="return confirm('Are you sure you want to delete this Investment Plan?');">
                            @csrf
                            @method('DELETE')
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="btn mt-5 space-x-2 rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <span>Delete Investment</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Optionally display user's current investments -->

    </main>




</x-app-layout>

{{--  --}}

<x-app-layout>
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Signal
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="#">History</a>
                </li>
            </ul>
        </div>

        <!-- Full Width Zebra Table -->
        <div class="card pb-4">
            <div class="my-3 flex h-8 items-center justify-between px-4 sm:px-5">
                <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                    User Signal History Details
                </h2>
            </div>
            <div>
                <div class="mt-5">
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table class="is-zebra w-full text-left">
                            <thead>
                                <tr>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        #
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        User Name
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Signal ID
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Name
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Monthly Price
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Signal Count
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Timeframes
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Alert Types
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Status
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Date/Time
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($signalHistories as $signalHistory)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $signalHistory->id }}</td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $signalHistory->user->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $signalHistory->signal_id }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $signalHistory->name }}</td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ number_format($signalHistory->monthly_price, 2) }}</td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $signalHistory->signal_count }}</td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $signalHistory->timeframes }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $signalHistory->alert_types }}</td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <span
                                                class="badge {{ $signalHistory->status === 'Paid' ? 'bg-success' : 'bg-warning' }} text-white">
                                                {{ ucfirst($signalHistory->status) }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $signalHistory->created_at->format('Y-m-d H:i') }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <select class="status-select" data-id="{{ $signalHistory->id }}">
                                                <option value="pending"
                                                    {{ $signalHistory->status === 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="Paid"
                                                    {{ $signalHistory->status === 'Paid' ? 'selected' : '' }}>Paid
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            document.querySelectorAll('.status-select').forEach(select => {
                select.addEventListener('change', function() {
                    const signalHistoryId = this.dataset.id;
                    const newStatus = this.value;
                    const badge = this.closest('tr').querySelector('.badge');
                    const previousStatus = badge.textContent.toLowerCase();

                    // Optimistic UI update
                    badge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
                    badge.className = `badge ${
                        newStatus === 'Paid' ? 'bg-success' : 'bg-warning'
                    } text-white`;

                    fetch(`/admin/signal-histories/${signalHistoryId}/status`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: JSON.stringify({
                                status: newStatus
                            }),
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                alert(data.message);
                            } else {
                                throw new Error('Update failed');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            badge.textContent = previousStatus.charAt(0).toUpperCase() + previousStatus
                                .slice(1);
                            badge.className = `badge ${
                            previousStatus === 'Paid' ? 'bg-success' : 'bg-warning'
                        } text-white`;
                            this.value = previousStatus;
                            alert('Failed to update status: ' + error.message);
                        });
                });
            });
        </script>
    @endpush
</x-app-layout>

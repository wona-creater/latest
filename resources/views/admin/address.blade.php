<x-app-layout>
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Crypto Address
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <div x-data="{ showModal: false }">
                <button @click="showModal = true"
                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    Add Your Details Here
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
                                    Add New Crypto Details
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
                            <form action="{{ route('admin.cryptoaddresses.store') }}" method="POST"
                                class="px-4 py-4 sm:px-5">
                                @csrf
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <!-- Token Name -->
                                    <div>
                                        <label for="name"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Token Name
                                        </label>
                                        <input type="text" name="name" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Token Name">
                                        @error('name')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Token Address -->
                                    <div>
                                        <label for="address"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Token Address
                                        </label>
                                        <input type="text" name="address" id="address" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Token Address">
                                        @error('address')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Token Network -->
                                    <div>
                                        <label for="network"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Token Network
                                        </label>
                                        <input type="text" name="network" id="network" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Token Network">
                                        @error('network')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-6 text-center">
                                    <button type="submit"
                                        class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Save Details
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        <!-- Full Width Zebra Table -->
        <div class="card pb-4">
            <div class="my-3 flex h-8 items-center justify-between px-4 sm:px-5">
                <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                    Details
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
                                        Token Name
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Token Network
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Amount
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cryptoaddresses as $cryptoaddress)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">1</td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $cryptoaddress->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $cryptoaddress->network }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            {{ $cryptoaddress->address }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                            <form action="{{ route('cryptoaddress.destroy', $cryptoaddress->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this address?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="code-wrapper hidden px-4 pt-4 sm:px-5">
                <pre class="is-scrollbar-hidden max-h-96 overflow-auto rounded-lg" x-init="hljs.highlightElement($el)">
            <code class="language-html" x-ignore>
&lt;div class=&quot;is-scrollbar-hidden min-w-full overflow-x-auto&quot;&gt;&#13;&#10;    &lt;table class=&quot;is-zebra w-full text-left&quot;&gt;&#13;&#10;      &lt;thead&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;th&#13;&#10;            class=&quot;whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5&quot;&#13;&#10;          &gt;&#13;&#10;            #&#13;&#10;          &lt;/th&gt;&#13;&#10;          &lt;th&#13;&#10;            class=&quot;whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5&quot;&#13;&#10;          &gt;&#13;&#10;            Name&#13;&#10;          &lt;/th&gt;&#13;&#10;          &lt;th&#13;&#10;            class=&quot;whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5&quot;&#13;&#10;          &gt;&#13;&#10;            Job&#13;&#10;          &lt;/th&gt;&#13;&#10;          &lt;th&#13;&#10;            class=&quot;whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5&quot;&#13;&#10;          &gt;&#13;&#10;            Favorite Color&#13;&#10;          &lt;/th&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;      &lt;/thead&gt;&#13;&#10;      &lt;tbody&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;1&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Cy Ganderton&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;&#13;&#10;            Quality Control Specialist&#13;&#10;          &lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Blue&lt;/td&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;2&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Hart Hagerty&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;&#13;&#10;            Desktop Support Technician&#13;&#10;          &lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Purple&lt;/td&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;3&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Brice Swyre&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Tax Accountant&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Red&lt;/td&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;4&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Marjy Ferencz&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;&#13;&#10;            Office Assistant I&#13;&#10;          &lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Crimson&lt;/td&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;      &lt;/tbody&gt;&#13;&#10;    &lt;/table&gt;&#13;&#10;  &lt;/div&gt;</code>
          </pre>
            </div>
        </div>
        </div>
    </main>
    </div>

</x-app-layout>

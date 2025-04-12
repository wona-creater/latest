<x-app-layout>


    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="py-5 text-center lg:py-6">
            <p class="text-sm uppercase">All Crypto Education Courses</p>
            <h3 class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100">
                Course Details
            </h3>

            <div x-data="{ showModal: false }">
                <button @click="showModal = true"
                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    Add Your Course Details Here
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
                                    Add New Course
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
                            <form class="px-4 py-4 sm:px-5">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <!-- Plan Name -->
                                    <div>
                                        <label for="name"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Title
                                        </label>
                                        <input type="text" name="title" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Title">
                                        @error('title')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Amount -->
                                    <div>
                                        <label for="amount"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Instructor
                                        </label>
                                        <input type="text" name="instructor" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder=" Repayment Period">
                                        @error('instructor')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- User Selection -->
                                    <div>
                                        <label for="user_id"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Rating
                                        </label>
                                        <input type="text" name="rating" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter  Interest Rate">
                                        @error('rating')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="user_id"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Student Count
                                        </label>
                                        <input type="text" name="student_count" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter  Student Count">
                                        @error('student_count')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="user_id"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Price
                                        </label>
                                        <input type="text" name="price" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Price">
                                        @error('price')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="user_id"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Duration
                                        </label>
                                        <input type="text" name="duration" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Duration">
                                        @error('duration')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="user_id"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Category
                                        </label>
                                        <input type="text" name="category" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Category">
                                        @error('categroy')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <!-- Submit Button -->
                                <div class="mt-6 text-center">
                                    <button type="submit"
                                        class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Save Loan Details
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            @foreach ($courses as $course)
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <div class="card grow items-center p-4 sm:p-5">
                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Title</h3>
                    <p class="text-xs+">{{ $course->title }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Instructor</h3>
                    <p class="text-xs+">{{ $course->instructor }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Rating</h3>
                    <p class="text-xs+">{{ $course->rating }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">No. of Student</h3>
                    <p class="text-xs+">{{ $course->student_count }}</p>

                    <div class="my-4 h-px w-full bg-slate-200 dark:bg-navy-500"></div>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Price</h3>
                    <p class="text-xs+">${{ number_format($course->price, 2) }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Duration</h3>
                    <p class="text-xs+">{{ $course->duration }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Category</h3>
                    <p class="text-xs+">{{ $course->category }}</p>
                    <form action="{{ route('course.store') }}" method="POST" class="w-full mt-5">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <div class="flex justify-center">
                            <button type="submit"
                                class="btn mt-5 space-x-2 rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span>Delete Course</span>
                            </button>
                        </div>


                    </form>
                </div>
            @endforeach
        </div>
        </form>



        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif
    </main>

</x-app-layout>

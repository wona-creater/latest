<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}" >
        @csrf
    </form>

    {{-- <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form> --}}

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" >
        @csrf
        @method('patch')

        <div class="grid grid-cols-1  gap-4 sm:grid-cols-2">
            <label class="block">
                <span>Name </span>
                <span class="relative mt-1.5 flex">
                    <input
                        class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter name" name="name" type="text" :value="old('name', $user - > name)"
                         autofocus autocomplete="name" />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <i class="fa-regular fa-user text-base"></i>
                    </span>
                </span>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </label>
            <label class="block mb-6 ">
                <span>Email Address </span>
                <span class="relative mt-1.5 flex">
                    <input
                        class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter email address" name="email" type="email"
                        :value="old('email', $user - > email)"  autocomplete="username" />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <i class="fa-regular fa-envelope text-base"></i>
                    </span>
                </span>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </label>

            <label class="block">
                <span>Phone Number</span>
                <span class="relative mt-1.5 flex">
                    <input
                        class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter name" type="text" name="phone_number" />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <i class="fa-regular fa-user text-base"></i>
                    </span>
                </span>
                <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
            </label>
            <label class="block mb-6 ">
                <span>Home Address </span>
                <span class="relative mt-1.5 flex">
                    <input
                        class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter email address" type="text" name="home_address" />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <i class="fa-regular fa-house text-base"></i>
                    </span>
                </span>
                <x-input-error class="mt-2" :messages="$errors->get('home_address')" />
            </label>

            <label class="block mb-6 ">
                <span>Profile Picture</span>
                <span class="relative mt-1.5 flex">
                    <div class="filepond fp-bordered fp-grid mt-1.5 [--fp-grid:2]">
                        <input type="file" name="image" x-init="$el._x_filepond = FilePond.create($el, {
                            allowMultiple: false,
                            storeAsFile: true // This ensures the file is added to the form data
                        })" />
                    </div>
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <i class="fa-regular fa-telephone text-base"></i>
                    </span>
                </span>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </label>

            <label class="block mb-6 ">
                <span>Document Image</span>
                <span class="relative mt-1.5 flex">
                    <div class="filepond fp-bordered fp-grid mt-1.5 [--fp-grid:2]">
                        <input type="file" name="document_image" x-init="$el._x_filepond = FilePond.create($el, {
                            allowMultiple: false,
                            storeAsFile: true // This ensures the file is added to the form data
                        })" />
                    </div>
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <i class="fa-regular fa-envelope text-base"></i>
                    </span>
                </span>
                <x-input-error class="mt-2" :messages="$errors->get('document_image')" />
            </label>

            <label class="block">
                <label for="document_type" class="block">Document Type</label>
                <select id="document_type" name="document_type" class="mt-1 w-full">
                    <option value="">Select a document type</option>
                    @foreach (['drivers_license', 'government_id', 'passport'] as $option)
                        <option value="{{ $option }}"
                            {{ old('document_type', $user->document_type) === $option ? 'selected' : '' }}>
                            {{ ucwords(str_replace('_', ' ', $option)) }}
                        </option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('document_type')" />
            </label>

            <label class="block mb-4 ">
                <span class="relative mt-3 flex">
                    <button
                        class="btn h-8 rounded-full border border-slate-200 px-3 text-xs+ font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        Update Profile Information
                    </button>
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    </span>
                </span>
            </label>
        </div>
    </form>
</section>

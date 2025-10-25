<section>
    <header>
        <h2 class="text-lg font-semibold text-green-600">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-400">
            {{ __("Update your name, email address, and profile photo.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Profile Photo -->
        <div>
            <x-input-label for="profile_photo" :value="__('Profile Photo')" class="text-white" />
            <input id="profile_photo" type="file" name="profile_photo"
                class="mt-1 block w-full text-sm text-white-600 border border-white-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            @if($user->profile_photo)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" class="h-20 w-20 rounded-full object-cover border-2 border-green-400" alt="Profile Photo">
                </div>
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-white" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Save button -->
        <div class="flex items-center gap-4">
            <x-primary-button class="text-green">{{ __('Save Changes') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-600 font-medium">
                    {{ __('Saved successfully!') }}
                </p>
            @endif
        </div>
    </form>
</section>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('posts.store') }}" class="mt-4" enctype="multipart/form-data">
        @csrf

        <!-- title -->
        <div class="mb-4">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- message -->
        <div class="mb-4">
            <x-input-label for="paragraph" :value="__('Message')" />
            <x-text-input id="message" class="block mt-2 w-full"
                            type="text"
                            name="content"
                            required autocomplete="current-message" />
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>
        <!-- cover image -->
        <div class="mb-4">
            <x-input-label for="cover_image" :value="__('Cover Image')" />
            <input id="cover_image" type="file" name="cover_image" accept="image/*">
            <x-input-error :messages="$errors->get('cover_image')" class="mt-2" />
        </div>

        <!-- create button -->
        <div class="flex items-center justify-end">
            <x-primary-button>
                {{ __('Create post') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

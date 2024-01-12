<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('posts.update', $post->id) }}" class="mt-4">
        @csrf
        @method('PUT')
        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$post->title" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="paragraph" :value="__('Message')" />
            <x-text-input id="message" class="block mt-2 w-full"
                            type="text"
                            name="content"
                            :value="$post->message"
                            required autocomplete="current-message" />
                            
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-end">
            <x-primary-button>
                {{ __('Edit post') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

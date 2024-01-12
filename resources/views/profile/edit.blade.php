<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <!-- Display User Information -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl text-white">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Your Information') }}
                    </h2>

                    <p><strong>{{ __('Name') }}:</strong> {{ $user->name }}</p>
                    <p><strong>{{ __('Email') }}:</strong> {{ $user->email }}</p>
                    <p><strong>{{ __('Birthday') }}:</strong> {{ $user->birthday ?? 'Not provided' }}</p>
                    <p><strong>{{ __('Bio') }}:</strong> {{ $user->bio ?? 'Not provided' }}</p>
                    <p><strong>{{ __('Admin')  }}</strong>: {{ $user->is_admin ? 'Yes' : 'No' }}</p>
                    @if($user->avatar)
                        <p><strong>{{ __('Avatar') }}:</strong></p>
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="mt-2 h-16 w-16 rounded-full object-cover">
                    @else
                        <p><strong>{{ __('Avatar') }}:</strong> {{ __('Not uploaded') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

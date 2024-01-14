<!-- resources/views/contact/all.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Forms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('All Contact Forms') }}
                    </h2>
                    @if (auth()->user()->is_admin)
                    @foreach ($contacts as $contact)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <p><strong>{{ __('Name') }}:</strong> <a href="{{ route('user.profile', ['user' => $contact->user_id]) }}">{{ $contact->name }}</a></p>
                                <p><strong>{{ __('Email') }}:</strong> {{ $contact->email }}</p>
                                <p><strong>{{ __('Message') }}:</strong> {{ $contact->message }}</p>
                                <p><strong>{{ __('Received at') }}:</strong> {{ $contact->created_at->format('Y/m/d \o\m H:i') }}</p>
                                <br><hr>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <p class="text-red-500">{{ __('You are not authorized to view this page.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- resources/views/faq/edit_item.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit FAQ Item') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="post" action="{{ route('faq.item.update', $item->id) }}" class="space-y-4">
                    @csrf
                    @method('put')

                    <div class="mb-4">
                        <x-input-label for="question" :value="__('Question')" />
                        <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" :value="$item->question" required autofocus />
                        <x-input-error :messages="$errors->get('question')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="answer" :value="__('Answer')" />
                        <x-text-input id="answer" class="block mt-1 w-full" type="text" name="answer" :value="$item->answer" required />
                        <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>{{ __('Update Item') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

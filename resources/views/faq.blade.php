<!-- resources/views/faq.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Frequently Asked Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">General Questions</h3>
                    <ul>
                        <li>
                            <strong>Q: What is Lorem Ipsum?</strong>
                            <p>A: Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </li>
                        <li>
                            <strong>Q: How can I contact support?</strong>
                            <p>A: You can reach our support team through the contact form on the Contact Us page.</p>
                        </li>
                        <!-- Add more FAQ items as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

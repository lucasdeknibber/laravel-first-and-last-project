<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <div class="bg-green-500 text-white p-4 rounded-lg mb-6 text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth
                    @if (Auth::user()->is_admin == '1')
                    <div class="flex justify-between">
                        <b><a href="{{ route('posts.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create post</a></b>
                    </div>
                    @endif
                    @endauth
                    @foreach ($posts as $post)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    {{ $post->title }}
                                </h2>
                                <p class="text-gray-700 dark:text-gray-300">
                                    {{ $post->message }}
                                </p>
                                <small>gepost door {{$post->user->name}} op {{$post->created_at->format('Y/m/d \o\m H:i')}}</small>
                                @if($post->user_id == Auth::user()->id || Auth::user()->is_admin == '1')
                                <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                @endif
                                <br><hr>
                            </div>
                        </div>
                    @endforeach
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>

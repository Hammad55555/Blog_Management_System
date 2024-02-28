@extends('laravelmddrawer::app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .bg-cover {
            height: 100vh;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <div class="bg-cover bg-center h-screen" style="background-image: url('/build/assets/pngtree-blue-round-technology-dashboard-image_908916.jpg');">
        <div class="flex flex-col items-center justify-center h-full bg-opacity-50 bg-gray-900" style="width: 100%">
            <div class="py-12" style="width: 100%">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 text-center font-bold" style="width: 100%">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>
            </div>
            <br><br>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-center py-4 text-2xl font-semibold">
                        <a href="{{ route('blog.index') }}">View Blog Posts</a>
                    </h2>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-center py-4 text-2xl font-semibold">
                        <a href="{{ route('blog.store-get') }}">Create Posts</a>
                    </h2>
                </div>
            </div>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-center py-4 text-2xl font-semibold">
                        <a href="{{ route('blog.assignRoleShow') }}">Assign Role</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection

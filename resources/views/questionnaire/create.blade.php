@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <a href="/home" title="" class="underline"><x-arrow-left class="h-4 w-4 inline-block"></x-arrow-left> Back to list questionnaire</a> - New questionnaire
            </header>
            <div class="w-full p-6 flex justify-center">
                <div class="lg:w-6/12 w-10/12">
                    <form class="bg-white px-8 pt-6 pb-8 mb-4" method="POST" action="/questionnaires">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Title
                            </label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title" autocomplete="off" name="title" value="{{ old('title') }}">
                            @error('title')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Description of the questionnaire" name="description" autocomplete="off" value="{{ old('description') }}">
                            @error('description')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="flex items-center justify-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Create
                            </button>
                        </div>
                    </form>
                  </div>
            </div>
        </section>
    </div>
</main>
@endsection

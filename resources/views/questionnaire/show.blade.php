@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                {{ $questionnaire->title }}
            </header>
            <div class="w-full p-6 flex justify-center">
                <p class="text-gray-700">
                    <a href="/questionnaires/{{ $questionnaire->id }}/questions/create" title="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outlineinline-block leading-8">Add question</a>
                </p>
            </div>
        </section>
    </div>
</main>
@endsection

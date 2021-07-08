@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <a href="/home" title="" class="underline"><x-arrow-left class="h-4 w-4 inline-block"></x-arrow-left> Back to list questionnaire</a> - {{ $questionnaire->title }}
            </header>
            <div class="w-full">
                @foreach ($questionnaire->questions as $question)
                    <div class="pb-6">
                        <div class="p-6 flex justify-between">
                            <strong>{{ $question->question }}</strong>
                            <form class="" method="POST" action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outlineinline-block leading-4 text-sm">Delete question</button>
                            </form></div>
                        <div class="border-t-2 border-b-2 border-gray-100">
                            @foreach ($question->answers as $answer)
                                <div class="flex justify-between py-2 px-6 border-t-2 border-b-2 border-gray-100">
                                    <span>{{ $answer->answer }}</span>
                                    <small>{{ intval(($answer->responses->count() * 100) / ($question->responses->count() > 0 ? $question->responses->count() : 1)) }}%</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <div class="p-6 flex justify-center">
                    <p class="text-gray-700">
                        <a href="/questionnaires/{{ $questionnaire->id }}/questions/create" title="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outlineinline-block leading-8">Add question</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    <a href="/questionnaires/create" title="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outlineinline-block leading-8">Add new questionnaire</a>
                </p>
            </div>
        </section>

        @if ($questionnaires && $questionnaires->count() > 0)
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg mt-8">
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    List questionnaires
                </header>

                <div class="w-full">
                    @foreach($questionnaires as $questionnaire)
                        <div class="text-gray-700 border-b-2 border-gray-100 p-6">
                            <p>
                                <a class="underline" href="/questionnaires/{{ $questionnaire->id }}" title="">{{ $questionnaire->title }}</a>
                            </p>
                            <small class="mt-2 block">{{ $questionnaire->description }} - Domande: {{ $questionnaire->questions->count() }}</small>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</main>
@endsection

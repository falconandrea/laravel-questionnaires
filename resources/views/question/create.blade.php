@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <a href="/questionnaires/{{ $questionnaire->id }}" title="" class="underline"><x-arrow-left class="h-4 w-4 inline-block"></x-arrow-left> Back to questionnaire</a> - New question
            </header>
            <div class="w-full p-6 flex justify-center">
                <div class="lg:w-6/12 w-10/12">
                    <form class="bg-white px-8 pt-6 pb-8 mb-4" method="POST" action="/questionnaires/{{ $questionnaire->id }}/questions">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="question">
                                Question
                            </label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="question" type="text" placeholder="Question" autocomplete="off" name="question" value="{{ old('question') }}">
                            @error('question')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <hr/>
                        <strong class="block text-gray-700 text-sm font-bold mb-4 mt-4">Possible answers:</strong>
                        @for ($i = 0; $i <= 4; $i++)
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="answer{{ $i }}">
                                    Answer {{ $i + 1 }}
                                </label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="answer{{ $i }}" type="text" placeholder="Answer {{ $i + 1 }}" autocomplete="off" name="answer[{{ $i }}]" value="{{ old('answer.' . $i) }}">
                                @error('answer.' . $i)
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        @endfor
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

@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                {{ $questionnaire->title }}
            </header>
            <div class="w-full">
                <p class="text-gray-700 p-6">{{ $questionnaire->description }}</p>
                <form method="POST" action="{{ $questionnaire->publicPath() }}">
                    @csrf
                    @foreach ($questionnaire->questions as $key => $question)
                        <div class="border-b-2 border-gray-100 pb-6">
                            <p class="p-6"><strong>{{ $key+1 }}) {{ $question->question }}</strong></p>
                            <div class="px-6">
                            @foreach ($question->answers as $answer)
                                <p class="mb-2">
                                    <label class="block py-2" for="answer{{ $answer->id }}"><input type="radio" name="answer[{{ $key }}][answer_id]" value="{{ $answer->id }}" id="answer{{ $answer->id }}" {{ old('answer.' . $key . '.answer_id') == $answer->id ? 'checked' : '' }} class="mr-2" /> {{ $answer->answer }}</label>
                                    <input type="hidden" name="answer[{{ $key }}][question_id]" value="{{ $question->id }}" />
                                </p>
                            @endforeach
                            @error('answer.' . $key . '.answer_id')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                            </div>
                        </div>
                    @endforeach
                    <div class="mb-4 p-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Your name
                        </label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Your name" autocomplete="off" name="name" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4 p-6 pt-0">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Your email
                        </label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Your email" autocomplete="off" name="email" value="{{ old('email') }}">
                        @error('email')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="p-6 flex justify-center">
                        <p class="text-gray-700">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outlineinline-block leading-8">Save reply survey</button>
                        </p>
                    </div>
                </form>
            </div>
        </section>
    </div>
</main>
@endsection

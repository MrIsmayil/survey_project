<x-home-layout>
    <x-slot name="title">
        {{ $survey->title }}
    </x-slot>

    <section class="register-form flex justify-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <h3>Редактирование {{ $survey->title }}</h3>
            <form method="POST" action="{{ route('home.survey.update') }}">
                @csrf
                @method('PATCH')

                @foreach ($survey->questions as $question)
                    <!-- Name -->
                    @if (count($question->readyanswers) > 0)
                        <label for="{{ $question->id }}">{{ $question->text_question }}</label>
                        <select name="{{ $question->id }}" id="{{ $question->id }}" class="block mt-1 w-full">
                            @foreach ($question->readyanswers as $readyanswer)
                                <option value="{{ $readyanswer->text_answer }}"
                                    @if ($question->answer && $readyanswer->text_answer == $question->answer->text_answer) @selected(true) @endif>
                                    {{ $readyanswer->text_answer }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden", value="{{ $question->survey_id }}" name="survey_id">
                    @else
                        <div>
                            {{-- <x-input-label for="answer" :value="__('{{ $question->text_question }}')" /> --}}
                            <label for="{{ $question->id }}">{{ $question->text_question }}</label>
                            <input id="{{ $question->id }}" class="block mt-1 w-full" type="text"
                                name="{{ $question->id }}"
                                @if ($question->answer) value="{{ $question->answer->text_answer }}" @endif
                                required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            <input type="hidden", value="{{ $question->survey_id }}" name="survey_id">
                        </div>
                    @endif
                @endforeach

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Ответить') }}
                    </x-primary-button>
                </div>
            </form>
            <a href="{{ route('home.index') }}" class="login-button mt-3">На главную</a>

        </div>
    </section>
</x-home-layout>

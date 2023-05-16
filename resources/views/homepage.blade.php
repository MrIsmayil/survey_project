<x-home-layout>
    <x-slot name="title">
        Опрос - Главная страница
    </x-slot>

    <main class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg h-screen">
                <header class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center">
                    <h1 class="mx-auto font-bold">Опрос жителей Санкт-Петербурга</h1>
                </header>

                <section class="p-7">
                    <h2 class="mb-3">Список опросов</h2>
                    {{-- @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                        </div>
                    @endif --}}
                    @foreach ($surveys as $survey)
                        @if ($survey->users->contains($user))
                            <a href="{{ route('home.survey.edit', $survey->id) }}"
                                class="survey-button rounded-lg border border-blue-500 w-28 p-2 no-underline text-black">{{ $survey->title }}</a>
                        @else
                            <a href="{{ route('home.survey.show', $survey->id) }}"
                                class="survey-button rounded-lg border border-blue-500 w-28 p-2 no-underline text-black">{{ $survey->title }}</a>
                        @endif
                    @endforeach
                </section>
            </div>
        </div>
    </main>
</x-home-layout>

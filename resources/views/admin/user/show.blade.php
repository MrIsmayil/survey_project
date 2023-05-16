<x-admin-layout>
    <x-slot name="title">
        Опросы пользователя
    </x-slot>

    <x-slot name="aside">
        @include('components.admin.aside')
    </x-slot>

    <x-slot name="header">
        <h1 class="m-0">Опросы пользователя</h1>
    </x-slot>

    <x-slot name="contentUp">
        @include('components.admin.content-up')
    </x-slot>

    <x-slot name="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Опросы пользователя</h3>
                            </div>


                            <section class="content">
                                <div class="row">
                                    <div class="col-12" id="accordion">


                                        @foreach ($user->surveys as $survey)
                                            <div class="card card-primary card-outline">
                                                <div class="card-header">
                                                    <h4 class="card-title w-100 mt-3">
                                                        {{ $survey->title }}
                                                    </h4>
                                                </div>
                                                <div id="survey-{{ $survey->id }}" class="">
                                                    @foreach ($survey->questions as $question)
                                                        <div class="card-body">

                                                            <p><span
                                                                    class="inline-block mr-3 text-bold">{{ $question->text_question }}</span><span>{{ $question->answer->text_answer }}</span>
                                                            </p>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        @endforeach




                                    </div>
                                </div>

                            </section>



                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
    </x-slot>
</x-admin-layout>

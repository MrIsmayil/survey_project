<x-admin-layout>
    <x-slot name="title">
        Редактирование опроса: {{ $survey->title }}
    </x-slot>

    <x-slot name="aside">
        @include('components.admin.aside')
    </x-slot>

    <x-slot name="header">
        <h1 class="m-0">Редактирование опроса: {{ $survey->title }}</h1>
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
                                <h3 class="card-title">Редактирование опроса: {{ $survey->title }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                                </div>
                            @endif
                            <form action="{{ route('survey.update', $survey->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="surveyTitle">Название</label>
                                        <input type="text" value="{{ $survey->title }}" class="form-control"
                                            id="surveyTitle" name="surveyTitle" required
                                            placeholder="Введите название опроса">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary text-black">Редактировать</button>
                                </div>
                            </form>

                            @if (count($survey->questions) > 0)

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Вопросы опроса: {{ $survey->title }}</h3>

                                        @if (session('success'))
                                            <div class="alert alert-success" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true">×</button>
                                                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                                            </div>
                                        @endif

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"
                                                title="Remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        @foreach ($survey->questions as $question)
                                            <form action="{{ route('question.update', $question->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="questionTitle">Вопрос</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $question->text_question }}" id="questionTitle"
                                                            name="questionTitle" required placeholder="Введите вопрос">
                                                        <input type="hidden" class="form-control" id="surveyId"
                                                            name="surveyId">
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary text-black">Редактировать
                                                        вопрос</button>
                                                </div>


                                            </form>

                                            <div class="card-footer">
                                                <form action="{{ route('question.destroy', $question->id) }}"
                                                    method="POST" class="inline mt-3 ml-3" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button class="btn btn-danger btn-sm delete-btn inline text-black">
                                                <i class="fas fa-trash">
                                                </i>
                                                Удалить вопрос
                                            </button> --}}

                                                    <button type="submit"
                                                        class="btn btn-danger delete-btn inline text-black">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Удалить
                                                        вопрос</button>
                                                </form>
                                            </div>

                                            @if (count($question->readyanswers) > 0)
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Ответы вопроса</h3>
                                                        @if (session('success'))
                                                            <div class="alert alert-success" role="alert">
                                                                <button type="button" class="close"
                                                                    data-dismiss="alert" aria-hidden="true">×</button>
                                                                <h4><i
                                                                        class="icon fa fa-check"></i>{{ session('success') }}
                                                                </h4>
                                                            </div>
                                                        @endif

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse" title="Collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove" title="Remove">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        @foreach ($question->readyanswers as $readyanswer)
                                                            <form
                                                                action="{{ route('readyanswer.update', $readyanswer->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="questionAnswer">Ответ</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $readyanswer->text_answer }}"
                                                                            id="questionAnswer" name="questionAnswer"
                                                                            placeholder="Введите ответ">
                                                                        <input type="hidden" class="form-control"
                                                                            value={{ $question->id }} id="questionId"
                                                                            name="questionId">
                                                                    </div>

                                                                </div>
                                                                <!-- /.card-body -->

                                                                <div class="card-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-primary text-black">Редактировать
                                                                        ответ</button>
                                                                </div>
                                                            </form>

                                                            <div class="card-footer">
                                                                <form
                                                                    action="{{ route('readyanswer.destroy', $readyanswer->id) }}"
                                                                    method="POST" class="inline mt-3 ml-3"
                                                                    style="display: inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    {{-- <button class="btn btn-danger btn-sm delete-btn inline text-black">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Удалить вопрос
                                                </button> --}}

                                                                    <button type="submit"
                                                                        class="btn btn-danger delete-btn inline text-black">
                                                                        <i class="fas fa-trash">
                                                                        </i>
                                                                        Удалить
                                                                        ответ</button>
                                                                </form>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            @endif

                                            <div class="card-header mt-3">
                                                <h3 class="card-title">Создать ответ для вопроса</h3>
                                            </div>

                                            <form action="{{ route('readyanswer.store') }}" method="POST">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="questionAnswer">Ответ</label>
                                                        <input type="text" class="form-control"
                                                            id="questionAnswer" name="questionAnswer" required
                                                            placeholder="Введите ответ">
                                                        <input type="hidden" class="form-control"
                                                            value="{{ $question->id }}" id="questionId"
                                                            name="questionId">
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary text-black">Создать
                                                        ответ</button>
                                                </div>
                                            </form>
                                        @endforeach

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            @endif

                            <div class="card-header mt-3">
                                <h3 class="card-title">Создать вопрос для: {{ $survey->title }}</h3>
                            </div>

                            <form action="{{ route('question.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="questionTitle">Вопрос</label>
                                        <input type="text" class="form-control" id="questionTitle"
                                            name="questionTitle" required placeholder="Введите вопрос">
                                        <input type="hidden" class="form-control" value="{{ $survey->id }}"
                                            id="surveyId" name="surveyId">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary text-black">Создать
                                        вопрос</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
    </x-slot>
</x-admin-layout>

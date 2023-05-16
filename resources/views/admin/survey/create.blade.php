<x-admin-layout>
    <x-slot name="title">
        Создать опроса
    </x-slot>

    <x-slot name="aside">
        @include('components.admin.aside')
    </x-slot>

    <x-slot name="header">
        <h1 class="m-0">Создать опроса</h1>
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
                                <h3 class="card-title">Создать опроса</h3>
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
                            <form action="{{ route('survey.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="surveyTitle">Название</label>
                                        <input type="text" class="form-control" id="surveyTitle" name="surveyTitle"
                                            required placeholder="Введите название опроса">
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="surveyQuestion">Вопрос</label>
                                        <input type="text" class="form-control" id="surveyQuestion"
                                            name="surveyQuestion" required placeholder="Введите вопрос">
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="questionAnswer">Ответ к вопросу</label>
                                        <input type="text" class="form-control" id="questionAnswer"
                                            name="questionAnswer" placeholder="Введите ответ">
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary text-black">Добавить</button>
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

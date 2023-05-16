<x-admin-layout>
    <x-slot name="title">
        Все опросы
    </x-slot>

    <x-slot name="aside">
        @include('components.admin.aside')
    </x-slot>

    <x-slot name="header">
        <h1 class="m-0">Все опросы</h1>
    </x-slot>

    <x-slot name="contentUp">
        @include('components.admin.content-up')
    </x-slot>

    <x-slot name="content">
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Все опросы</h3>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                        </div>
                    @endif

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    №
                                </th>
                                <th style="width: 20%">
                                    Называние опроса
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surveys as $key => $survey)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        <a>
                                            {{ $survey->title }}
                                        </a>
                                        <br />
                                        <small>
                                            Создано {{ $survey->created_at }}
                                        </small>
                                        <br />
                                        <small>
                                            Обновлено {{ $survey->updated_at }}
                                        </small>

                                    </td>

                                    <td class="project-actions text-right">
                                        {{-- <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            Показать
                                        </a> --}}
                                        <a class="btn btn-info btn-sm" href="{{ route('survey.edit', $survey->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Редактировать
                                        </a>
                                        <form action="{{ route('survey.destroy', $survey->id) }}" method="POST"
                                            class="inline" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm delete-btn inline">
                                                <i class="fas fa-trash">
                                                </i>
                                                Удалить
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </x-slot>
</x-admin-layout>

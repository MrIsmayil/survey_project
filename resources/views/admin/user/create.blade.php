<x-admin-layout>
    <x-slot name="title">
        Создать пользователя
    </x-slot>

    <x-slot name="aside">
        @include('components.admin.aside')
    </x-slot>

    <x-slot name="header">
        <h1 class="m-0">Создать пользователя</h1>
    </x-slot>

    <x-slot name="contentUp">
        @include('components.admin.content-up')
    </x-slot>

    <x-slot name="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-body register-card-body">
                                <p class="login-box-msg">Создание нового пользователя</p>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="имя" name="name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder="Пароль"
                                            name="password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder="Повтор пароля"
                                            name="password_confirmation">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <!-- /.col -->
                                        <div class="col-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-block">Регистрировать</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                            </div>
                            <!-- /.form-box -->
                        </div><!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
    </x-slot>
</x-admin-layout>

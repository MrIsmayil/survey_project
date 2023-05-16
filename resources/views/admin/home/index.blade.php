<x-admin-layout>
    <x-slot name="title">
        Опросы жителей Санкт-Петербурга - Админ панель
    </x-slot>

    <x-slot name="aside">
        @include('components.admin.aside')
    </x-slot>

    <x-slot name="header">
        <h1 class="m-0">Опросы жителей Санкт-Петербурга - Главная</h1>
    </x-slot>

    <x-slot name="contentUp">
        @include('components.admin.content-up')
    </x-slot>

    <x-slot name="content">
        <h1 class="m-0">Опросы жителей Санкт-Петербурга - Главная страница админки</h1>
    </x-slot>


</x-admin-layout>

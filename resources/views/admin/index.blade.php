@extends('layouts.admin')

@section('title')
    Админ панель
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Админ панель</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">

            <div class="col-md-3">
                <div class="card card-icon mb-4">
                    <div class="card-body text-center">
                        <x-feathericon-image style="font-size: 32px; color: #f4834a;"/>
                        <p class="text-muted mt-2 mb-2">Все баннеры</p>
                        <p class="lead text-22 m-0">{{ $banners ?? '0' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-icon mb-4">
                    <div class="card-body text-center">
                        <x-feathericon-award style="font-size: 32px; color: #f4834a;"/>
                        <p class="text-muted mt-2 mb-2">Достижения</p>
                        <p class="lead text-22 m-0">{{ $achievements ?? '0' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-icon mb-4">
                    <div class="card-body text-center">
                        <x-feathericon-home style="font-size: 32px; color: #f4834a;"/>
                        <p class="text-muted mt-2 mb-2">Гостиницы</p>
                        <p class="lead text-22 m-0">{{ $tours ?? '0' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-icon mb-4">
                    <div class="card-body text-center">
                        <x-feathericon-home style="font-size: 32px; color: #f4834a;"/>
                        <p class="text-muted mt-2 mb-2">Достопримечательности</p>
                        <p class="lead text-22 m-0">{{ $tours ?? '0' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-icon mb-4">
                    <div class="card-body text-center">
                        <x-feathericon-truck style="font-size: 32px; color: #f4834a;"/>
                        <p class="text-muted mt-2 mb-2">Базары</p>
                        <p class="lead text-22 m-0">{{ $bazaars ?? '0' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-icon mb-4">
                    <div class="card-body text-center">
                        <x-feathericon-book-open style="font-size: 32px; color: #f4834a;"/>
                        <p class="text-muted mt-2 mb-2">Рестораны</p>
                        <p class="lead text-22 m-0">{{ $restaurants ?? '0' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-icon mb-4">
                    <div class="card-body text-center">
                        <x-feathericon-award style="font-size: 32px; color: #f4834a;"/>
                        <p class="text-muted mt-2 mb-2">Настройка сайта</p>
                        <p class="lead text-22 m-0">{{ $settings ?? '0' }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

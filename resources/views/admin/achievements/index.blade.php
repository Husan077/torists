@extends('layouts.admin')

@section('title')
    Достижении
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Достижении</h1>
            <ul>
                <li><a href="{{ route('achievements.create') }}">Добавить новую достижению</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row m-0 py-3">
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Фото</th>
                                            <th>Иконка</th>
                                            <th>Заголовок</th>
                                            <th>Описание</th>
                                            <th>Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody class="result">
                                        @foreach($achievements as $achievement)
                                            <tr>
                                                <td><img src="{{ asset('storage/' . $achievement->image) }}" style="width: 200px;" /></td>
                                                <td>{{ $achievement->icon }}</td>
                                                <td>{{ $achievement->text_ru }}</td>
                                                <td>{{ $achievement->text_ru }}</td>
                                                <td class="d-flex">
                                                    <a class="text-success mr-2" href="{{ route('achievements.edit', $achievement->id) }}">
                                                        <x-feathericon-edit-2 class="nav-icon font-weight-bold" />
                                                    </a>
                                                    <a data-toggle="modal" data-target="#deletesModal{{$achievement->id}}" class="text-danger mr-2" href="#">
                                                        <x-feathericon-x-circle class="nav-icon font-weight-bold" />
                                                    </a>
                                                    <div class="modal fade" id="deletesModal{{$achievement->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModal">Удалить пост?</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">
                                                                            <b>Вы действительно хотите удалить?</b>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('achievements.destroy', $achievement->id) }}" method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button class="btn btn-danger mr-2 cursor-pointer">Удалить</button>
                                                                    </form>
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Закрыть</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

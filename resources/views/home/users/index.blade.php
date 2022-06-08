@extends('layouts.app')

@section('content')
    <div class="table">
        <div class="create-new"><a href="{{ route('users.create') }}" class="btn">Создать нового</a></div>
        <div class="table-header">
            <div class="header__item">Имя</div>
            <div class="header__item">email</div>
            <div class="header__item">Дата регистрации</div>
            <div class="header__item">Взаимодействие</div>
        </div>
        <div class="table-content">
            @foreach ($users as $user)
                <div class="table-row">
                    <div class="table-data">{{ $user->name }}</div>
                    <div class="table-data">{{ $user->email }}</div>
                    <div class="table-data">{{ $user->created_at }}</div>
                    <div class="table-data">
                        <a href="{{ route('users.edit', $user) }}" class="btn">Редактировать</a>
                        <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

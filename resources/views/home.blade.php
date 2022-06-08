@extends('layouts.app')

@section('content')
    <div class="profile">
        <div class="profile__item">
            <div class="profile__name">Имя</div>
            <div class="profile__value">{{ $user->name  }}</div>
        </div>
        <div class="profile__item">
            <div class="profile__name">Email</div>
            <div class="profile__value">{{ $user->email  }}</div>
        </div>
        <div class="profile__item">
            <div class="profile__name">Роль</div>
            <div class="profile__value">{{ \App\Models\User::TYPES[$user->role_id]  }}</div>
        </div>
        <div class="profile__logout">
            <a href="{{ route('logout') }}" class="btn" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                Выйти
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection

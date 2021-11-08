@extends('layouts.app')
@section('content')
<div class="books">
    @foreach($books as $book)
        <div class="books__item">
            <div class="books__item-image">
                <img src="img/book.jpg" alt="">
            </div>
            <div class="books__item-name">{{ $book->name }}</div>
            <div class="books__item-descript">{{ $book->description }}</div>
            <div class="books__item-buttom"><a href="" class="btn">Подробнее</a></div>
        </div>
    @endforeach
</div>
@endsection

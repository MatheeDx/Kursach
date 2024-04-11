@extends('layout')

@section('title')
    Новый Пост
@endsection

@section('main_content')
    <h2>Новый пост</h2>
    <form action="newPost/create" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Заголовок">
        <textarea style="border-radius: 5px; resize: vertical;" type="text" name="text" id="text" placeholder="Текст статьи"></textarea>
        <button type="submit">Отправить</button>
    </form>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

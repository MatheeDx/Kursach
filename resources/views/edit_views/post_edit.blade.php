@extends('layout')

@section('title')
    Редактировать Пост
@endsection

@section('main_content')
    <h2>Редактировать Пост</h2>
    <form action="proc" method="post">
        @csrf
        <input style="display: none" type="text" name="id" id="" value="{{$title->id}}">
        <input type="text" name="name" id="name" placeholder="Заголовок" value="{{$title->name}}">
        <textarea style="border-radius: 5px; resize: vertical;" type="text" name="text" id="text" placeholder="Текст статьи">{{$title->text}}</textarea>
        <button type="submit">Сохранить</button>
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

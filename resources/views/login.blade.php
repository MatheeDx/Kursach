@extends('layout')

@section('title')
    Страница входа
@endsection

@section('main_content')
    <h2>Вход</h2>
    <form action="login/login" method="post">
        @csrf
        <input type="email" name="email" id="email" placeholder="Почта">
        <input type="password" name="password" id="password" placeholder="Пароль">
        <button type="submit">Войти</button>
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

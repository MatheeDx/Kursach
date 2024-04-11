@extends('layout')

@section('title')
    Страница регистрации
@endsection

@section('main_content')
    <h2>Регистрация</h2>
    <form action="reg/registration" method="post">
        @csrf
        <input type="text" name="login" id="login" placeholder="Логин">
        <input type="email" name="email" id="email" placeholder="Почта">
        <input type="password" name="password" id="password" placeholder="Пароль">
        <input type="password" name="passcheck" id="passcheck" placeholder="Подтверждение пароля">
        <button type="submit">Зарегистрироваться</button>
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

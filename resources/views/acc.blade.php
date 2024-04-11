
@extends('layout')

@section('title')
    Моя страница
@endsection

@section('main_content')
    <h2 style="margin-bottom: 35px; font-size:2em" >{{Auth::user()->login}}</h2>
    <div style="transition: all 1s ease;" id="about" class="about">
        <p style="margin-bottom:45px; font-size: 1.5em; text-align:center;">
        @if (Auth::user()->about != Null)
            {{Auth::user()->about}}
        @else
            Расскажите о себе
        @endif
    </div>
    </p>
    <button class="btn_about a" style="margin: 0 auto; display:block; width: 200px;">Изменить</button>
    <div style="transition: all 1s ease;" id="about_edit" class="about_edit unshow">
        @include('edit_views.about_edit')
    </div>



    <h2 style="margin-bottom: 35px; margin-top: 35px; font-size:2em">Мои статьи</h2>
    {{-- @include('edit_views.post_edit') --}}
    <div class="grid" style="display: grid">
        @foreach ($titles as $item)
            <div style="position: relative" class="el">
                <h3>{{ $item->name }}</h3>
                <h4>Автор: {{ $users::find($item->author_id)->login }}</h4>
                <p>{{ $item->text }}</p>
                <div style="position: absolute; bottom:0; right:0;">
                    <a style="color:black !important;" href="post/delete/{{$item->id}}">удалить</a>
                    <a style="color:black !important;" href="post/edit/{{$item->id}}">редактировать</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

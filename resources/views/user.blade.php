
@extends('layout')

@section('title')
    {{$users->login}}
@endsection

@section('main_content')
    <h2 style="margin-bottom: 35px; font-size:2em" >{{$users->login}}</h2>
    <div style="transition: all 1s ease;" id="about" class="about">
        <p style="margin-bottom:45px; font-size: 1.5em; text-align:center;">
        @if ($users->about != Null)
            {{$users->about}}
        @else
            Здесь пока пусто
        @endif
    </div>
    </p>


    <h2 style="margin-bottom: 35px; margin-top: 35px; font-size:2em">Мои статьи</h2>
    {{-- @include('edit_views.post_edit') --}}
    <div class="grid" style="display: grid">
        @foreach ($titles as $item)
            <div style="position: relative" class="el">
                <h3>{{ $item->name }}</h3>
                <h4>Автор: {{ $users::find($item->author_id)->login }}</h4>
                <p>{{ $item->text }}</p>
                @auth
                    @if ($stars->where('title_id', $item->id)->count())
                    <form action="http://127.0.0.1:8000/unfav/{{$item->id}}" method="get">
                        <button type="submit" href="#" style="position: absolute; bottom:0; right:0;">
                            <svg style=" height: 50px; width:50px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  xml:space="preserve">
                                <desc>Created with Fabric.js 3.6.2</desc>
                                <defs>
                                </defs>

                                <g transform="matrix(0.78 0 0 0.78 200 200)" style="transform: translate(50%, 50%) scale(0.15);">
                                <path style="stroke: rgb(255, 0, 0); stroke-width: 16; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-128, -128)" d="M 128 216 S 28 160 28 92 A 52 52 0 0 1 128 72 h 0 A 52 52 0 0 1 228 92 C 228 160 128 216 128 216 Z" stroke-linecap="round"/>
                                </g>
                            </svg>
                        </button>
                    </form>
                    @else
                    <form  action='http://127.0.0.1:8000/fav/{{$item->id}}' method="get">
                        <button type="submit" href="#" style="position: absolute; bottom:0; right:0;">
                            <svg style=" height: 50px; width:50px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  xml:space="preserve">
                                <desc>Created with Fabric.js 3.6.2</desc>
                                <defs>
                                </defs>

                                <g transform="matrix(0.78 0 0 0.78 200 200)" style="transform: translate(50%, 50%) scale(0.15);">
                                <path style="stroke: rgb(0,0,0); stroke-width: 16; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-128, -128)" d="M 128 216 S 28 160 28 92 A 52 52 0 0 1 128 72 h 0 A 52 52 0 0 1 228 92 C 228 160 128 216 128 216 Z" stroke-linecap="round"/>
                                </g>
                            </svg>
                        </button>
                    </form>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
@endsection

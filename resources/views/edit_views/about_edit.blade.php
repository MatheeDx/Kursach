<form style="margin-bottom: 40px;" action="about_edit" method="post">
        @csrf
        <textarea style="border-radius: 5px; resize: vertical;" type="text" name="text" id="text" placeholder="О себе"></textarea>
        <button type="submit">Сохранить</button>
        <button type="button" class="btn_about">Отменить</button>
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

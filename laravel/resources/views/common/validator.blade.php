@if(count($rrrors))
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$errors->first}}</li>
            @endforeach
    </ul>
@endif
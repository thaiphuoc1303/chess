<div>
    @php
        $i = 1;
    @endphp
    @foreach ($room as $item)
        <a href="{{URL::asset('gaming')}}/{{$item->id}}">
            <h5>{{$i}}: ID: {{$item->id}}</h5>
        </a>
    @endforeach
</div>
<div>
    <a href="{{URL::asset('create-room')}}">Create room</a>
</div>
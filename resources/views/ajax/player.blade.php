<div>
    @if (isset($player))
    <h4 onclick="ajaxprofile({{$player->id}})">
        <b>{{ $player->name }}</b>
    </h4>
    @endif
</div>
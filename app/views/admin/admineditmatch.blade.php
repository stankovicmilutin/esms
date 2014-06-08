@extends("admin/main")

@section("page_title")
Edit Match
@stop

@section("content")
    <div class="row">
        <div class="col-md-12">
                    @if ($match->hostTeam)
                    <a href="{{URL::Route('team', $match->hostTeam->teamID)}}">{{ $match->hostTeam->name }}</a>
                    @else 
                    TBA
                    @endif
                    vs
                    @if ($match->hostTeam)
                    <a href="{{URL::Route('team', $match->hostTeam->teamID)}}">{{ $match->guestTeam->name }}</a>
                    @else 
                    TBA
                    @endif

        </div>
    </div>
@stop
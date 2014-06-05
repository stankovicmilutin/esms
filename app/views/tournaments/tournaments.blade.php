@extends("template/main")

@section("page_title")
Tournaments
@stop

@section("container")
<div class="row">
    <div class="col-md-12">
        @foreach ($tournaments as $t)
        @if ($t->cover)
        <div class="jumbotron tournCover" style="background-image: url({{ asset('uploads') . '/' . $t->cover }});">
        @else
        <div class="jumbotron tournCover">
        @endif
            <h1>Join {{ $t->name}}</h1>
            <p>Teams: {{ $t->max_teams}}</p>
            <p>Prize Money: {{  number_format((int)$t->prizepool, 0, ',', ', ')   }}</p>
            <p>Starting on: {{ date("d. M Y", strtotime($t->starting))}}</p>
            <p><a class="btn btn-primary btn-lg" role="button" href="{{ URL::route('tournament',$t->tournamentID)}}">View Tournament</a>
               @if ($currentPlayer)
                    @if ( $currentPlayer->isCaptain() )
                    <a class="btn btn-success btn-lg" role="button" href="{{ URL::route('tournament',$t->tournamentID)}}">Apply team</a>
                    @endif
                @endif
            </p>
        </div>
        @endforeach


        {{ $tournaments->links() }}
        </div>

</div>
@stop
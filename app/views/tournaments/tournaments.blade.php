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
            <div class="col-md-10"><h1 class="notopmargin">{{ $t->name}}</h1>
                <p>Teams: {{ $t->max_teams }}</p>
                <p>Prize Money: ${{  number_format((int)$t->prizepool, 0, ',', ', ')   }}</p>
                <p>Starting on: {{ date("d. M Y", strtotime($t->starting))}}</p>
                <p><a class="btn btn-primary btn-lg" role="button" href="{{ URL::route('tournament',$t->tournamentID)}}">View Tournament</a>
                </p>
            </div>

            <div class="col-md-2">
                @if ($t->reg_open == 1)
                <p><span class="label label-info">Not started</span></p>
                @elseif ($t->winnerID)
                <p><span class="label label-info">Finished</span></p>
                @else
                <p><span class="label label-info">Playing</span></p>
                @endif    
            </div>
            <div class="clearfix"></div>
        </div>
        @endforeach
        
        {{ $tournaments->links() }}
        </div>

</div>
@stop
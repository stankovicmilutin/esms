@extends("template/main")

@section("page_title")
{{ $tournament->name }}
@stop

@section("container")
<div class="row">
    <div class="col-md-12">
        @if ($tournament->cover)
        <div class="jumbotron tournCover" style="background-image: url({{ asset('uploads') . '/' . $tournament->cover }});">
        @else
        <div class="jumbotron tournCover">
        @endif
            <h1>{{ $tournament->name}}</h1>
            <p>Teams: {{ $tournament->max_teams }}</p>
            <p>Prize Money: ${{  number_format((int)$tournament->prizepool, 0, ',', ', ')   }}</p>
            <p>Starting on: {{ date("d. M Y", strtotime($tournament->starting))}}</p>
        </div>
        <div class="well">
            <h2 class="notopmargin">Standings</h2>

            <div class="tournamentPlayoff">
                <div class="panel panel-default matchBox">
                    <div class="panel-heading">Group A</div>
                    <div class="panel-body">
                        Team_1
                        Team_2
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
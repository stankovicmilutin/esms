@extends("admin/main")

@section("page_title")
All Tournaments
@stop

@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="well">
            <h2 class="notopmargin">All Tournaments</h2>
        </div>

        @foreach ($tournaments as $t)
        <div class="jumbotron tournCover" style="background-image: url('img/tourbg1.jpg');">
            <h1>{{ $t->name}}</h1>
            <p>Teams: {{$t->max_teams}}</p>
            <p>Prize Money: {{$t->prizepool}}</p>
            <p>Starting: {{ date("d. M Y", strtotime($t->starting))}}</p>
            <p><a class="btn btn-primary btn-lg" role="button">View Tournament</a></p>
        </div>
        @endforeach

    </div>
</div>


@stop
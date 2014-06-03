@extends("template/main")

@section("page_title")
Teams
@stop

@section("container")
<div class="row">
    <div class="col-md-12">
        <div id="teamHistory" class="well">
            <h2 class="notopmargin">All Teams</h2>
            <div class="spacer30"></div>
            <table class="table table-hover esmsTable">
                <tr><th>Tag</th><th>Team name</th><th>Won</th><th>Lost</th><th>Win Rate</th></tr>
                
                @foreach ($teams as $team)
                <tr>
                    <td><a href="{{ URL::route('team',$team->teamID) }}">[{{ $team->tag }}]</a></td>
                    <td><a href="{{ URL::route('team',$team->teamID) }}">{{ $team->name }}</a></td>
                    <td class="text-success">100</td>
                    <td class="text-danger">30</td>
                    <td>80%</td>
                </tr>
                @endforeach
                
            </table>

            {{ $teams->links() }}
            
        </div>

    </div>
</div>
@stop
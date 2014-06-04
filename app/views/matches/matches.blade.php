@extends("template/main")

@section("page_title")
Matches
@stop

@section("container")
<div class="row">
    <div class="col-md-12">
        <div id="teamHistory" class="well">
            <h2 class="notopmargin">All Matches</h2>
            <div class="spacer30"></div>
            <table class="table table-hover esmsTable">
                <tr><th>Teams</th><th>Tournament</th><th>Series</th><th>Date</th><th></th></tr>
                @foreach ($matches as $match)
                <?php $match->loadData(); ?>
                 <tr>
                    <td><a href="#">{{ $match->host->name }}</a> vs <a href="#">{{  $match->guest->name }}</a></td>
                    <td>{{ $match->tournament->name}}</td>
                    <td>{{ $match->tournament_phase }}</td>
                    <td>{{ $match->time }}</td>
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                @endforeach
            </table>


             {{ $matches->links() }}
        </div>

    </div>
</div>
@stop
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{route('route.create-fixture')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Create Fixture</button>
            </form>
        </div>
        <div class="mt-5"></div>
    </div>
    <div class="row">
        <div class="col-5">
            <h2>League Table</h2>
            <table class="table table-sm table-bordered text-center" style="font-size:12px">
                <thead>
                <tr>
                    <th scope="col">Rank</th>
                    <th scope="col">Teams</th>
                    <th scope="col">Played</th>
                    <th scope="col">Won</th>
                    <th scope="col">Drawn</th>
                    <th scope="col">Lost</th>
                    <th scope="col">GF</th>
                    <th scope="col">GA</th>
                    <th scope="col">GD</th>
                    <th scope="col">Points</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams->sortByDesc('points') as $key => $team)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$team->name}}</td>
                        <td>{{$team->played}}</td>
                        <td>{{$team->won}}</td>
                        <td>{{$team->drawn}}</td>
                        <td>{{$team->lost}}</td>
                        <td>{{$team->goal_for}}</td>
                        <td>{{$team->goal_against}}</td>
                        <td>{{$team->goal_difference}}</td>
                        <td>{{$team->points}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{route('route.play-all')}}" class="btn btn-primary btn-sm float-left">Play All</a>

            @if(request()->week <= 6)
                <a href="{{route('route.play-week')}}?week={{request()->week+1}}"
                   class="btn btn-primary btn-sm float-right">Next
                    Week</a>
            @endif
        </div>
        <div class="col-7">
            <h2> {{$week}}" Week Match</h2>
            <table class="table table-sm table-bordered text-center" style="font-size:12px">
                <thead>
                <td>Home Team</td>
                <td>Score</td>
                <td>Away Team</td>
                </thead>
                @foreach($weekFixtures as $weekFixture)
                    <tr>
                        <td>{{$weekFixture->homeTeam->name}} </td>
                        <td>
                            @if(isset($weekFixture->resultMatch->away_goal) && isset($weekFixture->resultMatch->home_goal) )
                                {{$weekFixture->resultMatch->home_goal}} - {{$weekFixture->resultMatch->away_goal}}
                            @else
                                No Played
                            @endif</td>
                        <td>{{$weekFixture->awayTeam->name}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h2> Fixture</h2>
            @if($fixtures->count() == 0)
                No data
            @else
                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th scope="col">Week</th>
                        <th scope="col">Home Team</th>
                        <th scope="col">Score</th>
                        <th scope="col">Away Team</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fixtures as $fixture)
                        <tr>
                            <td>{{$fixture->league_week}}</td>
                            <td>{{$fixture->homeTeam->name}} </td>
                            <td>
                                @if(isset($fixture->resultMatch->away_goal) && isset($fixture->resultMatch->home_goal) )

                                    {{$fixture->resultMatch->home_goal}} - {{$fixture->resultMatch->away_goal}}
                                @else
                                    No Played
                                @endif
                            </td>
                            <td>{{$fixture->awayTeam->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection

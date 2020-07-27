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
        <div class="col-7">
            <h2> Fixture</h2>
            @if($fixtures->count() == 0)
                No data
            @else
                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th scope="col">Week</th>
                        <th scope="col">Home Team</th>
                        <th scope="col">Away Team</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fixtures as $fixture)
                        <tr>
                            <td>{{$fixture->league_week}}</td>
                            <td>{{$fixture->homeTeam->name}}</td>
                            <td>{{$fixture->awayTeam->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="col-5">
            <h2>League Table</h2>
            <table class="table table-sm table-bordered text-center" style="font-size:12px">
                <thead>
                <tr>
                    <th scope="col">Rank</th>
                    <th scope="col">Teams</th>
                    <th scope="col">OM</th>
                    <th scope="col">G</th>
                    <th scope="col">B</th>
                    <th scope="col">M</th>
                    <th scope="col">AG</th>
                    <th scope="col">YG</th>
                    <th scope="col">A</th>
                    <th scope="col">P</th>

                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$team->name}}</td>
                    <td>10</td>
                    <td>2</td>
                    <td>4</td>
                    <td>7</td>
                    <td>9</td>
                    <td>7</td>
                    <td>12</td>
                    <td>30</td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection

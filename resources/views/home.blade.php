@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Team Home Page</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<h2>Upcoming Games</h2>
							<table class="table table-striped">
								@foreach($games as $game)
								<tr>
									<td>{{ date("m/d/Y ",strtotime($game->game_date)) }} 
									<br>
									{{ date("h:i A",strtotime($game->game_time)) }}
									</td>
									<td>{{ $game->team2_name }}</td>
									<td><a href="games/{{$game->id}}">Game Roster</a></td>
	 							</tr>
								@endforeach
							</table>
						</div>
						<div class="col-md-6">
							<h2>FireAntz Players</h2>
							<table class="table table-striped">
								@foreach($players as $player)
								<tr>
									<td>{{$player->name}}</td>
	 							</tr>
								@endforeach
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-heading"> {{$game->team2_name}} </div>
				<div class="panel-body">
					Game Time: {{ date("m/d/Y ",strtotime($game->game_date)) }} {{ date("h:i A",strtotime($game->game_time)) }}
					<div class="row">
						<div class="col-md-6">
							<h3>Playing</h3>
							<table class="table table-striped">
								<tr>
									<td>
										<form method="POST" action="/signup/{{$game->id}}/{{1}}" accept-charset="UTF-8">
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
											<input class="btn btn-primary" type="submit" value="Play Game">
										</form>
									</td>	
								</tr>
								@foreach($players as $player)
									<tr>
										<td>
											{{$player->name}}
										</td>
									</tr>
								@endforeach
							</table>
						</div>
						<div class="col-md-6">
							<h3>Bench</h3>
							<table class="table table-striped">
								<tr>
									<td>
										<form method="POST" action="/signup/{{$game->id}}/{{0}}" accept-charset="UTF-8">
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
											<input class="btn btn-primary" type="submit" value="Sit Game">
										</form>
									</td>
									@foreach($sitting as $sit)
									<tr>
										<td>
											{{$sit->name}}
										</td>
									</tr>
									@endforeach
									
								</tr>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
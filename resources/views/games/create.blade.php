@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Add a Game </div>
				<div class="panel-body">
					
					<form method="POST" action="/games" accept-charset="UTF-8">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						
						<div class="form-group">
					        <label for="team2_name">Other Team Name:</label>
					        <input class="form-control" required="required" name="team2_name" type="text">        
						</div>

						<div class="form-group">
					        <label for="game_date">Game Date:</label>
					        <input class="form-control" required="required" name="game_date" type="date">
						</div>

						<div class="form-group">
					        <label for="game_time">Game Time:</label>
					        <input class="form-control" required="required" name="game_time" type="time">
						</div>
						
						<div class="form-group">
					        <input class="btn btn-primary" type="submit" value="Add Game">
						</div>					  
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

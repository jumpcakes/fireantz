<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Request;
use App\Game;
use Auth;

class GamesController extends Controller {


	public function __construct() {
		$this->middleware('captain');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$games = Game::all();
		Game::create(['team2_name'=>'bad guys','game_date'=>'12:00','game_time'=>'11']);
		Game::destroy(1);
		return $games;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('games/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Request::all();
		DB::table('games')->insert(['team2_name'=>$input['team2_name'],'game_date'=>$input['game_date'],'game_time'=>$input['game_time']]);
		return redirect('games/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$sitting = DB::table('game_user')->where('playing',0)->where('game_id',$id)->join('users','game_user.user_id','=','users.id')->get();
		$game = Game::findOrFail($id);
		$players = $game->playing;
		return view('games.show',['game'=>$game,'players'=>$players,'sitting'=>$sitting]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function signup($id,$playing)
	{
		$player_id = Auth::user()->id;
		DB::table('game_user')->insert(['game_id'=>$id,'user_id'=>$player_id,'playing'=>$playing]);
		\Session::flash('flash_message','Your selection has been made');
		return redirect('games/'.$id);
	}

}

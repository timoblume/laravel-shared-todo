<?php

namespace Blog\Http\Controllers;

use DB;
use Auth;
use Blog\Item;
use Validator;
use Illuminate\Http\Request;
use Blog\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;



class HomeController extends Controller{
	
	public function createItem(Request $request){
		$userId = Auth::user()->id;
		
		$item = Item::create([
			'description' => $request->item,
			'owner' => $userId,
			'points' => $request->points,
			]);
		$item->save();
		return redirect('/');
	}

	public function toggleItems(Request $request){

		$userId = Auth::user()->id;

		$id = $request->input('id');
		$item = Item::findOrFail($id);
		$item->mark();
		
		return redirect('/');

	}

	public function deleteDone(){
		$points = 0;
		$userId = Auth::user()->id;

		$items = DB::table('items')->where('done', '=', 1)->get();

		foreach($items as $item){
			$points += $item->points;
		}

		DB::table('items')->where('done', '=', 1)->delete();

		DB::table('users')->where('id', '=', $userId)->increment('points', $points);
		return redirect('/');
	}

}


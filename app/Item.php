<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;


class Item extends Model{
	protected $fillable = array('description', 'done', 'owner', 'points');
	protected $table = 'items';

	public function mark(){
		$this->done = $this->done ? false : true;
		$this->save();

	}

}
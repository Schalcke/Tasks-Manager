<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Post extends Model
{
  protected $fillable = ['titre','contenu','user_id'];

	public function user()
	{
		return $this->belongsTo('App\User');

    $id = Auth::id();
	}
}

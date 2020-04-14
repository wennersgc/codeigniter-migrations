<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class Artigos extends Model
{
	protected $table = 'artigos';

	public function autor()
	{
		return $this->belongsTo(Autores::class);
	}
}

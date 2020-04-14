<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
	protected $table = 'autores';

	public function artigos()
	{
		return $this->hasMany('Artigos');
	}
}

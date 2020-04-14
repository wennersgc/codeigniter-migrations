<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;

class Migration_Create_artigo extends CI_Migration
{
	private $table = 'artigos';

    	public function up()
    	{
    	   Capsule::schema()->create($this->table, function ($table){
    	   		$table->bigIncrements('id');
    	   		$table->string('titulo');
    	   		$table->longText('artigo');
    	   		$table->bigInteger('autor_id')->unsigned();
    	   		$table->timestamps();
    	   		$table->foreign('autor_id')->references('id')->on('autores');
    	   });
        }

    	public function down()
    	{
    	    Capsule::schema()->drop($this->table);
        }
}


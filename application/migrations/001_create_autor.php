<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;

class Migration_Create_autor extends CI_Migration
{
	private $table = 'autores';
	public function up()
	{
	   Capsule::schema()->create($this->table, function ($table){
	   		$table->bigincrements('id');
	   		$table->string('nome');
	   		$table->timestamps();
	   });
    }
    
	public function down()
	{

	    Capsule::schema()->drop($this->table);
    }
}
/* End of file '001_create_autor' */
/* Location: .//var/www/html/migrations/application/migrations/001_create_autor.php */

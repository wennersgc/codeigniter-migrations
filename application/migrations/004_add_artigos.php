<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_artigos extends CI_Migration
{

	private $table = 'artigos';

	public function __construct()
	{
		$this->load->dbforge();
	}

	public function up()
	{
		$this->dbforge->add_field(array(
			'artigo_id' => array(
				'type' => 'int',
				'constraint' => '11',
				'unsigned' => true,
				'autoincrement' => true
			),

			'titulo' => array(
				'type' => 'varchar',
				'constraint' => 255,
			),

			'corpo_artigo' => array(
				'type' => 'text'
			)

		));

		$this->dbforge->add_key('artigo_id', true);
		$this->dbforge->create_table($this->table);

	}

	public function down()
	{
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file .php */

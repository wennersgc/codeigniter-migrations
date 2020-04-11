<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_endereco extends CI_Migration
{
	private $table = 'endereco';

	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
		$this->load->helper('db_helper');
	}

	public function up()
	{
		$this->dbforge->add_field(array(
			'endereco_id' => array(
				'type' => 'int',
				'constraint' => 5,
				'unsigned' => true,
				'autoincrement' => true
			),

			'rua' => array(
				'type' => 'varchar',
				'constraint' => '100',
			),

			'numero' => array(
				'type' => 'INT',
				'unsigned' => true,
				'null' => true
			),

			'bairro' => array(
				'type' => 'varchar',
				'constraint' => '120'
			),

			'cidade' => array(
				'type' => 'varchar',
				'constraint' => '120'
			),

			'estado' => array(
				'type' => 'varchar',
				'constraint' => '2'
			),

			'autor_id'=> array(
				'type' => 'int',
				'constraint' => 5,
				'unsigned' => true
			)
		));

		$this->dbforge->add_key('endereco_id', true);
		$this->dbforge->create_table($this->table);
	}

	public function down()
	{
		$this->db->query(drop_foreign_key($this->table, 'autor_id'));
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file .php */

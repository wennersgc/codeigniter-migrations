<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_autor_artigos extends CI_Migration
{
	private $table = 'autor_artigos';

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->helper('db_helper');
	}

	public function up()
	{
		$fields =  array(
			'autor_artigos_id' => array(
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			),

			'autor_id' => array(
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
			),

			'artigo_id' => array(
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true
			)

		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('autor_artigos_id');
		$this->dbforge->create_table($this->table);

		$this->db->query(add_foreign_key($this->table, 'artigo_id', 'artigos(artigo_id)', 'CASCADE', 'CASCADE'));
		$this->db->query(add_foreign_key($this->table, 'autor_id', 'autor(autor_id)', 'CASCADE', 'CASCADE'));
	}

	public function down()
	{
		$this->db->query(drop_foreign_key($this->table, 'autor_artigos_id'));
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file .php */

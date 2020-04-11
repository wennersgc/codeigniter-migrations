<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_autor extends CI_Migration
{
	private $table = 'autor';

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->helper('db_helper');
	}

	public function up()
	{
		$this->dbforge->add_field(array(
			'autor_id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'autor_nome' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'blog_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE
			)
		));

		$this->dbforge->add_key('autor_id', true);
		$this->dbforge->create_table($this->table);
		$this->db->query (add_foreign_key($this->table, 'blog_id', 'blog(blog_id)', 'CASCADE', 'CASCADE'));
	}

	public function down()
	{
		$this->db->query(drop_foreign_key($this->table, 'blog_id'));
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file .php */

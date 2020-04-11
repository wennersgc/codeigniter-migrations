<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->input->is_cli_request() )
		{
			show_error('Sem permissão para executar essa ação');
			return;
		}
		$this->load->library('migration');
	}


	public function do_migration($version = NULL)
	{
		$this->load->library('migration');

		if(isset($version) && ($this->migration->version($version) === FALSE))
		{
			show_error($this->migration->error_string());
		}

		elseif(is_null($version) && $this->migration->latest() === FALSE)
		{
			show_error($this->migration->error_string());
		}

		else
		{
			echo 'Migração realizado com sucesso' . PHP_EOL;
		}
	}

	public function undo_migration($version = NULL)
	{
		$this->load->library('migration');
		$migrations = $this->migration->find_migrations();
		$migration_keys = array();
		foreach($migrations as $key => $migration)
		{
			$migration_keys[] = $key;
		}
		if(isset($version) && array_key_exists($version,$migrations) && $this->migration->version($version))
		{
			echo 'A migração foi redefinida para a versão: '.$version . PHP_EOL;
			exit;
		}
		elseif(isset($version) && !array_key_exists($version,$migrations))
		{
			echo 'A migração com o número da versão '.$version.' não existe.' . PHP_EOL;
		}
		else
		{
			$penultimate = (sizeof($migration_keys)==1) ? 0 : $migration_keys[sizeof($migration_keys) - 2];
			if($this->migration->version($penultimate))
			{
				echo 'A migração foi revertida com sucesso.' . PHP_EOL;
				exit;
			}
			else
			{
				echo 'Não foi possível reverter a migração.' . PHP_EOL;
				exit;
			}
		}
	}

	public function reset_migration()
	{
		$this->load->library('migration');
		if($this->migration->current()!== FALSE)
		{
			echo 'A migração foi redefinida para a versão definida no arquivo de configuração.' . PHP_EOL;
			return TRUE;
		}
		else
		{
			echo 'Não foi possível redefinir a migração.' . PHP_EOL;
			show_error($this->migration->error_string());
			exit;
		}
	}
}

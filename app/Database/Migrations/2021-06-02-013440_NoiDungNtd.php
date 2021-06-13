<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NoiDungNtd extends Migration
{
	protected $DBGroup = 'default';
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'id_ntd'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_contentcmt'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
		
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('noidungNTD');
	}

	public function down()
	{
		$this->forge->dropTable('noidungNTD');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Criteria extends Migration
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
			'id_role'=>[
				'type'=>'INT',
				'constraint'=>11
			],
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('criteria');
	}

	public function down()
	{
		$this->forge->dropTable('criteria');
	}
}

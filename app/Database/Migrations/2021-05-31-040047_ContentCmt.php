<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContentCmt extends Migration
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
			'tieuchi'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'parentid'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'created_at datetime',
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('contentCmt');
	}

	public function down()
	{
		$this->forge->dropTable('contentCmt');
	}
}

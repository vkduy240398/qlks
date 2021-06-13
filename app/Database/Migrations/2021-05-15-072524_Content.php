<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Content extends Migration
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
			'id_criteria'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'content'=>[
				'type'=>'TEXT',
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('content');
	}

	public function down()
	{
		$this->forge->dropTable('content');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Yeuto extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('yeuto');
	}

	public function down()
	{
		$this->forge->dropTable('yeuto');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Phamvi extends Migration
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
		$this->forge->createTable('phamvi');
	}

	public function down()
	{
		$this->forge->dropTable('phamvi');
	}
}

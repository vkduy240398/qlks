<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Age extends Migration
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
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'publish'=>[
				'type'=>'tinyint',
				'constraint'=>1,
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('age');
	}

	public function down()
	{
		$this->forge->dropTable('age');
	}
}

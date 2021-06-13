<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InfoSv extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'hoten'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'gioitinh'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'chuyennganh'=>[
				'type'=>'varchar',
				'constraint'=>255,
			],
			'diachi'=>[
				'type'=>'varchar',
				'constraint'=>255,
			],
			'email'=>[
				'type'=>'varchar',
				'constraint'=>255,
			],
			'start'=>[
				'type'=>'date',
			],
			'end'=>[
				'type'=>'date',
			],
			'y_kien'=>[
				'type'=>'TEXT',
			],				
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('info_sv');
	}

	public function down()
	{
		$this->forge->dropTable('info_sv');
	}
}

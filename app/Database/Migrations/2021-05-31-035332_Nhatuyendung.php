<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nhatuyendung extends Migration
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
			'hoten'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'chucvu'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'tencoquan'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'diachi'=>[
				'type'=>'varchar',
				'constraint'=>11,
			],
			'sodienthoai'=>[
				'type'=>'varchar',
				'constraint'=>11,
			],
			'email'=>[
				'type'=>'varchar',
				'constraint'=>11,
			],		
			'created_at datetime',
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('nhatuyendung');
	}

	public function down()
	{
		$this->forge->dropTable('nhatuyendung');
	}
}

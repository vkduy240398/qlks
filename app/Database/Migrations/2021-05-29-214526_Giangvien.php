<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Giangvien extends Migration
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
			'fullname'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'gender'=>[
				'type'=>'VARCHAR',
				'constraint'=>11,
			],
			'id_level'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_age'=>[
				'type'=>'INT',
				'constraint'=>11,
			],		
			'date_cmt'=>[
				'type'=>'date',
			],
		
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('giangvien');
	}

	public function down()
	{
		$this->forge->dropTable('giangvien');
	}
}

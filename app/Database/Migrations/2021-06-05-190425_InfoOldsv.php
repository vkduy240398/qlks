<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InfoOldsv extends Migration
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
			'gioitinh'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'ngaysinh'=>[
				'type'=>'date',
			],
			'chuyennganh'=>[
				'type'=>'varchar',
				'constraint'=>255,
			],
			'tencoquan'=>[
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
			'thunhap'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_lhcoquan'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_chuyenmon'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_yeuto'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_mucdo'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_nguyennhan'=>[
				'type'=>'INT',
				'constraint'=>11,
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
		$this->forge->createTable('info_oldsv');
	}

	public function down()
	{
		$this->forge->dropTable('info_oldsv');
	}
}

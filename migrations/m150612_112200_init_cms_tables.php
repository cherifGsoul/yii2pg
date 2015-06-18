<?php

use yii\db\Schema;
use yii\db\Migration;

class m150612_112200_init_cms_tables extends Migration
{  

    public function safeUp()
    {
        $tableOptions = null;
        
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%node}}',[
           'id'=>Schema::TYPE_PK,
           'guid'=>Schema::TYPE_STRING,
           'title'=>Schema::TYPE_STRING . ' NOT NULL',
           'content'=>Schema::TYPE_TEXT,
           'excerpt'=>Schema::TYPE_TEXT,
           'type'=>Schema::TYPE_STRING . ' NOT NULL',
           'slug'=>Schema::TYPE_STRING . ' NOT NULL' ,
           'root'=>Schema::TYPE_INTEGER,
           'lft'=>Schema::TYPE_INTEGER . ' NOT NULL',
           'rgt'=>Schema::TYPE_INTEGER . ' NOT NULL',
           'level'=>Schema::TYPE_INTEGER . ' NOT NULL',
           'mime_type'=>Schema::TYPE_STRING,
           'menu_order'=>Schema::TYPE_INTEGER,
           'status'=>Schema::TYPE_INTEGER,
           'created_at'=>Schema::TYPE_DATETIME,
           'updated_at'=>Schema::TYPE_DATETIME,
           'created_by'=>Schema::TYPE_INTEGER,
           'updated_by'=>Schema::TYPE_INTEGER,
           'comment_count'=>Schema::TYPE_INTEGER,
        ],$tableOptions);
        
        $this->createTable('{{%node_field}}',[
           'id'=>Schema::TYPE_INTEGER,
           'name'=>Schema::TYPE_STRING,
           'value'=>Schema::TYPE_STRING,
           'node_id'=>Schema::TYPE_INTEGER,
           'created_at'=>Schema::TYPE_DATETIME,
           'updated_at'=>Schema::TYPE_DATETIME,
           'created_by'=>Schema::TYPE_INTEGER,
           'updated_by'=>Schema::TYPE_INTEGER,
        ],$tableOptions);
        
        $this->createTable('{{%user}}',[
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ],$tableOptions);
        
        $this->createTable('{{%taxonomy}}',[
            'id'=>Schema::TYPE_PK,
             'guid'=>Schema::TYPE_STRING,
             'title'=>Schema::TYPE_STRING . ' NOT NULL',
             'description'=>Schema::TYPE_TEXT,
             'type'=>Schema::TYPE_STRING,
             'slug'=>Schema::TYPE_STRING,
             'root'=>Schema::TYPE_INTEGER,
             'lft'=>Schema::TYPE_INTEGER . ' NOT NULL',
             'rgt'=>Schema::TYPE_INTEGER . ' NOT NULL',
             'level'=>Schema::TYPE_INTEGER . ' NOT NULL',
             'created_at'=>Schema::TYPE_DATETIME,
             'updated_at'=>Schema::TYPE_DATETIME,
             'created_by'=>Schema::TYPE_INTEGER,
             'updated_by'=>Schema::TYPE_INTEGER
        ],$tableOptions);
        
        $this->createTable('{{%comment}}',[
            'id'=>Schema::TYPE_PK,
            'node_id'=>Schema::TYPE_INTEGER,
            'content'=>Schema::TYPE_TEXT,
            'author_name'=>Schema::TYPE_STRING,
            'author_email'=>Schema::TYPE_STRING,
            'author_url'=>Schema::TYPE_STRING,
            'approved'=>Schema::TYPE_SMALLINT,
            'author_id'=>Schema::TYPE_INTEGER
        ],$tableOptions);
        
        $this->createTable('{{%option}}',[
            'id'=>Schema::TYPE_PK,
            'name'=>Schema::TYPE_STRING,
            'value'=>Schema::TYPE_STRING,
            'created_at'=>Schema::TYPE_DATETIME,
            'updated_at'=>Schema::TYPE_DATETIME        
        ],$tableOptions);
        
        $this->createTable('{{%node_taxonomy}}',[
            'id'=>Schema::TYPE_PK,
            'node_id'=>Schema::TYPE_INTEGER,
            'taxonomy_id'=>Schema::TYPE_INTEGER
        ],$tableOptions);
        
        
        $this->createIndex('nodeGuidIdx','{{%node}}','guid');
        $this->createIndex('nodeRootIdx','{{%node}}','root');
        $this->createIndex('nodeLftIdx','{{%node}}','lft');
        $this->createIndex('nodeRgtIdx','{{%node}}','rgt');
        $this->createIndex('nodeLevelIdx','{{%node}}','level');
        $this->createIndex('nodeTypeIdx','{{%node}}','type');
        
        $this->createIndex('taxoGuidIdx','{{%taxonomy}}','guid');
        $this->createIndex('taxoRootIdx','{{%taxonomy}}','root');
        $this->createIndex('taxoLftIdx','{{%taxonomy}}','lft');
        $this->createIndex('taxoRgtIdx','{{%taxonomy}}','rgt');
        $this->createIndex('taxoLevelIdx','{{%taxonomy}}','level');
        $this->createIndex('taxoTypeIdx','{{%taxonomy}}','type');
        
        $this->addForeignKey('Field_Node_Fk', '{{%node_field}}', 'node_id', '{{%node}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('Comment_Node_Fk', '{{%comment}}', 'node_id', '{{%node}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('Node_Taxonomy_Node_Fk', '{{%node_taxonomy}}', 'node_id', '{{%node}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('Node_Taxonomy_Taxonomy_Fk', '{{%node_taxonomy}}', 'taxonomy_id', '{{%taxonomy}}', 'id', 'CASCADE', 'CASCADE');
    }
    
    public function safeDown()
    {
    }
}

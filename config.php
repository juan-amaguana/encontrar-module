<?php
use \Illuminate\Database\Schema\Blueprint;
use \Illuminate\Support\Facades\Schema;

$config = array();
$config['name'] = "Encontrar Web Module";
$config['link'] = "https://github.com/";
$config['description'] = "The best module ever!";
$config['author'] = "Juan Amaguaña";
$config['ui'] = false; //you can drop this module in live edit
$config['ui_admin_iframe'] = true;
$config['ui_admin'] = true; //your module is visible in the admin

$config['categories'] = "content";

$config['position'] = "98";
$config['version'] = "0.01";

$config['tables'] = function () {
    if (!Schema::hasTable('enc_categories')) {
        Schema::create('enc_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('parent')->unsigned();
            $table->integer('type')->unsigned(); // 1 (Area tematica), 2 (problemas)
            $table->timestamps();
            $table->index('parent');
            // $table->index(['table_name', 'row_id']);
        });
    }
};
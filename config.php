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
            $table->integer('parent')->nullable();
            $table->integer('type')->unsigned(); // 1 (Area tematica), 2 (problemas)
            $table->integer('position')->unsigned();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->index('parent');
            // $table->index(['table_name', 'row_id']);
        });
    }

    if (!Schema::hasTable('enc_countries')) {
        Schema::create('enc_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('detail', 100);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }
        
    if (!Schema::hasTable('ecn_category_filters')) {
        Schema::create('ecn_category_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('parent')->nullable();
            $table->integer('country_id')->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('enc_categories');
            $table->foreign('parent')->references('id')->on('ecn_category_filters');
            $table->foreign('country_id')->references('id')->on('enc_countries');
        });
    }

    if (!Schema::hasTable('enc_items')) {
        Schema::create('enc_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->longText('abstract');
            $table->json('indicators');
            $table->json('context');
            $table->json('geographical_context');
            $table->json('practices');
            $table->json('challenges');
            $table->json('investments');
            $table->json('sources');
            $table->json('contacts');
            $table->integer('status')->default(1);;
            $table->timestamps();
            $table->index('title');
        });
    }

    if (!Schema::hasTable('ecn_item_categories')) {
        Schema::create('ecn_item_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->integer('category_filter_id')->unsigned();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('enc_items');
            $table->foreign('category_filter_id')->references('id')->on('ecn_category_filters');
        });
    }
};
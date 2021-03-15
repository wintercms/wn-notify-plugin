<?php namespace Winter\Notify\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateConditionsRulesTable extends Migration
{
    public function up()
    {
        Schema::create('winter_notify_rule_conditions', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('class_name')->nullable();
            $table->mediumText('config_data')->nullable();
            $table->string('condition_control_type', 100)->nullable();
            $table->string('rule_host_type', 100)->nullable();
            $table->integer('rule_host_id')->unsigned()->nullable()->index();
            $table->integer('rule_parent_id')->unsigned()->nullable()->index();
            $table->index(['rule_host_id', 'rule_host_type'], 'host_rule_id_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('winter_notify_rule_conditions');
    }
}

<?php namespace Winter\Notify\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('winter_notify_notifications', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('event_type');
            $table->morphs('notifiable');
            $table->string('icon')->nullable();
            $table->string('type')->nullable();
            $table->text('body')->nullable();
            $table->mediumText('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('winter_notify_notifications');
    }
}

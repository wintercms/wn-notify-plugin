<?php namespace Winter\Notify\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class RenameTables extends Migration
{
    const TABLES = [
        'notifications',
        'notification_rules',
        'rule_actions',
        'rule_conditions',
    ];

    public function up()
    {
        foreach (self::TABLES as $table) {
            $from = 'rainlab_notify_' . $table;
            $to   = 'winter_notify_' . $table;
            if (Schema::hasTable($from)) {
                Schema::rename($from, $to);
            }
        }
    }

    public function down()
    {
        foreach (self::TABLES as $table) {
            $from = 'winter_notify_' . $table;
            $to   = 'rainlab_notify_' . $table;
            if (Schema::hasTable($from)) {
                Schema::rename($from, $to);
            }
        }
    }
}

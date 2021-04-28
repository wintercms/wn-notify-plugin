<?php namespace Winter\Notify\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class RenameIndexes extends Migration
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
            $to = 'winter_notify_' . $table;

            $this->updateIndexNames($from, $to, $to);
        }
    }

    public function down()
    {
        foreach (self::TABLES as $table) {
            $from = 'winter_notify_' . $table;
            $to = 'rainlab_notify_' . $table;

            $this->updateIndexNames($from, $to, $from);
        }
    }

    public function updateIndexNames($from, $to, $table)
    {
        $sm = Schema::getConnection()->getDoctrineSchemaManager();

        $table = $sm->listTableDetails($table);

        foreach ($table->getIndexes() as $index) {
            if ($index->isPrimary()) {
                continue;
            }

            $old = $index->getName();
            $new = str_replace($from, $to, $old);

            $table->renameIndex($old, $new);
        }
    }
}

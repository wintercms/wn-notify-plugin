<?php namespace Winter\Notify;

use Backend;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */
class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'winter.notify::lang.plugin.name',
            'description' => 'winter.notify::lang.plugin.description',
            'author'      => 'Alexey Bobkov, Samuel Georges',
            'icon'        => 'icon-bullhorn'
        ];
    }

    public function registerSettings()
    {
        return [
            'notifications' => [
                'label'       => 'winter.notify::lang.notifications.menu_label',
                'description' => 'winter.notify::lang.notifications.menu_description',
                'category'    => SettingsManager::CATEGORY_NOTIFICATIONS,
                'icon'        => 'icon-bullhorn',
                'url'         => Backend::url('winter/notify/notifications'),
                'permissions' => ['winter.notify.manage_notifications'],
                'order'       => 600
            ],
        ];
    }

    public function registerNotificationRules()
    {
        return [
            'groups' => [],
            'events' => [],
            'actions' => [
                \Winter\Notify\NotifyRules\SaveDatabaseAction::class,
                \Winter\Notify\NotifyRules\SendMailTemplateAction::class,
            ],
            'conditions' => [
                \Winter\Notify\NotifyRules\ExecutionContextCondition::class,
            ],
        ];
    }

    public function registerPermissions()
    {
        return [
            'winter.notify.manage_notifications' => [
                'tab' => SettingsManager::CATEGORY_NOTIFICATIONS,
                'label' => 'winter.notify::lang.permissions.manage_notifications'
            ],
        ];
    }
}

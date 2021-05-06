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
            'author'      => 'Winter CMS',
            'icon'        => 'icon-bullhorn',
            'replaces'    => ['RainLab.Notify' => '<= 1.0.3'],
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
    public function registerClassAliases()
    {
        /**
         * To allow compatibility with plugins that extend the original RainLab.Notify plugin,
         * this will alias those classes to use the new Winter.Notify classes.
         */
        $aliases = [
            \Winter\Notify\Plugin::class                                 => \RainLab\Notify\Plugin::class,
            \Winter\Notify\Classes\ConditionBase::class                  => \RainLab\Notify\Classes\ConditionBase::class,
            \Winter\Notify\Classes\EventBase::class                      => \RainLab\Notify\Classes\EventBase::class,
            \Winter\Notify\Classes\Notifier::class                       => \RainLab\Notify\Classes\Notifier::class,
            \Winter\Notify\Classes\CompoundCondition::class              => \RainLab\Notify\Classes\CompoundCondition::class,
            \Winter\Notify\Classes\EventParams::class                    => \RainLab\Notify\Classes\EventParams::class,
            \Winter\Notify\Classes\ActionBase::class                     => \RainLab\Notify\Classes\ActionBase::class,
            \Winter\Notify\Classes\ModelAttributesConditionBase::class   => \RainLab\Notify\Classes\ModelAttributesConditionBase::class,
            \Winter\Notify\Controllers\Notifications::class              => \RainLab\Notify\Controllers\Notifications::class,
            \Winter\Notify\FormWidgets\ActionBuilder::class              => \RainLab\Notify\FormWidgets\ActionBuilder::class,
            \Winter\Notify\FormWidgets\ConditionBuilder::class           => \RainLab\Notify\FormWidgets\ConditionBuilder::class,
            \Winter\Notify\Models\Notification::class                    => \RainLab\Notify\Models\Notification::class,
            \Winter\Notify\Models\RuleCondition::class                   => \RainLab\Notify\Models\RuleCondition::class,
            \Winter\Notify\Models\RuleAction::class                      => \RainLab\Notify\Models\RuleAction::class,
            \Winter\Notify\Models\NotificationRule::class                => \RainLab\Notify\Models\NotificationRule::class,
        ];
    }
}

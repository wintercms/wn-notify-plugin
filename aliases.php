<?php

use Winter\Storm\Support\ClassLoader;

/**
 * To allow compatibility with plugins that extend the original RainLab.Notify plugin, this will alias those classes to
 * use the new Winter.Notify classes.
 */
$aliases = [
    // Regular aliases
    Winter\Notify\Plugin::class                                 => 'RainLab\Notify\Plugin',
    Winter\Notify\Classes\ConditionBase::class                  => 'RainLab\Notify\Classes\ConditionBase',
    Winter\Notify\Classes\EventBase::class                      => 'RainLab\Notify\Classes\EventBase',
    Winter\Notify\Classes\Notifier::class                       => 'RainLab\Notify\Classes\Notifier',
    Winter\Notify\Classes\CompoundCondition::class              => 'RainLab\Notify\Classes\CompoundCondition',
    Winter\Notify\Classes\EventParams::class                    => 'RainLab\Notify\Classes\EventParams',
    Winter\Notify\Classes\ActionBase::class                     => 'RainLab\Notify\Classes\ActionBase',
    Winter\Notify\Classes\ModelAttributesConditionBase::class   => 'RainLab\Notify\Classes\ModelAttributesConditionBase',
    Winter\Notify\Controllers\Notifications::class              => 'RainLab\Notify\Controllers\Notifications',
    Winter\Notify\FormWidgets\ActionBuilder::class              => 'RainLab\Notify\FormWidgets\ActionBuilder',
    Winter\Notify\FormWidgets\ConditionBuilder::class           => 'RainLab\Notify\FormWidgets\ConditionBuilder',
    Winter\Notify\Models\Notification::class                    => 'RainLab\Notify\Models\Notification',
    Winter\Notify\Models\RuleCondition::class                   => 'RainLab\Notify\Models\RuleCondition',
    Winter\Notify\Models\RuleAction::class                      => 'RainLab\Notify\Models\RuleAction',
    Winter\Notify\Models\NotificationRule::class                => 'RainLab\Notify\Models\NotificationRule',
];

app(ClassLoader::class)->addAliases($aliases);

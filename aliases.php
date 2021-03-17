<?php

use Winter\Storm\Support\ClassLoader;

/**
 * To allow compatibility with plugins that extend the original RainLab.Notify plugin, this will alias those classes to
 * use the new Winter.Notify classes.
 */
$aliases = [
    // Regular aliases
    Winter\Notify\Plugin::class                                 => RainLab\Notify\Plugin::class,
    Winter\Notify\Classes\ConditionBase::class                  => RainLab\Notify\Classes\ConditionBase::class,
    Winter\Notify\Classes\EventBase::class                      => RainLab\Notify\Classes\EventBase::class,
    Winter\Notify\Classes\Notifier::class                       => RainLab\Notify\Classes\Notifier::class,
    Winter\Notify\Classes\CompoundCondition::class              => RainLab\Notify\Classes\CompoundCondition::class,
    Winter\Notify\Classes\EventParams::class                    => RainLab\Notify\Classes\EventParams::class,
    Winter\Notify\Classes\ActionBase::class                     => RainLab\Notify\Classes\ActionBase::class,
    Winter\Notify\Classes\ModelAttributesConditionBase::class   => RainLab\Notify\Classes\ModelAttributesConditionBase::class,
    Winter\Notify\Controllers\Notifications::class              => RainLab\Notify\Controllers\Notifications::class,
    Winter\Notify\FormWidgets\ActionBuilder::class              => RainLab\Notify\FormWidgets\ActionBuilder::class,
    Winter\Notify\FormWidgets\ConditionBuilder::class           => RainLab\Notify\FormWidgets\ConditionBuilder::class,
    Winter\Notify\Models\Notification::class                    => RainLab\Notify\Models\Notification::class,
    Winter\Notify\Models\RuleCondition::class                   => RainLab\Notify\Models\RuleCondition::class,
    Winter\Notify\Models\RuleAction::class                      => RainLab\Notify\Models\RuleAction::class,
    Winter\Notify\Models\NotificationRule::class                => RainLab\Notify\Models\NotificationRule::class,
];

app(ClassLoader::class)->addAliases($aliases);

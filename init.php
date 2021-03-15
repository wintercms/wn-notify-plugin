<?php

if (!class_exists(RainLab\Notify\Plugin::class)) {
    class_alias(Winter\Notify\Plugin::class, RainLab\Notify\Plugin::class);

    class_alias(Winter\Notify\Classes\ConditionBase::class, RainLab\Notify\Classes\ConditionBase::class);
    class_alias(Winter\Notify\Classes\EventBase::class, RainLab\Notify\Classes\EventBase::class);
    class_alias(Winter\Notify\Classes\Notifier::class, RainLab\Notify\Classes\Notifier::class);
    class_alias(Winter\Notify\Classes\CompoundCondition::class, RainLab\Notify\Classes\CompoundCondition::class);
    class_alias(Winter\Notify\Classes\EventParams::class, RainLab\Notify\Classes\EventParams::class);
    class_alias(Winter\Notify\Classes\ActionBase::class, RainLab\Notify\Classes\ActionBase::class);
    class_alias(Winter\Notify\Classes\ModelAttributesConditionBase::class, RainLab\Notify\Classes\ModelAttributesConditionBase::class);

    class_alias(Winter\Notify\Controllers\Notifications::class, RainLab\Notify\Controllers\Notifications::class);

    class_alias(Winter\Notify\FormWidgets\ActionBuilder::class, RainLab\Notify\FormWidgets\ActionBuilder::class);
    class_alias(Winter\Notify\FormWidgets\ConditionBuilder::class, RainLab\Notify\FormWidgets\ConditionBuilder::class);

    class_alias(Winter\Notify\Models\Notification::class, RainLab\Notify\Models\Notification::class);
    class_alias(Winter\Notify\Models\RuleCondition::class, RainLab\Notify\Models\RuleCondition::class);
    class_alias(Winter\Notify\Models\RuleAction::class, RainLab\Notify\Models\RuleAction::class);
    class_alias(Winter\Notify\Models\NotificationRule::class, RainLab\Notify\Models\NotificationRule::class);
}

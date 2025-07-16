<?php

namespace Winter\Notify\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\Backend;
use Backend\Facades\BackendMenu;
use Exception;
use System\Classes\SettingsManager;
use Winter\Notify\Classes\EventBase;
use Winter\Notify\Models\NotificationRule;
use Winter\Storm\Exception\ApplicationException;

/**
 * Notification rules controller
 *
 * @package winter\notify
 * @author Alexey Bobkov, Samuel Georges
 */
class Notifications extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $requiredPermissions = ['winter.notify.manage_notifications'];

    public $eventAlias;
    protected $eventClass;

    public $formLayout = 'fancy';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Winter.System', 'system', 'settings');
        SettingsManager::setContext('Winter.Notify', 'notifications');
    }

    public function index()
    {
        NotificationRule::syncAll();
        $this->asExtension('ListController')->index();
    }

    public function create($eventAlias = null)
    {
        if (empty($eventAlias)) {
            abort(404);
        }

        $this->eventAlias = $eventAlias;

        $this->asExtension('FormController')->create();
    }

    public function create_onSave($eventAlias = null)
    {
        if (empty($eventAlias)) {
            abort(404);
        }

        $this->eventAlias = $eventAlias;

        return $this->asExtension('FormController')->create_onSave();
    }

    public function formExtendModel($model)
    {
        if (!$model->exists) {
            $model->applyEventClass($this->getEventClass());
            $model->name = $model->getEventDescription();
        }

        return $model;
    }

    // public function formBeforeSave($model)
    // {
    //     $model->is_custom = 1;
    // }

    public function index_onLoadRuleGroupForm()
    {
        try {
            $groups = EventBase::findEventGroups();
            $this->vars['eventGroups'] = $groups;
        }
        catch (Exception $ex) {
            $this->handleError($ex);
        }

        return $this->makePartial('add_rule_group_form');
    }

    /**
     * This handler requires the group code passed from `onLoadRuleGroupForm`
     */
    public function index_onLoadRuleEventForm()
    {
        try {
            if (!$code = post('code')) {
                throw new ApplicationException('Missing event group code');
            }

            $events = EventBase::findEventsByGroup($code);
            $this->vars['events'] = $events;
        }
        catch (Exception $ex) {
            $this->handleError($ex);
        }

        return $this->makePartial('add_rule_event_form');
    }

    protected function getEventClass()
    {
        $alias = $this->eventAlias;

        if ($this->eventClass !== null) {
            return $this->eventClass;
        }

        if (!$event = EventBase::findEventByIdentifier($alias)) {
            throw new ApplicationException('Unable to find event with alias: '. $alias);
        }

        return $this->eventClass = get_class($event);
    }
}

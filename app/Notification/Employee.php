<?php
namespace App\Notification;
/* 
 * Employee
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */
use App\Models\UserActivity;
use App\Models\UserActivityInvolved;
use App\Models\UserNotificationCondition;

class Employee extends ProviderAbstract
{

    /**
     * ProposalCondition constructor.
     * @param UserNotificationCondition $condition
     */
    public function __construct(UserNotificationCondition $condition)
    {
        $this->_condition_data = $condition;
    }

    /**
     * @return array
     */
    public static function getEventConfig()
    {
        return [
                'employee'              => [
                                                    'title' => 'Employee',
                                                    'logicList' => [
                                                                        'needUpdate' => [
                                                                                    'title' => 'CV need update after',
                                                                                    'logic_func' => 'needUpdateCV',
                                                                                    'msg_func' => 'needUpdateCVMessage',
                                                                                    'param' => true,
                                                                        ],
                                                                    ]
                                                ]
        ];
    }


    public function getResource()
    {
        return null;
    }

    public function getParam()
    {
        return $this->_condition_data->param;
    }

    /**
     * @return bool
     */
    public function needUpdateCV()
    {
        $numberOfUpdateCv = \App\Models\Employee::getNumberEmployeeNeedUpdateCVOverDay($this->getParam());

        if (!$numberOfUpdateCv) {
            return false;
        }

        $this->setResultData($numberOfUpdateCv);

        return true;
    }

}

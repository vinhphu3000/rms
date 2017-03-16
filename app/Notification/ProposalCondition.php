<?php
namespace App\Notification;
/* 
 * Proposal
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */
use App\Models\UserActivity;
use App\Models\UserActivityInvolved;
use App\Notification\ConditionAbstract;
use App\Authentication\Service as Auth;

class ProposalCondition extends ConditionAbstract
{

    private $_condition_data;

    public function __construct(UserNotificationCondition $condition)
    {
        $this->_condition_data = $condition;
    }

    /**
     * initialize
     */
    public function init()
    {

    }

    public static function getEventList()
    {
        return [
                'proposal'              => [
                                                    'title' => 'Proposal',
                                                    'logicList' => [
                                                                        'new' => [
                                                                                    'title' => 'Add new',
                                                                                    'logic_func' => 'newProposal',
                                                                                    'param' => false,
                                                                        ],
                                                                        'expire' => [
                                                                                    'title' => 'Add new over time (hours)',
                                                                                    'logic_func' => 'expireProposal',
                                                                                    'param' => true,
                                                                        ]
                                                                    ]
                                                ],
                'proposal_employee_status'  => 'When change status of employee',
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

    public function getLogic()
    {
        return $this->_condition_data->logic;
    }

    public function getEvent()
    {
        return $this->_condition_data->event;
    }


    public function newProposal()
    {
        $user_new_proposal_activity = UserActivity::getNewProposalActivity($this->_condition_data->user_id);

        if (!count($user_new_proposal_activity)) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function proposalExpire()
    {
        $in_id = UserActivityInvolved::getAllActivityIdByUser($this->_condition_data->user_id);
        $user_activity = UserActivity::whereIn('id',$in_id)->where('type', self::TYPE['ProposalRequest'])->get();
        $proposal_over = [];
        foreach ($user_activity as $item) {
            if ($item->getSpentHoursFromAtCreated() > $this->getParam()) {
                $proposal_over[] = $item->proposal_id;
            }
        }

        return count($proposal_over) ?  true : false;
    }
}

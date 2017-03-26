<?php
namespace App\Notification;
/* 
 * Proposal
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */
use App\Models\UserActivity;
use App\Models\UserActivityInvolved;

class ProjectCondition extends ConditionAbstract
{

    private $_condition_data;

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
    public static function getEventList()
    {
        return [
                'project'              => [
                                                    'title' => 'Proposal',
                                                    'logicList' => [
                                                                        'new' => [
                                                                                    'title' => 'Add new project',
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

        $this->_result = $user_new_proposal_activity;

        return true;
    }

    /**
     * @return bool
     */
    public function proposalExpire()
    {
        $in_id = UserActivityInvolved::getAllActivityIdByUser($this->_condition_data->user_id);
        $user_activity = UserActivity::whereIn('id',$in_id)->where('type', self::TYPE['ProposalRequest'])->get();
        $user_proposal_activity_over = [];
        foreach ($user_activity as $item) {
            if ($item->getSpentHoursFromAtCreated() > $this->getParam()) {
                $user_proposal_activity_over[] = $item;
            }
        }

        $this->_result = $user_proposal_activity_over;

        return count($user_proposal_activity_over) ?  true : false;
    }


}
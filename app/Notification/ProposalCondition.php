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
        return UserActivity::getProposalActivity(Auth::getAuthInfo()->id);
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

    }


    public function proposalExpire()
    {

    }
}

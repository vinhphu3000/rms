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

    public static function child()
    {
        return [
                'new_proposal'                       => 'When add new',
                'proposal_employee_status'  => 'When change status of employee',
                'proposal_expire'                    => 'When expire'
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


    public function newProposal()
    {
        $this->_logic->setResource();
        return $this->_logic->check($this->_condition_data);
    }

    public function listen_expire()
    {
        return $this->_condition->check($this->_condition_data);
    }

    /**
     *
     */
    public function sendMailNotification()
    {

    }

    public function showPopupNotification()
    {

    }

    /**
     * Get logic list
     * @return array
     */
    public function getLogicList()
    {
        return [
            '=' => 'equal',
            '>' => 'bigger',
            '<' => 'less',
            '>=' => 'biggerOrEqual',
            '<=' => 'lessOrEqual'
        ];
    }

    /**
     * Get action list
     * @return array
     */
    public function getActionList()
    {
        return [ 'show_popup' => 'showPopupNotification','send_mail' => 'sendMailNotification'];
    }

    /**
     * Get sub event
     * @return array
     */
    public function getSubEvent()
    {
        return [ 'status' => 'Proposal Status', 'expire' => 'Proposal Expire'];
    }

}

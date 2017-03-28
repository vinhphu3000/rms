<?php
namespace App\Notification;
/* 
 * Message
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */

class Message extends MessageAbstract
{
    private static $_msg_new_proposal = "%s have send new proposal to you in %s project";

    public function __construct($resource, $action, $user_id)
    {
        $this->_resource = $resource;
        $this->_action = $action;
        $this->_user_id = $user_id;
    }

    /**
     * @return array
     */
    public function newProposalMessage()
    {
        $msg = [];

        foreach ($this->_resource as $item) {
            $msg[] = [
                'function' => $this->_action,
                'title' => $this->_action,
                'params' => '',
                'send_to' => $this->_user_id,
                'message' => sprintf(self::$_msg_new_proposal, $item->user->name, $item->project->name),
                'user_activity_id' => $item->id,
            ];
        }

        return $msg;
    }

}
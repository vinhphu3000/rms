<?php
namespace App\Notification;
/* 
 * Message
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */

class Message extends MessageAbstract
{
    private static $_msg_new_proposal = "<b>%s</b> have send new proposal to you in <b>%s</b> project";
    private static $_msg_new_request = "<b>%s</b> have create new request resource for <b>%s</b> project";

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

    /**
     * @return array
     */
    public function newRequestMessage()
    {
        $msg = [];

        foreach ($this->_resource as $item) {
            $msg[] = [
                'function' => $this->_action,
                'title' => $this->_action,
                'params' => '',
                'send_to' => $this->_user_id,
                'message' => sprintf(self::$_msg_new_request, $item->user->name, $item->project->name),
                'user_activity_id' => $item->id,
            ];
        }

        return $msg;
    }


}
<?php
namespace App\Notification;
/* 
 * ProposalMessage
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */

class ProposalMessage
{
    private $_resource;
    private $_action;
    private $_user_id;


    public function __construct($resource, $action, $user_id)
    {
        $this->_resource = $resource;
        $this->_action = $action;
        $this->_user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function buildMessage()
    {
        $action_function_name = $this->_action . 'BuildMsg';
       return $this->{$action_function_name}();
    }

    /**
     * @return mixed
     */
    public function sendMailBuildMsg()
    {
        return $this->baseBuildMsg('email');
    }

    /**
     * @return mixed
     */
    public function popupBuildMsg()
    {
        return $this->baseBuildMsg('Popup');
    }

    /**
     * @return array
     */
    public function inlineRedBuildMsg()
    {
        return $this->baseBuildMsg('inline red');
    }

    /**
     * @param $title
     * @param null $message
     * @param array $param
     * @return array
     */
    public function baseBuildMsg($title, $param = '')
    {
        $msg = [];

        foreach ($this->_resource as $item) {
            $msg[] = [
                'function' => $this->_action,
                'title' => $title,
                'params' => $param,
                'send_to' => $this->_user_id,
                'message' => $item->content,
                'user_activity_id' => $item->id,
            ];
        }

        return $msg;

    }
}
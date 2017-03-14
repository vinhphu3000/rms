<?php
namespace App\Notification;
/* 
 * Detect
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */

use App\Models\UserNotificationConfig;

class DetectService
{

    private $_condition;
    private $_config_data;

    public function __construct($user_id)
    {

    }

    public function setConfig(UserNotificationConfig $config)
    {
        $this->_config_data = $config;
    }

    public function start()
    {

    }

}

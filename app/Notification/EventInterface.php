<?php
namespace App\Notification;

/* 
 * Event interface
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */
interface EventInterface
{
    public function listen();

    public static function getLogicList();
}

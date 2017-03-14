<?php
namespace App\Notification;

/* 
 * ConditionAbstract
 * @author Thieu.LeQuang <quangthieuagu@gmail.com>
 */
abstract class ConditionAbstract
{


    abstract protected function getResource();

    abstract protected function getParam();

    abstract protected static function getEventList();

    abstract protected function getLogic();

    abstract protected function getEvent();

    /**
     * Get logic list
     * @return array
     */
    public static function getLogicBase()
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
     * @return bool
     */
    public function check()
    {
        $logic = $this->getLogic();
        $logic_list = $this->getLogicList();
        if (in_array($logic, array_keys($logic_list))) {
            return $this->{$logic_list[$logic]}();
        }
        return false;
    }

    /**
     * @return null
     */
    public function getFuncLogic()
    {
        $list_logic = $this->getLogicList();
        if (isset($list_logic[$this->getLogic()]['logic_func'])) {
            return $list_logic[$this->getLogic()]['logic_func'];
        }
        return null;
    }

    /**
     * @return array
     */
    public function getLogicList()
    {
        $list_event = self::getEventList();
        if (isset($list_event[$this->getEvent()]['logicList'])) {
            return $list_event[$this->getEvent()]['logicList'];
        }

        return [];
    }

    /**
     * If equal
     *
     * @return mixed
     */
    public function equal()
    {
        return ($this->getResource() == $this->getParam());
    }

    /**
     * @return bool
     */
    public function bigger()
    {
        return ($this->getResource() > $this->getParam());
    }

    /**
     * @return bool
     */
    public function biggerOrEqual()
    {
        return ($this->getResource() >= $this->getParam());
    }

    /**
     * @return bool
     */
    public function less()
    {
        return ($this->getResource() < $this->getParam());
    }

    /**
     * @return bool
     */
    public function lessOrEqual()
    {
        return ($this->getResource() < $this->getParam());
    }

    /**
     * @return bool
     */
    public function in()
    {
        if (!empty($this->param)) {
            return false;
        }

        if (!is_array($this->getParam())) {
            return $this->getResource() == $this->getParam();
        }

        return in_array($this->getResource(), $this->getParam());
    }

    public function notIn()
    {
        return (!$this->in());
    }

    /**
     * @return bool
     */
    public function contains()
    {
        if (!empty($this->getParam())) {
            return false;
        }

        if (is_array($this->getParam())) {
            return in_array($this->getResource(), $this->getParam());
        }


        if (strpos($this->getResource(), $this->getParam()) === false) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function notContains()
    {
        return (!$this->contains());
    }

    /**
     * @return bool
     */
    public function preg()
    {
        if (!empty($this->getParam()) || !empty($this->getResource())) {
            return false;
        }

        if (!preg_match($this->getParam(), $this->getResource())) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function notPreg()
    {
        return $this->preg();
    }


}

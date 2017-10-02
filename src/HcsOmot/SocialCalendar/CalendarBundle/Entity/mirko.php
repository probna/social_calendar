<?php


namespace HcsOmot\SocialCalendar\CalendarBundle\Entity;


use Symfony\Component\Validator\Constraints\Valid;

class dbConn{
    static $instance;

    public static function getInstance(){
        if (self::$instance === null){
            self::$instance = new MySQL('user', 'pass');
        }
        return self::$instance;
    }
}

class mirko {


    static public function increment()
    {
        Ana::getInstance()->value++;
    }

    static public function getValue()
    {
        return Ana::getInstance()->value;
    }


}

class Ana{
    static $instance;

    static public function getInstance(){
        if(self::$instance == null){
            self::$instance = new Ivan();
        }

        return self::$instance;
    }
}

class Ivan{
    public $value = 0;
}
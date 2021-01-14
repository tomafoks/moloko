<?php
class Controller
{
    protected $f3;
    protected $db;
    protected $basket;


    function __construct()
    {
        $this->basket = new Basket('basket');
        $this->f3 = Base::instance();
        $this->db = new DB\SQL(
            $this->f3->get('devdb'),
            $this->f3->get('devdbusername'),
            $this->f3->get('devdbpassword'),
            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
        );
        //счетчик корзины
        $this->f3->set('basketCount', $this->basket->count());
    }

    function beforeRoute()
    {
        // if($this->f3->get('SESSION.user') === null) {
        //     $this->f3->reroute('/login');
        //     exit;
        // }
    }

    function afterRoute()
    {
        // echo ' - after';
    }
}

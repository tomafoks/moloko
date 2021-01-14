<?php
class ShipingController extends Controller
{
    function render()
    {
        //рендерим в view
        $this->f3->set('view', 'template/shipping.htm');
        echo \Template::instance()->render('layoutView.htm');
    }
}

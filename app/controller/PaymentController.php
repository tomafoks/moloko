<?php
    class PaymentController extends Controller
    {
        function render()
        {    
            //рендерим в view
            $this->f3->set('view', 'template/payment.htm');
            echo \Template::instance()->render('layoutView.htm');
        }
    }
    
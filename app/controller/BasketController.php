<?php
class BasketController extends Controller
{
    function render()
    {
        $res = $this->basket->find();
        $catalog = new CatalogModel($this->db);
        //корзина пользователя
        $basket = $catalog->getBasket($res);
        $this->f3->set('basket', array($basket));
        //итоговая стоимость
        $sum = $catalog->sumPrice($basket);
        $this->f3->set('sum', $sum);
        //рендерим в view
        $this->f3->set('view', 'template/basket.htm');
        echo \Template::instance()->render('layoutView.htm');
    }

    function add()
    {
        $id = $this->f3->get('PARAMS.id');
        $quantity = $this->f3->get('POST.quantity');
        $this->basket->load('idcatalog', $id);
        $this->basket->copyfrom(array('idcatalog' => $id, 'quantity' => $quantity));
        $this->basket->save();
        $this->basket->reset();
        $this->f3->reroute('/catalog');
    }

    function edit()
    {
        $id = $this->f3->get('PARAMS.id');
        $quantity = $this->f3->get('POST.quantity');
        $this->basket->load('idcatalog', $id);
        $this->basket->set('quantity', $quantity);
        $this->basket->save();
        $this->basket->reset();
        $this->f3->reroute('/basket');

    }

    function del()
    {
        $id = $this->f3->get('PARAMS.id');
        $this->basket->erase('idcatalog', $id);
        $this->basket->reset();
        $this->f3->reroute('/basket');
    }
}

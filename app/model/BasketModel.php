<?php
class BasketModel extends Basket
{
    function add($basket) {
        $basket->load('idcatalog', $id);
        $basket->copyfrom(array('idcatalog' => $id, 'quantity' => $quantity));
        $basket->save();
        $basket->reset();
    }
}
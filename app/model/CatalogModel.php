<?php
class CatalogModel extends DB\SQL\Mapper
{
    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, "catalog");
    }
    //получить весь каталог
    public function all()
    {
        $this->load();
        return $this->query;
    }
    //фильтр продуктов
    public function getItem($cat)
    {
        $this->load(array('category=?', $cat));
        return $this->query;
    }

    public function getById($id)
    {
        $this->load(array('idcatalog=?', $id));
        return $this->query;
    }

    public function getBasket($card)
    {
        $arr = [];
        $id = 0;
        foreach ($card as $key => $value) {
            $this->load(array('idcatalog=?', $value['idcatalog']));
            $arr[$id]['id'] = $this->idcatalog;
            $arr[$id]['name'] = $this->nameitem;
            $arr[$id]['description'] = $this->descriptionitem;
            $arr[$id]['imagepath'] = $this->imagepath;
            $arr[$id]['stockBalance'] = $this->quantity;
            if ($value['quantity'] > $this->quantity) {
                $arr[$id]['quantity'] = $this->quantity;
            } else {
                $arr[$id]['quantity'] = $value['quantity'];
            }
            $arr[$id]['price'] = intval($this->priceitem) * intval($value['quantity']);
            $id++;
        }
        return $arr;
    }

    // function sumPrice($basket) {
    //     $sum = 0;
    //     foreach($basket as $key=>$value){
    //         $sum += intval($value['price']);
    //     }
    //     return $sum;
    // }
}

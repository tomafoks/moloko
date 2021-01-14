<?php
class CatalogController extends Controller
{
    function render()
    {
        $this->f3->set('title', 'Все продукты');
        $catalog = new CatalogModel($this->db);
        $cat = $catalog->all();
        //рендерим в view
        $this->f3->set('products', array($cat));
        $this->f3->set('view', 'template/catalog.htm');
        echo \Template::instance()->render('layoutView.htm');
    }

    //фильтр молочныех продуктов
    function milk()
    {
        $this->f3->set('var', 'молочные продукты');
        $this->f3->set('title', 'Молочные продукты');
        $catalog = new CatalogModel($this->db);
        $cat = $catalog->getItem(1);
        //рендерим в view
        $this->f3->set('products', array($cat));
        $this->f3->set('view', 'template/catalog.htm');
        echo \Template::instance()->render('layoutView.htm');
    }

    //фильтр мясных продуктов
    function meet()
    {
        $this->f3->set('var', 'мясные продукты');
        $this->f3->set('title', 'Мясные продукты');
        $catalog = new CatalogModel($this->db);
        $cat = $catalog->getItem(2);
        //рендерим в view
        $this->f3->set('products', array($cat));
        $this->f3->set('view', 'template/catalog.htm');
        echo \Template::instance()->render('layoutView.htm');
    }

    //карта продукта
    function getCard()
    {
        $id = $this->f3->get('PARAMS["id"]');
        $catalog = new CatalogModel($this->db);
        $cat = $catalog->getById($id)[0];
        //рендерим в view
        $this->f3->set('product', array($cat));
        $this->f3->set('view', 'template/card_product.htm');
        echo \Template::instance()->render('layoutView.htm');
    }
}

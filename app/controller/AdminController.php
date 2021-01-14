<?php
class AdminController extends Controller
{
    function render()
    {
        // $catalog = new CatalogModel($this->db);
        // $cat = $catalog->all();
        echo \Template::instance()->render('layoutView.htm');
    }
}

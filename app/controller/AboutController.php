<?php
class AboutController extends Controller
{
    function render()
    {
        $this->f3->set('view', 'template/about.htm');
		//рендерим в view
		echo \Template::instance()->render('layoutView.htm');
    }
}

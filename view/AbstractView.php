<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 29.05.19
 * Time: 21:51
 */

abstract class AbstractView
{
    final public function getView($data,$template){
        $this->renderHeader();
        if (is_array($data)) extract($data);
        require ($template);
        $this->renderFooter();
    }

    abstract protected function renderHeader();

    protected function renderFooter(){
        include ROOT . '/views/layouts/footer.php';
    }
}
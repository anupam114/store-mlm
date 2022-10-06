<?php
class Errors extends MY_Controller 
{

    public function error404()
    {
        $this->frontend('404');
    }
}
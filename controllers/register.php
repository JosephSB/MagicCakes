<?php 

    class register extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->Render('Auth/register');
        }

    }

?>
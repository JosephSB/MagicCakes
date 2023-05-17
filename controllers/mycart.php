<?php 

    class mycart extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->Render('shoppingCart');
        }


    }

?>
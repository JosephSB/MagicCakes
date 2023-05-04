<?php 

    class aboutUs extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->Render('AboutUs');
        }

    }

?>
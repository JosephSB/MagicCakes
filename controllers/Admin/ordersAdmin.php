<?php 
    class ordersAdmin extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $orders = $this->model->getOrdersAdmin();
        
            $this->view->orders = $orders;
            $this->view->render('Admin/OrdersAdmin');
        }

        function edit($idProduct){

            $this->view->render('Admin/OrdersAdmin');
        }

        function delete($idProduct){

            $this->view->render('Admin/OrdersAdmin');
        }

    }

?>
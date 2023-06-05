<?php
class ordersAdmin extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $orders = $this->model->getOrdersAdmin();

        $this->view->orders = $orders;
        $this->view->render('Admin/OrdersAdmin');
    }

    function edit($idOrder)
    {
        $data = $_POST;

        $this->loadModel("orders");
        $datOrder = $this->model->getDetailsOrders($idOrder);
        $this->view->data = $datOrder[0];
        $this->view->idOrder = $idOrder;
        if (empty($data['name']) && empty($data['lastname']) && empty($data['created'])) {
            $this->view->message = '';
            $this->view->Render('Admin/EditOrder');
            return;
        }

        $resp = $this->model->editOrders($idOrder, $data);

        if (!$resp) {
            //$this->view->idProduct=$idProduct;
            $this->view->message = 'Ocurrio un error';
            $this->view->render('Admin/EditOrder');
            return;
        }
        header("Location: " . constant('URL') . "admin/ordersAdmin");

    }


}

?>
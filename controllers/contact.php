<?php 
    require './utils/ValidateCredentials.php';

    class contact extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $data = $_POST;

            if(empty($data['name']) ){
                $this->view->message = '';
                $this->view->Render('Contact');
                return;
            }

            $validate = new ValidateCredentials();
            $this->loadModel("contact");

            if($validate -> validateUser($data['name']) == false){
                $this->view->message = 'Nombre invalido';
                $this->view->Render('Contact');
                return;
            }
            if($validate -> validateUser($data['lastname']) == false){
                $this->view->message = 'Apellido invalido';
                $this->view->Render('Contact');
                return;
            }
            if($validate -> validateEmail($data['email']) == false){
                $this->view->message = 'Email invalido';
                $this->view->Render('Contact');
                return;
            }

            if($this->model->createContact($data)){
                $this->view->message = 'Enviado correctamente';
                $this->view->Render('Contact');
                return;
            }else{
                $this->view->message = 'Error al registrar, vuelve a intentar';
                $this->view->Render('Contact');
                return;
            }
        }

    }

?>
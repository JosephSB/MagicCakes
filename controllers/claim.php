<?php 
    require './utils/ValidateCredentials.php';

    class claim extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $data = $_POST;

            if(empty($data['name']) ){
                $this->view->message = '';
                $this->view->Render('Claims');
                return;
            }

            $validate = new ValidateCredentials();
            $this->loadModel("claim");

            if($validate -> validateUser($data['name']) == false){
                $this->view->message = 'Nombre invalido';
                $this->view->Render('Claims');
                return;
            }
            if($validate -> validateUser($data['lastname']) == false){
                $this->view->message = 'Apellido invalido';
                $this->view->Render('Claims');
                return;
            }
            if($validate -> validateEmail($data['email']) == false){
                $this->view->message = 'Email invalido';
                $this->view->Render('Claims');
                return;
            }

            if($validate -> validatePhone($data['number']) == false){
                $this->view->message = 'Celular invalido';
                $this->view->Render('Claims');
                return;
            }

            if($this->model->createClaim($data)){
                $this->view->message = 'Enviado correctamente';
                $this->view->Render('Claims');
                return;
            }else{
                $this->view->message = 'Error al registrar, vuelve a intentar';
                $this->view->Render('Claims');
                return;
            }
        }

    }

?>
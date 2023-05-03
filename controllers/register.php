<?php 
    require './utils/ValidateCredentials.php';

    class register extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            session_start();
            $data = $_POST;

            if(isset($_SESSION['user_id'])){
                header("Location: ".constant('URL')."");
            }

            if(empty($data['name']) || empty($data['password']) ){
                $this->view->message = '';
                $this->view->Render('Auth/register');
                return;
            }

            $validate = new ValidateCredentials();
            $this->loadModel("user");

            if($validate -> validateUser($data['name']) == false){
                $this->view->message = 'Nombre invalido';
                $this->view->Render('Auth/register');
                return;
            }
            if($validate -> validateUser($data['lastname']) == false){
                $this->view->message = 'Apellido invalido';
                $this->view->Render('Auth/register');
                return;
            }
            if($validate -> validatePass($data['password']) == false){
                $this->view->message = 'Contraseña invalida, max 8-12 digistos, mayusculas minusculas y caracter especial';
                $this->view->Render('Auth/register');
                return;
            }
            if($validate -> validateEmail($data['email']) == false){
                $this->view->message = 'Email invalido';
                $this->view->Render('Auth/register');
                return;
            }

            if($this->model->createUser($data)){
                header("Location: ".constant('URL')."login");
                return;
            }else{
                $this->view->message = 'Error al registrar, vuelve a intentar';
                $this->view->Render('Auth/register');
                return;
            }
        }

    }

?>
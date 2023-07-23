<?php
require './utils/ValidateCredentials.php'; 
    class usersAdmin extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $users = $this->model->getUsersAdmin();
        
            $this->view->users = $users;
            $this->view->render('Admin/UsersAdmin');
        }

        function crear(){
            $data = $_POST;
            
            if( empty($data['name']) && empty($data['email']) ){
                $this->view->message = '';
                $this->view->Render('Admin/CreateUsers');
                return;
            }

            if( empty($data['name']) && empty($data['lastname']) && empty($data['email'])  && empty($data['password']) ){
                $this->view->message = 'Formulario Invalido';
                $this->view->Render('Admin/CreateUsers');
                return;
            }

            $validate = new ValidateCredentials();
            $this->loadModel("user");

            if($validate -> validateUser($data['name']) == false){
                $this->view->message = 'Nombre invalido';
                $this->view->Render('Admin/CreateUsers');
                return;
            }
            if($validate -> validateUser($data['lastname']) == false){
                $this->view->message = 'Apellido invalido';
                $this->view->Render('Admin/CreateUsers');
                return;
            }
            if($validate -> validatePass($data['password']) == false){
                $this->view->message = 'Contraseña invalida, max 8-12 digistos, mayusculas minusculas y caracter especial';
                $this->view->Render('Admin/CreateUsers');
                return;
            }
            if($validate -> validateEmail($data['email']) == false){
                $this->view->message = 'Email invalido';
                $this->view->Render('Admin/CreateUsers');
                return;
            }

            $user = $this->model->findUserByEmail($data['email']);

            if(empty($user) == false){
                $this->view->message = 'El email ya esta registrado';
                $this->view->Render('Admin/CreateUsers');
                return;
            }

            if($validate -> validatePhone($data['number']) == false){
                $this->view->message = 'Celular invalido';
                $this->view->Render('Admin/CreateUsers');
                return;
            }
            

            $resp = $this->model->createUser($data);

            if(!$resp){
                $this->view->message = 'El email ya esta registrado';
                $this->view->render('Admin/CreateUsers');
                return;
            }

            
            header("Location: ".constant('URL')."admin/usersAdmin");
        }

        function edit($idUser){
            $data = $_POST;

            $this->loadModel("users");
            $datUser = $this->model->getDetailUser($idUser);
            $this->view->data = $datUser[0];
            $this->view->idUser=$idUser;

            if( empty($data['role']) && empty($data['email']) ){
                $this->view->message = '';
                $this->view->Render('Admin/EditUser');
                return;
            }

            if( empty($data['role']) && empty($data['email']) && empty($data['phone'])  && empty($data['address']) ){
                $this->view->message = 'Formulario Invalido';
                $this->view->Render('Admin/EditUser');
                return;
            }
            
            $resp = $this->model->findUserByEmailExceptMe($data['email'], $idUser);

            if(empty($resp) == false){
                $this->view->message = 'El email ya esta registrado';
                $this->view->Render('Admin/EditUser');
                return;
            }

            $resp = $this->model->editUsers($idUser, $data);

            if(!$resp){
                //$this->view->idProduct=$idProduct;
                $this->view->message = 'Ocurrio un error';
                $this->view->render('Admin/EditUser');
                return;
            }

            header("Location: ".constant('URL')."admin/usersAdmin");
        }

        function delete($idUser){
            $this->loadModel("users");
            $resp = $this->model->deleteUsers($idUser);

            header("Location: ".constant('URL')."admin/usersAdmin");
        }
    }

?>
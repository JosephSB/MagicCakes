<?php 
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

            $this->loadModel("user");

            $resp = $this->model->createUser($data);

            if(!$resp){
                $this->view->message = 'Ocurrio un error';
                $this->view->render('Admin/UsersAdmin');
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
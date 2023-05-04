<?php 

    class login extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            session_start();
            $data = $_POST;

            if(isset($_SESSION['user_id'])){
                header("Location: ".constant('URL')."");
            }
            
            if(empty($data['email']) && empty($data['password']) ){
                $this->view->message = '';
                $this->view->Render('Auth/login');
                return;
            }

            $this->loadModel("user");

            $user = $this->model->findUserByEmail($data['email']);

            if(empty($user) == false){
                if(password_verify($data['password'], $user['password'])){
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['name']." ".$user['lastname'];
                    $_SESSION['role'] = $user['role'];
                    header("Location: ".constant('URL')."");
                    return;
                }
                $this->view->message = 'Credenciales incorrectas';
                $this->view->Render('Auth/login');
                return;
            }else{
                $this->view->message = 'Usuario no registrado';
                $this->view->Render('Auth/login');
                return;
            }
        }

    }

?>
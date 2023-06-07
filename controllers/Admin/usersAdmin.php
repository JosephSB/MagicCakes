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
            
            header("Location: ".constant('URL')."admin/usersAdmin");
        }

        function edit($idProduct){
            
            header("Location: ".constant('URL')."admin/usersAdmin");
        }

        function delete($idProduct){
            

            header("Location: ".constant('URL')."admin/usersAdmin");
        }
    }

?>
<?php
class claimsAdmin extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $claims = $this->model->getClaimsAdmin();

        $this->view->claims = $claims;
        $this->view->render('Admin/ClaimsAdmin');
    }

    
}

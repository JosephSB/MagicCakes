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

    function edit($idClaim)
    {
        $data = $_POST;

        if (isset($data['status'])) {
            $this->loadModel("claim");
            $this->model->updateClaimStatus($idClaim, $data['status']);
        }

        header("Location: " . constant('URL') . "admin/claimsAdmin");
    }

    
}

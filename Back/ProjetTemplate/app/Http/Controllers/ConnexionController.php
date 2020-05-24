<?php


namespace App\Http\Controllers;

use App\dao\ServiceLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ConnexionController
{
    public function signIn()
    {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $visiteurJson = json_decode($json);

            if ($visiteurJson != null) {
                $login_visiteur = $visiteurJson->login;
                $pwd_visiteur = $visiteurJson->pwd;
                $unService = new ServiceLogin();
                $uneReponse = $unService->getConnexion($login_visiteur, $pwd_visiteur);

                return json_encode($uneReponse);
            }
    }
}

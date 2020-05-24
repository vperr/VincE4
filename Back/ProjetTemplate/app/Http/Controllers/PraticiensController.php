<?php


namespace App\Http\Controllers;

use App\DAO\ServicePraticien;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class PraticiensController extends Controller
{

    public function listePraticien()
    {
        $unPrat = new ServicePraticien();
        $mesPraticiens = $unPrat->getListePraticiens();
        return json_encode($mesPraticiens);
    }


    public function recherchePratNom() {
        $json = file_get_contents('php://input'); // Récupération du flux JSON
        $userJson = json_decode($json);

        // nomPrat = name du input de Angular
        $nomPrat = $userJson->nomPrat;

        $unPrat = new ServicePraticien();
        $mesPraticiens = $unPrat->getListePraticiensNom($nomPrat);
        return json_encode($mesPraticiens);
    }

    public function listeTypePraticien() {

        $unPrat = new ServicePraticien();
        $mesPraticiens = $unPrat->getListeTypePraticiens();
        return json_encode($mesPraticiens);
    }

    public function recherchePratType() {
        $json = file_get_contents('php://input'); // Récupération du flux JSON
        $userJson = json_decode($json);

        $typePrat = $userJson->idTypePrat;

        $unType = new ServicePraticien();
        $mesPraticiens = $unType->getListePraticiensType($typePrat);
        return json_encode($mesPraticiens);
    }

}

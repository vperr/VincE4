<?php


namespace App\DAO;
use App\Exceptions\MonException;
use DB;
use Illuminate\Database\QueryException;

class ServicePraticien
{


    public function  getListePraticiens() {
        $mesPraticiens = DB::table('praticien')
            ->Join('type_praticien', 'type_praticien.id_type_praticien', '=', 'praticien.id_type_praticien')
            ->get();

        return $mesPraticiens;
    }


    public function getListePraticiensNom($nomPrat) {
        $mesPraticiens = DB::table('praticien')
            ->Join('type_praticien', 'type_praticien.id_type_praticien', '=', 'praticien.id_type_praticien')
            ->Where('nom_praticien', 'like', '%'.$nomPrat.'%')
            ->get();

        return $mesPraticiens;
    }

    public function getListeTypePraticiens() {
        $mesPraticiens = DB::table('type_praticien')
            ->get();

        return $mesPraticiens;
    }

    public function getListePraticiensType($typePrat) {
        $mesPraticiens = DB::table('praticien')
            ->Join('type_praticien', 'type_praticien.id_type_praticien', '=', 'praticien.id_type_praticien')
            ->Where('praticien.id_type_praticien', '=', $typePrat)
            ->get();

        return $mesPraticiens;
    }
}

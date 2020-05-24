<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 29/01/2019
 * Time: 14:23
 */

namespace App\dao;

use App\Exceptions\MonException;
use App\metier\Visiteur;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use DB;

class ServiceLogin
{
    /**
     * Vérifie le login et mdp visiteur
     * @param type $json
     * @return \Visitor
     * @throws Exception
     */
    public function getConnexion($login_visiteur,$pwd_visiteur)
    {
        if (DB::table('visiteur') ->where('login_visiteur', '=', $login_visiteur) ->exists()) {

                $visiteur = DB::table('visiteur')
                    ->where('login_visiteur', '=', $login_visiteur)
                    ->first();

                   if (Hash::check($pwd_visiteur, $visiteur->pwd_visiteur))
                   {
                    return true;
                   } else {
                       return null;
                   }
        } else {
            return null;
        }
    }


    //SELECT BY ID d'un visiteur
    public function getById($id)
    {
        try {
            $visiteur = DB::table('visiteur')
                ->where('id_visiteur', '=', $id)
                ->first();
            $response = array(
                'status' => 1,
                'status_message' => "Identification correcte",
                'data' => $visiteur
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public static function  miseAjourMotPasse($pwd){

        $newpwd = Hash::make($pwd);
        try {
            Db::table('visiteur')->update(['pwd_visiteur' => $newpwd]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}

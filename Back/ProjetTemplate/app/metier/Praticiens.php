<?php


class Praticiens
{
//On déclare la table praticien

    protected $table = 'praticien';
    protected $primaryKey = 'id_praticien';
    private $id_type_praticien;
    private $nom_praticien;
    private $prenom_praticien;
    private $adresse_praticien;
    private $cp_praticien;
    private $ville_praticien;
    public $timestamps = false;
    protected $fillable = [
        'id_praticien',
        '$nom_praticien',
        '$prenom_praticien',
        '$adresse_praticien',
        '$cp_praticien',
        '$ville_praticien',
    ];

    public function getIdPraticiens()
    {
        return $this->getKey();
    }

    public function getIdTypePraticiens()
    {
        return $this->id_type_praticien();
    }

    public function  getListeMangaNoms() {
        $mesMangas = DB::table('manga')
            ->Select('id_manga', 'titre', 'genre.lib_genre', 'dessinateur.nom_dessinateur',
                'scenariste.nom_scenariste', 'prix')
            ->join('genre', 'manga.id_genre', '=', 'genre.id_genre')
            ->join('dessinateur', 'manga.id_dessinateur', '=', 'dessinateur.id_dessinateur')
            ->join('scenariste', 'manga.id_scenariste', '=', 'scenariste.id_scenariste')
            ->get();

        return $mesMangas;
    }

    public function ajoutManga($code_d, $prix, $titre, $couverture, $code_ge, $id_scenariste){
        DB::table('manga')->insert(
            ['id_dessinateur' => $code_d, 'prix' => $prix,
                'titre' => $titre, 'couverture' => $couverture, 'id_genre' => $code_ge, 'id_scenariste' => $id_scenariste]);
    }

    public function getManga($idManga){
        $manga = DB::table('manga')
            ->select()
            ->where('id_manga', '=', $idManga)
            ->first();
        return $manga;
    }

    public function modificationManga ($code, $code_d, $prix, $titre, $couverture, $code_ge, $id_scenariste)
    {
        DB::table('manga')
            ->where('id_manga', $code)
            ->update(['id_dessinateur' => $code_d, 'prix' => $prix,
                'titre' => $titre, 'couverture' =>$couverture,
                'id_genre' => $code_ge, 'id_scenariste' => $id_scenariste]);
    }
}

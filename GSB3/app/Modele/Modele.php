<?php

namespace App\Modele;

use CodeIgniter\Model;

class Modele extends Model
{
    protected $table = 'Visiteur2';
    protected $allowedFields = ['numero', 'nom', 'prenom', 'email'];

    public function getLesVisiteurs()
    {
        // Récupérer les visiteurs depuis la base de données
        $query = $this->db->query('SELECT * FROM visiteur2');
        return $query->getResultArray();
    }

    public function getLesConferences()
    {
        // Récupérer les conférences depuis la base de données
        $query = $this->db->query('SELECT * FROM conference');
        return $query->getResultArray();
    }

    public function getLesPresentations()
    {
        // Récupérer les présentations depuis la base de données
        $query = $this->db->query('SELECT * FROM presentation');
        return $query->getResultArray();
    }
    public function getLesPresentationsDate()
    {
        // Récupérer les présentations depuis la base de données
        $query = $this->db->query('SELECT dateDisponible FROM presentation');
        return $query->getResultArray();
    }

    public function getLesPresentationheure(){

        $query = $this->db->query('SELECT horaire From  presentation');
        return $query->getResultArray();
    }
    public function getLesPresentationheure1($conferenceId) {
        // Utilisation du constructeur de requêtes de CodeIgniter pour construire la requête
        $builder = $this->db->table('presentation');
        $builder->select('*');
        $builder->where('idconference', $conferenceId);
        $query = $builder->get();

        // Renvoie le résultat sous forme de tableau d'objets
        return $query->getResult();
    }
    

    
    public function getLesConferencesThemes()
    {
        // Sélectionner uniquement les thèmes des conférences
        $query = $this->db->query('SELECT idconference,theme From  conference');
        return $query->getResultArray();
    }
    public function insertInto($request, $data)
{
    // Récupérer les données du formulaire
    $conference = $request->getPost('conference');
    $presentation = $request->getPost('presentation');
    $date = $request->getPost('date');
    $name = $request->getPost('name');
    
    // Connecter à la base de données
    $db = db_connect();
    
    // Requête d'insertion
    $query = "INSERT INTO reservation (conference_theme, presentation_creneau, reservation_date, user_name) VALUES (?, ?, ?, ?)";
    
    // Exécuter la requête avec les valeurs des données du formulaire
    $db->query($query, [$conference, $presentation, $date, $name]);
}
public function getReservationsByPrenom($prenom)
{
    $sql = "SELECT * FROM reservation WHERE user_name = ?"; // Requête SQL pour sélectionner les réservations par prénom
    return $this->db->query($sql, [$prenom])->getResult(); // Exécutez la requête avec le prénom comme paramètre
}
public function getLesinfo(){

    $query = $this->db->query('SELECT * From ');
    return $query->getResultArray();
}
public function getPresentationsParConference($conferenceId)
{
    // Utilisation du constructeur de requêtes de CodeIgniter pour construire la requête
    $builder = $this->db->table('presentation');
    $builder->select('*');
    $builder->where('idconference', $conferenceId);
    $query = $builder->get();

    // Renvoie le résultat sous forme de tableau d'objets
    return $query->getResult();
}
public function getPresentationsByConference($idConference) {
    // Exécutez une requête SQL pour sélectionner les présentations de la conférence avec l'ID $idConference
    $sql = "SELECT * FROM presentation  WHERE idconference = ?";
    $query = $this->db->query($sql, array($idConference));

    // Retournez les résultats sous forme de tableau d'objets
    return $query->getresult();
}
public function getConference($idConference) {
    // Exécutez une requête SQL pour sélectionner les présentations de la conférence avec l'ID $idConference
    $sql = "SELECT * FROM conference_presentation_view";
    $query = $this->db->query($sql, array($idConference));

    // Retournez les résultats sous forme de tableau d'objets
    return $query->getresult();
}



}

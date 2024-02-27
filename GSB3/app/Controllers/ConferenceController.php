<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ConferenceController extends BaseController
{
    // Dans votre contrôleur ConferenceController
    
public function getlesConference()
{
    $db = db_connect();
    // Dans votre contrôleur ConferenceController
   $conferenceModel = new \App\Modele\Modele();


    $query = $db->query('SELECT * FROM conference');
    return $query->getResultArray();
}


}

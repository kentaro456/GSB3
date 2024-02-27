<?php

namespace App\Controllers;

use App\Libraries\Presentation;
use App\Modele\Modele;
use App\Models\ReservationModel;
use Config\App;

use Dompdf\Dompdf;
use Dompdf\Options;




class Home extends BaseController
{
    
    
    public function index()
    {
        return view('index');
        
    }
    public function authenticate()
    {
        // Récupérer les données du formulaire de connexion
        $login = $this->request->getPost('login');
        $passwordInput = $this->request->getPost('mdp');
    
       // Se connecter à la base de données
        $db = \Config\Database::connect();

        // Rechercher l'utilisateur dans la base de données
        $builder = $db->table('visiteur2');
        $builder->select('id, nom, prenom, login, mdp, ville');
        $builder->where('login', $login);
        $user = $builder->get()->getRow();

        // Vérifier le mot de passe (en supposant que le mot de passe est stocké en texte brut)
        if ($user && $passwordInput === $user->mdp) {
            session()->start();

            // L'authentification a réussi
            // Vous pouvez stocker des informations dans la session si nécessaire
            session()->set('user_id', $user->id);
            session()->set('user_nom', $user->nom);
            session()->set('user_prenom', $user->prenom);
            session()->set('user_ville', $user->ville); // Utilisez la même clé ici
            session()->set('authenticated', true);

            // Rediriger vers une page après une connexion réussie
            return redirect()->to('/HomePage');
        } else {
            // Rediriger vers la page de connexion avec un message d'erreur
            return redirect()->to('/erro')->with('failed_message', 'Échec de connexion. Veuillez réessayer stp stp :).');
        }


    }
    public function HomePage()
    {
        session()->start();
        return view('header').view('HomePage');
    }
    public function deconnexion()
    {
        // Charger le service de session
        $session = session();
    
        session()->destroy();

    // Rediriger vers la page de déconnexion ou une autre page appropriée
       return redirect()->to('/');
    }
    public function Conference()
    {
         return view('header').view('conference');
    }
    public function vue()
    {
         return view('header').view('vue');
    }
    
    public function info()
    {
        return view('header').view('info');
    }
    public function popup()
    {
        return view('header').view('popup');
    }
    public function erro()
    {
        return view('erro');
    }
    public function pdf()
    {
       
        return view('pdf');
    }
    


   
    public function generatePdf()
    {
        require_once 'C:/xampp/htdocs/GSB3/app/dompdf/autoload.inc.php';
    
        $modele = new Modele();
        $reservations =  $modele->getReservationsByPrenom(session()->get('user_prenom'));
    
        // Créer une instance de Dompdf
        $dompdf = new Dompdf();
    
        // Charger le contenu HTML depuis la vue pdf_reservation.php
        $html = view('PDF', ['reservations' => $reservations]);
    
        // Charger le HTML dans Dompdf et le rendre
        $dompdf->load_html($html);
        $dompdf->render();
    
        // Télécharger le PDF
        $filename = 'reservations_' . session()->get('user_prenom') . '_' . date('YmdHis') . '.pdf';
        $dompdf->stream($filename, ['Attachment' => false]);
    }
    
 

  
    
    
    
    
   // \App\Controllers\Home

// Dans votre contrôleur (par exemple HomeController)
public function Reservation()
{
    $modele = new \App\Modele\Modele();

    // Charger la vue 'header'
    $header = view('header');

    // Charger la vue 'Presentation' en passant le modèle
    $presentation = view('Reservation', ['modele' => $modele]);


    // Concaténer les vues 'header' et 'Presentation'
    $output = $header . $presentation ;

    // Afficher la vue complète
    echo $output;
}

public function header()
{
     return view('header');
}


public function submitReservation()
{
    // Vérifier si la requête est une requête POST
    if ($this->request->getMethod() === 'post') {
        // Récupérer les données du formulaire
        $data = [
            'conference' => $this->request->getPost('conference'),
            'presentation' => $this->request->getPost('presentation'),
            'date' => $this->request->getPost('date'),
            'name' => $this->request->getPost('name')
        ];
        $modele = new Modele();
        // Appeler la méthode insertInto du modèle en passant les données et la requête
        $modele->insertInto($this->request, $data);
        return view('popup').view('header');
    }
}
public function index2($idConference) {
    // Utilisation du modèle pour récupérer les présentations par ID de conférence
    $modele = new Modele();
    $presentations = $modele->getPresentationsParConference($idConference);

    // Passer les données à la vue
    return view('header').view('vue', ['presentations' => $presentations]);
}
public function index3() {
    $modele = new Modele();
    $data['conferences'] = $modele->getLesConferences();
    
    // Vérifiez si une conférence est sélectionnée, sinon utilisez la première conférence par défaut
    $selectedConference = $this->request->getPost('conference') ?? ($data['conferences'][0]['idconference'] ?? null);
    
    if ($selectedConference) {
        // Récupérez les présentations pour la conférence sélectionnée
        $data['presentations'] = $modele->getPresentationsByConference($selectedConference);
        
        // Récupérez les dates disponibles pour la première présentation par défaut
        $selectedPresentation = $data['presentations'][0]['horaire'] ?? null;
        if ($selectedPresentation) {
            $data['dates'] = $modele->getDatesByConferenceAndPresentation($selectedConference, $selectedPresentation);
        }
    }
    
    $data['selectedConference'] = $selectedConference;
    
    return view('votre_vue', $data);
}
// Dans votre contrôleur, par exemple ConferenceController.php

public function getConferenceInfo($conferenceId) {
    // Récupérez les informations de la conférence à partir de votre modèle ou de votre base de données
    $modele = new Modele();

    $conferenceInfo = $modele->getConference($conferenceId); // Assurez-vous d'adapter cela à votre application

    // Renvoyer les informations de la conférence au format JSON
    echo json_encode($conferenceInfo);
}
// Dans votre fichier de route ou de contrôleur
public function getPresentations() {
    if(isset($_GET['conference_Id'])) {
        // Si la clé est définie, récupérez sa valeur
        $conferenceId = $_GET['conference_Id']; // Assurez-vous de valider et d'échapper cette valeur pour éviter les attaques par injection SQL

        // Effectuez une requête à votre base de données pour récupérer les informations des présentations
        // Supposez que vous avez un modèle de présentation (PresentationModel) pour interagir avec la base de données
        $presentationModel = new Modele();
        $presentations = $presentationModel->getPresentationsByConferenceId($conferenceId = 1);

        // Retournez les données au format JSON
        header('Content-Type: application/json');
        echo json_encode($presentations);
        
        exit;
    } else {
        echo "echec" ;
    }
}



}

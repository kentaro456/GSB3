<?php

namespace App\Libraries;

use App\Models\Mon_model;
use TCPDF;

require_once APPPATH . 'ThirdParty/tcpdf/tcpdf.php';

class PdfGenerator
{
    public function generatePdf($unePresentation, $infoVisiteur, $nbSiege)
    {
        $pageWidth = 400;
        $pageHeight = 400;

    // Instancier la classe TCPDF avec la taille personnalisée
    $pdf = new TCPDF('L', 'pt', array($pageWidth, $pageHeight));

        $saConf = null;

        foreach(Mon_model::$lesConferences as $uneConf)
        {
            if($uneConf->getIdConf() == $unePresentation->getIdConference())
            {
                $saConf = $uneConf;
                break;
            }
        }

        $pdf->SetFont('dejavusans', '', 12);

        $pdf->AddPage();

        $pdf->Image(base_url('images/logo.png'), 180, 0, 40, 40);


        $pdf->SetXY(10, 50);
        $pdf->Cell(0, 10, 'Ticket pour une présentation', 0, 1, 'C');
    
        $pdf->SetXY(10, 80);
        $pdf->Cell(0, 10, 'Titre de la présentation : ' . $saConf->getThemeConf(), 0, 1);
    
        $pdf->SetXY(10, 110);
        $pdf->Cell(0, 10, 'Date de la présentation : ' . $unePresentation->getDatePres(), 0, 1);
    
        $pdf->SetXY(10, 140);
        $pdf->Cell(0, 10, 'Horaire de la présentation : ' . $unePresentation->getHorairePres(), 0, 1);

        $pdf->SetXY(10, 140 + 30);
        $pdf->Cell(0, 10, 'Durée de la présentation : ' . $unePresentation->getDureePres(), 0, 1);
    
        $pdf->SetXY(10, 170 + 30);
        $pdf->Cell(0, 10, 'Salle : ' . $unePresentation->getSaSalle()->getNomSalle(), 0, 1);

        $pdf->SetXY(10, 200 + 30);
        $pdf->Cell(0, 10, 'Place n° : ' . $nbSiege, 0, 1);

        $pdf->SetXY(10, 230 + 30);
        $pdf->Cell(0, 10, 'Visiteur : ' . $infoVisiteur['nom'].' '.$infoVisiteur['prenom'], 0, 1);

        $pdf->SetXY(10, 290);
        $pdf->Cell(0, 10, 'Animateur : ' . $unePresentation->getSonAnim()->getNomAnimateur().' '. $unePresentation->getSonAnim()->getPrenomAnimateur(), 0, 1);

        $pdf->SetXY(10, 320);
        $pdf->Cell(0, 10, 'Intervenant : ' . $unePresentation->getSonIntervenant()->getNomIntervenant().' '. $unePresentation->getSonIntervenant()->getPrenomIntervenant(), 0, 1);

        $pdf->Output('ticket_concert.pdf', 'D');
    }


}
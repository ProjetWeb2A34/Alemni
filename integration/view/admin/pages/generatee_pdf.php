<?php

require_once ('../../../vendor/autoload.php');
require_once ('../../../vendor/tecnickcom/tcpdf/tcpdf.php');
// Database connection
$db = new PDO('mysql:host=localhost;dbname=webapp;charset=utf8', 'root', '');

// Fetch all authors
$query = $db->query('SELECT * FROM paiement');
$paiements = $query->fetchAll(PDO::FETCH_ASSOC);

class MyPDF extends TCPDF
{
    public function ColoredTable($header, $data)
    {
        $this->SetFillColor(25, 199, 155);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        $w = array(50, 80, 30); // Further adjusted widths
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row['num_cart'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row['email'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, 'payer', 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('mohamed jaffel');
$pdf->SetTitle('Alamni Online Study paiement list');
$pdf->SetSubject('Alamni Online Study paiement list');
$pdf->SetKeywords('Alamni Online Study paiement list, PDF, paiement, list');

$pdf->SetHeaderData('../../images/alamnistudy.png', 100, 'Alamni Online Study', "paiement List");
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('dejavusans', '', 10);

$pdf->AddPage();

$header = array('num-carte', 'Email','etat');
$pdf->ColoredTable($header, $paiements);

$pdf->Output('paiements_list.pdf', 'I');
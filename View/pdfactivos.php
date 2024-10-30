<?php

require '../fpdf/fpdf.php';
require 'conexionpdf.php';

//include "../../../../includes/qr/qrlib.php";


class PDF extends FPDF {

    var $widths;
    var $aligns;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'R';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            //$this->Rect($x,$y,$w,$h);
            $this->MultiCell($w, 5, $data[$i], 0, $a, '');
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

}

// Creación del objeto de la clase heredada
//$pdf = new PDF();
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$id_factura = $_GET['id'];
$con = new DB;
$ingreso = $con->conectar();

$pdf->SetMargins(15, 15, 15);

$strConsulta = "
  SELECT a.idactivo, a.idcategoria, a.idtiposactivo, a.idsubtipoactivos, a.idmarca, a.serie, a.codigoinventario, 
                            a.nombreequipo, a.estado, a.otros, a.rnd, c.descategoria, ta.descripcionta, sta.descripcionsta, mar.desmarca, mar.modelo FROM activo a
                            inner join categoria c on c.idcategoria=a.idcategoria
                            inner join tiposactivo ta on ta.idtiposactivo=a.idtiposactivo
                            inner join subtipoactivos sta on sta.idsubtipoactivos=a.idsubtipoactivos
                            inner join marca mar on mar.idmarca=a.idmarca where a.idactivo='$id_factura'
      ";

$consulta_factura = mysql_query(" SELECT a.idactivo, a.idcategoria, a.idtiposactivo, a.idsubtipoactivos, a.idmarca, a.serie, a.codigoinventario, 
                            a.nombreequipo, a.estado, a.otros, a.rnd, c.descategoria, ta.descripcionta, sta.descripcionsta, mar.desmarca, mar.modelo FROM activo a
                            inner join categoria c on c.idcategoria=a.idcategoria
                            inner join tiposactivo ta on ta.idtiposactivo=a.idtiposactivo
                            inner join subtipoactivos sta on sta.idsubtipoactivos=a.idsubtipoactivos
                            inner join marca mar on mar.idmarca=a.idmarca where a.idactivo='$id_factura'");

//Descargar Resultado en XML
if ($row4 = mysql_fetch_array($consulta_factura)) {

    $general = mysql_query($strConsulta);
    $fila = mysql_fetch_array($general);

    /** LOGO Y DIRECCIONES * */
    $pdf->Image('img/logo.jpg', 15, 8, 30, 30, 'JPG', '');
    $pdf->Ln(4);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(35);
    $pdf->Cell(50, 4, 'UNIVERSIDAD CESAR VALLEJO - TRUJILLO', 0, 1, 'L');
    $pdf->Ln(1);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(35);
    $pdf->Cell(18, 3, 'DIRECCION: ', 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(35, 3, 'AV. LARCO 1770', 0, 1, 'L');
    $pdf->Cell(35);
    $pdf->Cell(7, 3, 'https://www.ucv.edu.pe/', 0, 0, 'L');
    /** FIN LOGO Y DIRECCIONES * */
    /** BORDES REDONDEADOS * */
    $pdf->RoundedRect(145, 12, 50, 25, 1, '1234', '');
    $pdf->RoundedRect(15, 42, 180, 17, 1, '1234', '');
    $pdf->RoundedRect(15, 61, 180, 10, 1, '1234', '');
    $pdf->RoundedRect(15, 75, 180, 130, 1, '1234', '');
    $pdf->RoundedRect(15, 208, 180, 50, 1, '1234', '');
    $pdf->Line(30, 85, 30, 195);
    //$pdf->Line(110,85,110,195);
    $pdf->Line(135, 85, 135, 195);
    $pdf->Line(150, 85, 150, 195);
    $pdf->Line(170, 85, 170, 195);
    $pdf->Line(15, 195, 195, 195);
    $pdf->Line(110, 208, 110, 258);
    /** FIN BORDES REDONDEADOS * */
    /** DATOS DE FACTURA * */
    $pdf->SetXY(135, 17);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(70, 7, 'ACTIVOS', '', 1, 'C');
    $pdf->SetXY(135, 22);
    $pdf->Cell(70, 7, '', '', 1, 'C');
    $pdf->SetXY(135, 22);
    $pdf->Cell(70, 7, '' . $fila['codigoinventario'] . ' - ' . $fila['serie'], '', 1, 'C');
    /** FIN DATOS FACTURA * */
    /** DATOS CLIENTE * */
    $pdf->Ln(12);
    
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(2);
    $pdf->Cell(18, 5, utf8_decode('CATEGORIA:'), 0, 0, 'L');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(152, 5, '' . utf8_decode($fila['descategoria']), 0, 1, 'L');
  
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(2);
    $pdf->Cell(18, 5, utf8_decode('TIPO:'), 0, 0, 'L');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(110, 5, '' . utf8_decode($fila['descripcionta']), 0, 1, 'L');


    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(2);
    $pdf->Cell(18, 5, 'MARCA:', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(30, 4, '' . $fila['desmarca'], 0, 1, 'L');
    
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(2);
    $pdf->Cell(18, 5, 'SERIE:', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(30, 4, '' . $fila['serie'], 0, 1, 'L');
    
    
    /** FIN DATOS CLIENTE * */
    /** DETALLE DE LA FACTURA * */
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(15, 10, 'PERIFERICO', 'RB', 0, 'C');
    $pdf->Cell(105, 10, 'DESCRIPCION', 'RB', 0, 'C');
    $pdf->Cell(15, 10, 'DESCRIPCION', 'RB', 0, 'C');
    $pdf->Cell(20, 10, 'DESCRIPCION', 'RB', 0, 'C');
    $pdf->Cell(25, 10, 'DESCRIPCION', 'RB', 0, 'C');
    //$pdf->Cell(25,10, 'SUB TOTAL','B',0,'C');
 

    $strConsulta_detalle = "SELECT a.idactivoperifericodetalle, a.descripcion1, a.descripcion2, a.descripcion3, a.descripcion4, a.idperifericos, a.idactivo, p.desperifericos FROM activoperifericodetalle a
inner join perifericos p on p.idperifericos=a.idperifericos where a.idactivo='$id_factura'


	";

    // DETALLE DE LA FACTURA

    $detalle_fac = mysql_query($strConsulta_detalle);
    $numfilas_fac = mysql_num_rows($detalle_fac);

    $pdf->SetWidths(array(10, 40, 80, 20, 25,18));
    $pdf->SetTextColor(0);
    $pdf->Ln(20);

    for ($i = 0; $i < $numfilas_fac; $i++) {
        $numfilas = mysql_fetch_array($detalle_fac);
        ;
        $pdf->SetFont('Arial', '', 7);

        if ($i % 2 == 1) {
            $pdf->Row(array($numfilas['desperifericos'], utf8_decode($numfilas['descripcion1']), utf8_decode($numfilas['descripcion2']), utf8_decode($numfilas['descripcion3']), utf8_decode($numfilas['descripcion4'])));
        } else {
            $pdf->Row(array($numfilas['desperifericos'], utf8_decode($numfilas['descripcion1']), utf8_decode($numfilas['descripcion2']), utf8_decode($numfilas['descripcion3']), utf8_decode($numfilas['descripcion4'])));
        }
    }
 

    /** FIN DETALLE FACTURA * */
    /** MONTOS FACTURA * */



   


   

    //Leer Hash


    $pdf->Output();
} else {
    echo "INGRESO DE LOS ACTIVOS";
}
?>
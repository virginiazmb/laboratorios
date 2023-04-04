<?php

require ('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include '../db/conexion.php';

      $consulta_info = $conect->query(" select * from productos_agg ");
      $archives = $consulta_info->fetch_object();
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('LABORATORIO CLEANIX'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(208, 010, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE PRODUCTOS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(208, 010, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(18, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('DESCRIPCION'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('PRECIO'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include '../db/conexion.php';

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages(); 

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$consulta_reporte = $conect->query(" select * from productos_agg ");

while ($datos = $consulta_reporte->fetch_object()) {      
$i = $i + 1;
/* TABLA */
   $pdf->Cell(18, 10, utf8_decode($datos-> id), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos-> nombre_product), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos-> cantidad_product), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos-> descripcion_product), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos-> precio_product), 1, 1, 'C', 0);

}

$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)

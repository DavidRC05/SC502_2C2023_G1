<?php
require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('LOGO-REGISTRO.png', 185, 10, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 128, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('CLINIC CARE'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : Novacentro-Guadalupe San José "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono: +50672077328 "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : hello@company.co "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : Novacentro-Guadalupe San José  "), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 0, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 30);
      $this->Cell(100, 10, utf8_decode("Reporte de cita pdf"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(0, 128, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(240, 248, 255); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(18, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Apellidos'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Cedula'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Telefonos'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('Fecha_y_hora'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Servicio'), 1, 1, 'C', 1);
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

// Verificar si se proporcionó el ID de la cita en la URL
if (isset($_GET['id_cita'])) {
   $id_cita = $_GET['id_cita'];

   // Aquí realizamos la consulta a la base de datos para obtener la información de la cita con el id_cita proporcionado

   // Datos de conexión a la base de datos
   include '../db/conexion.php';

   // Verificar la conexión
   if ($conexion->connect_error) {
      die("Error de conexión: " . $conexion->connect_error);
   }

   // Realizamos la consulta para obtener los datos de la cita con el id_cita proporcionado
   $sql = "SELECT * FROM citas WHERE Cedula = '$id_cita'";
   $result = mysqli_query($conexion, $sql);
   $datos_cita = mysqli_fetch_assoc($result);

   // Cierra la conexión a la base de datos
   mysqli_close($conexion);

   // Generamos el PDF con los datos obtenidos
   $pdf = new PDF();
   $pdf->AddPage();
   // Cabecera del PDF con la información de la empresa
   // ...
   // Resto de la cabecera del PDF
   // ...

   // Título de la tabla
   // ...
   // Campos de la tabla y datos de la cita
   $pdf->SetFont('Arial', '', 12);
   $pdf->SetDrawColor(163, 163, 163); //colorBorde

   $pdf->Cell(18, 10, utf8_decode($datos_cita['Nombre']), 1, 0, 'C', 0); // campo1 es el nombre del campo en la tabla de la base de datos que contiene el dato a mostrar
   $pdf->Cell(20, 10, utf8_decode($datos_cita['Apellido']), 1, 0, 'C', 0); // campo2 es el nombre del campo en la tabla de la base de datos que contiene el dato a mostrar
   $pdf->Cell(30, 10, utf8_decode($datos_cita['Cedula']), 1, 0, 'C', 0); // campo3 es el nombre del campo en la tabla de la base de datos que contiene el dato a mostrar
   $pdf->Cell(25, 10, utf8_decode($datos_cita['Telefonos']), 1, 0, 'C', 0); // campo4 es el nombre del campo en la tabla de la base de datos que contiene el dato a mostrar
   $pdf->Cell(70, 10, utf8_decode($datos_cita['Fecha_y_hora']), 1, 0, 'C', 0); // campo5 es el nombre del campo en la tabla de la base de datos que contiene el dato a mostrar
   $pdf->Cell(25, 10, utf8_decode($datos_cita['Servicio']), 1, 1, 'C', 0); // campo6 es el nombre del campo en la tabla de la base de datos que contiene el dato a mostrar

   $pdf->Output('ReeporteclinicCare.pdf', 'I'); //nombreDescarga, Visor(I->visualizar - D->descargar)
}

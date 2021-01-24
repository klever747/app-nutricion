<?php
session_start();
if (!isset($_SESSION['S_IDUSUARIO'])) {
    header('Location:../../../../login/index.php');
}

require_once __DIR__ . '/../vendor/autoload.php';
//require_once '../../../conexion_reportes/conexion_report.php';
$mysqli   = new mysqli('localhost', 'root', '', 'bd_curso');
$consulta = "SELECT cita.cita_id,CONCAT(' ',paciente.paciente_nombre,paciente.paciente_apellidop ,paciente.paciente_apellidom) as paciente,CONCAT_WS(' ',medico.medico_nombre,medico.medico_apellidop,medico.medico_apellidom) as medico,cita.cita_numeroaten,cita.cita_fecharegistro,cita.cita_descripcion,especialidad.especialidad_nombre FROM cita INNER JOIN medico ON cita.medico_id = medico.medico_id INNER JOIN paciente ON cita.paciente_id=paciente.paciente_id INNER JOIN especialidad ON medico.especialidad_id = especialidad.especialidad_id where cita_id= '" . $_GET[id] . "'";
$html     = "<h1 style ='text-align:center'>HISTORIA CLINICA</h1>";
//while ($row = $resultado->fetch_assoc()) {

//}
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf - 8', 'format' => 'A4']);
$mpdf->WriteHTML($html);
$mpdf->Output();

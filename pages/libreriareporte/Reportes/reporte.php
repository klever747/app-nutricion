<?phP
require_once __DIR__ . '/../vendor/autoload.php';
//require_once '../../../conexion_reportes/conexion_report.php';
$mysqli   = new mysqli('localhost', 'root', '', 'bd_curso');
$consulta = "SELECT cita.cita_id,CONCAT(' ',paciente.paciente_nombre,paciente.paciente_apellidop ,paciente.paciente_apellidom) as paciente,CONCAT_WS(' ',medico.medico_nombre,medico.medico_apellidop,medico.medico_apellidom) as medico,cita.cita_numeroaten,cita.cita_fecharegistro,cita.cita_descripcion,especialidad.especialidad_nombre FROM cita INNER JOIN medico ON cita.medico_id = medico.medico_id INNER JOIN paciente ON cita.paciente_id=paciente.paciente_id INNER JOIN especialidad ON medico.especialidad_id = especialidad.especialidad_id where cita_id= '" . $_GET[id] . "'";
$html     = "<style>
. barcode{
    padding:1.5mm;
    margin:0;
    vertical - align:top;
    color:black;
}
. barcodecell{
    text - align:center;
    vertical - align:middle;
}
</style>
";
$resultado = $mysqli->query($consulta);
while ($row = $resultado->fetch_assoc()) {
    $html = "<table style='border-collapse:collapse' border='1' >
		<tr>
			<td style='border-bottom:1px solid;border-left:0px;border-top:0px;border-right:0px;'><h3 style= 'fontsize:20px'> DATOS DE LA CITA </h3>
			</td>
		</tr>
		</table><br><b> NumerodeAtención: </b> " . $row['cita_numeroaten'] . "<br><b> Paciente: <b><br> " . $row['paciente'] . "<br> Doctor: </b><br> " . $row['medico'] . "<br><br><b> Especialidad: </b><br>" . $row['especialidad_nombre'] . "<br><br><b> Descripcion: </b><br> " . $row['cita_descripcion'] . " <br> ................................. .  .
	<table>
	<tr>
	<td  style ='text-align:center'><b>Gracias por confiar en nosotros </b></td>
	</tr>
	</table>
	<div style ='text-align:center' class='barcodecell'><barcode code='" . $row['cita_id'] . "' type='I25' class='barcode' /><br> " . $row['cita_id'] . "</div>
";
}
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf - 8', 'format' => [80, 150]]);
$mpdf->WriteHTML($html);
$mpdf->Output();

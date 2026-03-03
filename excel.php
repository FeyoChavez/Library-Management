<?php

include "config/database.php";

$query=mysqli_query($con,"SELECT * FROM loans");
$docu="reporte_prestamo.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$docu);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=6>Reporte de detalle de Prestamos</th>';
echo '<tr>';
echo '<tr><th>ID</th><th>ALUMNO</th><th>NO.CONTROL</th><th>CARRERA</th><th>LIBRO</th>';

while($row=mysqli_fetch_array($query)){
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['student_name'].'</td>';
    echo '<td>'.$row['control_number'].'</td>';
    echo '<td>'.$row['career'].'</td>';
    echo '<td>'.$row['book_id'].'</td>';
}

echo '</table>';
?>
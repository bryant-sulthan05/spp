<?php
include '../../app/config.php';
$spp_id = $_POST['spp_id'];

$_tahun = $con->query("SELECT * FROM spp WHERE spp_id = '$spp_id'");
$data = array();
while ($row = mysqli_fetch_array($_tahun)) {
    $data['spp_id'] = $row['spp_id'];
    $data['tahun_ajaran'] = $row['tahun_ajaran'];
    $data['nominal'] = $row['nominal'] / 12;
}
echo json_encode($data);

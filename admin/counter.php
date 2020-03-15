<?php
//getting number of active  courses
if(isset($_GET['getcount'])){
include "../link.php";
    $query = mysqli_query($mysqli, "SELECT * from babs WHERE active= 1");
    $output['active'] = $query->num_rows;

    $query = mysqli_query($mysqli, "SELECT * from arome");
    $output['students'] = $query->num_rows;

    $query = mysqli_query($mysqli, "SELECT * from arome where online = 1");
    $output['online'] = $query->num_rows;

    $query = mysqli_query($mysqli, "SELECT * from arome where activated = 0");
    $output['activated'] = $query->num_rows;

    $query = mysqli_query($mysqli, "SELECT * from babs");
    $output['course'] = $query->num_rows;

    $query = mysqli_query($mysqli, "SELECT * from elton");
    $output['result'] = $query->num_rows;

echo json_encode($output);
}
else{
    echo "0";
}
?>
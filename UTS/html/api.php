<?php
header('Access-Control-Allow-Origin:*');
header('Content-type: application/json');


include "connection.php";

include "fungsi.php";

$data =  array();


if(isset($_GET['id']) && cekId($_GET['id'])){
    $id = $_GET['id'];
 
    $sql = "SELECT home.*,about.*,project.*,work.*,contact.*
     FROM home
     LEFT JOIN about ON home.id = about.id
     LEFT JOIN project ON home.id = project.id
     LEFT JOIN work ON home.id = work.id
     LEFT JOIN contact ON home.id = contact.id
     WHERE home.id=$id";
    
    $result = mysqli_query($conn, $sql);

    

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $data = $row;
    }
    
    else{
        
        $data['error'] = 'Data tidak ditemukan';
    }   
}
else{
    
    $data['error'] = 'Invalid ID';
}
// tampilkan data dalam format JSON
echo json_encode($data);

mysqli_close($conn);
?>

<?php
// $data = array();

// if (isset($_FILES['upload']['name'])) {
//     $file_name = $_FILES['upload']['name'];
//     $file_tmp_name = $_FILES['upload']['tmp_name'];
//     $file_path = '/images/uploads/' . $file_name;
//     $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    
//     // Uzantı kontrolü
//     if (in_array($file_extension, ['jpg', 'jpeg', 'png'])) {
//         // Dosya yolu güncellemesi
//         $file_path = 'images/uploads/' . uniqid() . '.' . $file_extension;
//         if (move_uploaded_file($file_tmp_name, $file_path)) {
//             // CKEditor beklenen format
//             $data = [
//                 "uploaded" => 1,
//                 "fileName" => basename($file_path),
//                 "url" => '/' . $file_path
//             ];
//         } else {
//             $data = [
//                 "uploaded" => 0,
//                 "error" => ["message" => "Dosya yüklenemedi."]
//             ];
//         }
//     } else {
//         $data = [
//             "uploaded" => 0,
//             "error" => ["message" => "Geçersiz dosya uzantısı."]
//         ];
//     }
// }

// echo json_encode($data);
?>

<?php
$data = array();

if (isset($_FILES['upload']['name'])) {
    $file_name = $_FILES['upload']['name'];
    $file_tmp_name = $_FILES['upload']['tmp_name'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $new_file_name = uniqid() . '.' . $file_extension; // Yeni dosya adı
    // $file_path = $_SERVER['DOCUMENT_ROOT'] . '/personal_blog/admin_panel/images/uploads/' . $new_file_name;
    $file_path = $_SERVER['DOCUMENT_ROOT'] . '/kelly/admin_panel/images/uploads/' . $new_file_name;

    // print_r($file_path);

    // Uzantı kontrolü
    if (in_array($file_extension, ['jpg', 'jpeg', 'png'])) {
        if (move_uploaded_file($file_tmp_name, $file_path)) {
            // CKEditor beklenen format 

            $data = [
                "uploaded" => 1,
                "fileName" => $new_file_name, 
                "url" => 'http://localhost/Kelly/admin_panel/images/uploads/' . $new_file_name    
            ];
        } else {
            $data = [
                "uploaded" => 0,
                "error" => ["message" => "Dosya yüklenemedi."]
            ];
        }
    } else {
        $data = [
            "uploaded" => 0,
            "error" => ["message" => "Geçersiz dosya uzantısı."]
        ];
    }
}

echo json_encode($data);
?>


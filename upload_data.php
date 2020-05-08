<?php
date_default_timezone_set('Europe/Paris');
$upload_dir = "upload/";
$img = $_POST['hidden_data'];
$name = $_POST['name'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $name . "_" . date("d_m_y_H_i_s") . ".png";
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
?>
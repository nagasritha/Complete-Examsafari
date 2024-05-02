<?php
session_start();
require_once("connection.php");

function returnError($message) {
  $response = ["success" => false, "message" => $message];
  header('Content-Type: application/json');
  echo json_encode($response);
  exit(); // Stop further execution
}

function returnSuccess($message) {
  $response = ["success" => true, "message" => $message];
  header('Content-Type: application/json');
  echo json_encode($response);
  exit(); // Stop further execution
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["action"]==="POST"){
        $service_qt = $_POST["service_qt"];
        $service_hd = $_POST["service_hd"];
        $about_qt = $_POST["about_qt"];
        $about_hd = $_POST["about_hd"];
        $about_comment = $_POST["about_comment"];
        $about_content = $_POST["about_content"];
        $trust_qt = $_POST["trust_qt"];
        $trust_hd = $_POST["trust_hd"];
        $booking_ht1 = $_POST["booking_ht1"];
        $booking_ht2 = $_POST["booking_ht2"];
        $cities_ht1 = $_POST["cities_ht1"];
        $cities_ht2 = $_POST["cities_ht2"];
        $faq_ht1=$_POST["faq_ht1"];
        $faq_ht2 = $_POST["faq_ht2"];
        $final_t = $_POST["final_t"];
        if($_FILES["logo"]["error"]===4){
            returnError ('Image does not exist');
        }
        else{
            $fileName=$_FILES["logo"]["name"];
            $fileSize = $_FILES["logo"]["size"];
            $tempName = $_FILES["logo"]["tmp_name"];
    
            $validateImageExtension =['jpg', 'jpeg', 'png'] ;
            $imageExtension = explode('.',$fileName);
            $imageExtension = strtolower(end($imageExtension));
            
            if(!in_array($imageExtension,$validateImageExtension)){
                returnError(`Invalid File ${imageExtension}`);
            }
            else if($fileSize >1000000){
                returnError('image size is too large');
            }
            else{
                $newImageName = uniqid();
                $newImageName .= ".".$imageExtension;
                move_uploaded_file($tempName, 'Images/' . $newImageName);
                $update_query = "UPDATE home_page SET `logo`=?, `service_qt`=?, `service_hd`=?, `about_qt`=?, `about_hd`=?, `about_content`=?, `about_comment`=?, `trust_qt`=?, `trust_hd`=?, `booking_ht1`=?, `booking_ht2`=?, `cities_ht1`=?, `cities_ht2`=?, `final_t`=?, `faq_ht1`=?, `faq_ht2`=?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("ssssssssssssssss", $newImageName, $service_qt, $service_hd, $about_qt, $about_hd, $about_content, $about_comment, $trust_qt, $trust_hd, $booking_ht1, $booking_ht2, $cities_ht1, $cities_ht2, $final_t, $faq_ht1, $faq_ht2);
                
                if ($stmt->execute()) {
                    returnSuccess('Home Content updated');
                } else {
                    returnError('Error inserting record into Home Content table');
                }
                

            }
        }
    
    }

}


?>

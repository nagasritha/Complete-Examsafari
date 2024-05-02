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
        $name = $_POST['name'];
        $whatsapp_no = $_POST["whatsapp_no"];
        $address = $_POST["address"];
        $nearby_bus_stop = $_POST['nearby_bus_stop'];
        $exam = $_POST["exam"];
        $exam_date = $_POST["exam_date"];
        $exam_city = $_POST["exam_city"];
        $exam_center = $_POST["exam_center"];
        $req_service = $_POST["req_service"];
        $admit_card = $_POST["admit_card"];
        $presentDate = new DateTime();
        $exam_date_formatted = new DateTime($exam_date);
        $diff = $presentDate->diff($exam_date_formatted);
        
        $signedDifference = $diff->format('%R%a');
        if($signedDifference >= 4){
            if($_FILES["admit_card"]["error"]===4){
                echo "<script>alert('Image does not exist')</script>";
            }
            else{
                $fileName=$_FILES["admit_card"]["name"];
                $fileSize = $_FILES["admit_card"]["size"];
                $tempName = $_FILES["admit_card"]["tmp_name"];

                $validateImageExtension =['jpg', 'jpeg', 'png', 'pdf'] ;
                $imageExtension = explode('.',$fileName);
                $imageExtension = strtolower(end($imageExtension));
                
                if(!in_array($imageExtension,$validateImageExtension)){
                    echo "<script>alert(`Invalid File ${imageExtension}`);</script>";
                }
                else if($fileSize >1000000){
                    echo "<scritp>alert('image size is too large');</scritp>";
                }
                else{
                    $newImageName = uniqid();
                    $newImageName .= ".".$imageExtension;
                    if($imageExtension === "pdf"){
                        move_uploaded_file($tempName, 'pdf/' . $newImageName);
                    }
                    else{
                        move_uploaded_file($tempName, 'Images/' . $newImageName);
                    }
                    $insert_query = "INSERT INTO enquire_form (name,whatsapp_no,address,nearby_bus_stop,exam,exam_date,exam_city,exam_center,req_service,admit_card) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($insert_query);
                    $stmt->bind_param("ssssssssss", $name, $whatsapp_no,$address,$nearby_bus_stop,$exam,$exam_date,$exam_city,$exam_center,$req_service,$newImageName);
                    
                    if ($stmt->execute()) {
                        returnSuccess('Request added');
                    } else {
                        returnError('Error inserting data');
                    }
                }
            }
        }else{
            returnError("We expect your request atleast 4 days before your exam");
        }
        // Use prepared statements to prevent SQL injection
        
    }
}


?>

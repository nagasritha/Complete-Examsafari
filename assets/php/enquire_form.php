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
        if($signedDifference<=4){
            echo "true";
        }else{
            echo "false";
        }
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
        
    }else if($_POST["action"]==="PUT"){
        if ( !isset($_POST["title"]) || !isset($_POST["description"]) || !isset($_POST["icon"])) {
            returnError('Missing parameters for updating service');
        }

        $id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $icon = $_POST["icon"];
        if($_FILES["image"]["error"]===4){
            echo "<script>alert('Image does not exist')</script>";
        }
        else{
            $fileName=$_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tempName = $_FILES["image"]["tmp_name"];
    
            $validateImageExtension =['jpg', 'jpeg', 'png'] ;
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
    
                move_uploaded_file($tempName, 'Images/' . $newImageName);
                $update_query = "UPDATE services SET title=?, description=?, icon=? , image=? WHERE id=?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("ssssi", $title, $description, $icon, $image, $id);
                
                
                if ($stmt->execute()) {
                    returnSuccess('Service updated');
                } else {
                    returnError('Error updating service');
                }

            }
        }
    

        
    }else if ($_POST["action"] === "DELETION") {
        // Check if the "id" parameter exists in the POST data
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            // Prepare the SQL query to delete the record with the given ID
            $query = "DELETE FROM services WHERE id = ?";
            $stmt = $conn->prepare($query);
            // Bind the parameter
            $stmt->bind_param("i", $id);
            // Execute the query
            if ($stmt->execute()) {
                // If deletion is successful, return success message
                returnSuccess("Service Deleted");
            } else {
                // If deletion fails, return error message
                returnError("Failed To Delete The Service");
            }
        } else {
            // If "id" parameter is not provided, return error message
            returnError("ID parameter is missing");
        }
    } else {
        // If action is not "DELETION", return error message
        returnError("Invalid action");
    }

}


?>

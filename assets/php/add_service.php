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
                $query = "SELECT * FROM services WHERE title = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $title);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    returnError('Service already exists');
                } else {
                    $insert_query = "INSERT INTO services (icon, title, description,image) VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($insert_query);
                    $stmt->bind_param("ssss", $icon, $title, $description, $newImageName);
                    
                    if ($stmt->execute()) {
                        returnSuccess('Service added');
                    } else {
                        returnError('Error inserting record into services table');
                    }
                }

            }
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
                $stmt->bind_param("ssssi", $title, $description, $icon, $newImageName, $id);
                
                
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

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
        $title = $_POST["heading"];
        $description = $_POST["description"];
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
                $query = "SELECT * FROM home_banner_carousal WHERE heading = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $title);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    returnError('Banner already exists');
                } else {
                    $insert_query = "INSERT INTO home_banner_carousal (heading, description, bannerImage) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($insert_query);
                    $stmt->bind_param("sss", $title, $description, $newImageName);
                    
                    if ($stmt->execute()) {
                        returnSuccess('Banner added');
                    } else {
                        returnError('Error inserting record into table');
                    }
                }

            }
        }
    

        // Use prepared statements to prevent SQL injection
        
    }else if($_POST["action"]==="PUT"){

        $id = $_POST["id"];
        $title = $_POST["heading"];
        $description = $_POST["description"];
        if($_FILES["image"]["error"]===4){
            returnError('Image does not exist');
        }
        else{
            $fileName=$_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tempName = $_FILES["image"]["tmp_name"];
    
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
                $update_query = "UPDATE home_banner_carousal SET heading=?, description=? , bannerImage=? WHERE id=?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("sssi", $title, $description,$newImageName, $id);
                
                
                if ($stmt->execute()) {
                    returnSuccess('Banner updated');
                } else {
                    returnError('Error updating Banner');
                }

            }
        }
    

        
    }else if ($_POST["action"] === "DELETION") {
        // Check if the "id" parameter exists in the POST data
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            // Prepare the SQL query to delete the record with the given ID
            $query = "DELETE FROM home_banner_carousal WHERE id = ?";
            $stmt = $conn->prepare($query);
            // Bind the parameter
            $stmt->bind_param("i", $id);
            // Execute the query
            if ($stmt->execute()) {
                // If deletion is successful, return success message
                returnSuccess("Banner Deleted");
            } else {
                // If deletion fails, return error message
                returnError("Failed To Delete The Banner");
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

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
        
                $query = "SELECT * FROM bookingDetails WHERE title = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $title);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    returnError('Booking already exists');
                } else {
                    $insert_query = "INSERT INTO bookingDetails ( title, description) VALUES (?, ?)";
                    $stmt = $conn->prepare($insert_query);
                    $stmt->bind_param("ss", $title, $description);
                    
                    if ($stmt->execute()) {
                        returnSuccess('Booking added');
                    } else {
                        returnError('Error inserting record into table');
                    }
                }

            }
    

        // Use prepared statements to prevent SQL injection
        
    else if($_POST["action"]==="PUT"){
        if ( !isset($_POST["title"]) || !isset($_POST["description"])) {
            returnError('Missing parameters for updation');
        }

        $id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
       
        $update_query = "UPDATE bookingDetails SET title=?, description=? WHERE id=?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssi", $title, $description, $id);
        
        
        if ($stmt->execute()) {
            returnSuccess('Booking updated');
        } else {
            returnError('Error updating Booking');
        }

                   
    }else if ($_POST["action"] === "DELETION") {
        // Check if the "id" parameter exists in the POST data
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            // Prepare the SQL query to delete the record with the given ID
            $query = "DELETE FROM bookingDetails WHERE id = ?";
            $stmt = $conn->prepare($query);
            // Bind the parameter
            $stmt->bind_param("i", $id);
            // Execute the query
            if ($stmt->execute()) {
                // If deletion is successful, return success message
                returnSuccess("Booking Deleted");
            } else {
                // If deletion fails, return error message
                returnError("Failed To Delete");
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

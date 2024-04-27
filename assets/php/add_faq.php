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
        $question = $_POST["question"];
        $answer = $_POST["answer"];

        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM faqs WHERE question = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $question);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            returnError('Question already exists');
        } else {
            $insert_query = "INSERT INTO faqs (question,answer) VALUES (?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("ss", $question,$answer);
            
            if ($stmt->execute()) {
                returnSuccess('Question Added');
            } else {
                returnError('Error inserting record into Quesitons table');
            }
        }

    }else if($_POST["action"]==="PUT"){
        if ( !isset($_POST["question"]) || !isset($_POST["answer"]) || !isset($_POST["id"])) {
            returnError('Missing parameters for updating service');
        }

        $id = $_POST["id"];
        $question = $_POST["question"];
        $answer = $_POST["answer"];
        

        $update_query = "UPDATE faqs SET question=?, answer=? WHERE id=?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssi", $question, $answer, $id);
        
        if ($stmt->execute()) {
            returnSuccess('Question Updated');
        } else {
            returnError('Error Updating Question');
        }
    }else if ($_POST["action"] === "DELETION") {
        // Check if the "id" parameter exists in the POST data
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            // Prepare the SQL query to delete the record with the given ID
            $query = "DELETE FROM faqs WHERE id = ?";
            $stmt = $conn->prepare($query);
            // Bind the parameter
            $stmt->bind_param("i", $id);
            // Execute the query
            if ($stmt->execute()) {
                // If deletion is successful, return success message
                returnSuccess("Question Deleted");
            } else {
                // If deletion fails, return error message
                returnError("Failed To Delete The Question");
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

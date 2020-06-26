<?php

if ($_POST['action'] == 'create') {
    require_once('../functions/db.php');

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $workplace = filter_var($_POST['workplace'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);

    try {
        $stmt = $conn->prepare("INSERT INTO contacts (contact_name, workplace, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $workplace, $phone);
        $stmt->execute();

        $response = array(
            'response' => 'correct',
            'info' => $stmt->affected_rows,
            'data' => array(
                'name' => $name,
                'workplace' => $workplace, 
                'phone' => $phone,
                'inserted_id' => $stmt->insert_id
            )
        );


        $stmt->close();
        $conn->close();
       
    } catch(Exception $e) {
        $response = array(
            'error' => $e->getMessage()
        );
    }

    


    echo json_encode($response);
 
}

if ($_GET['action'] == 'delete') {

    require_once('../functions/db.php');

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    try {
        $stmt = $conn->prepare("DELETE FROM contacts WHERE contact_id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        if ($stmt->affected_rows == 1){
            $response = array(
                'status' => 'success'
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e ){
        $response = array(
            'error' => $e->getMessage()
        );
    }


    echo json_encode($response);

}


?>
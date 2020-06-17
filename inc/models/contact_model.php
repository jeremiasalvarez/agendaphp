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
                'phone' => $phone
            )
        );


        $stmt->close();
        $conn->close();
       
    } catch(Exception $e) {
        $response = array(
            'error' => $e->getMessage()
        );
    }

 
}

echo json_encode($response);


?>
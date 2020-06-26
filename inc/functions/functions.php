<?php 

    include 'db.php';

    function loadContacts() {
   
        try {
            include 'db.php';
            $queryString = "SELECT * FROM `contacts`";
            
            return $conn->query('SELECT * FROM contacts');

        } catch(Exception $e) {

            echo "Error! " . $e->getMessage();

            return false;
        }

    }
?>
<?php 

require_once 'lib/db.php';

// Debug info
// consoleLog($_POST, 'Form Data');

$db = connectToDB();
// Delete schedule from times
$query = 'DELETE FROM times WHERE id = ?';
            

            try {
                $stmt = $db->prepare($query);
                $stmt->execute([$id]);
            }
            catch (PDOException $e) {
                consoleLog($e->getMessage(), 'DB Delete', ERROR);
                die('There was an error when deleting item from database');
            }
            echo '<p>Schedule deleted!</p>';
            // Update page
            header('HX-Redirect: ' . SITE_BASE . '/profile');

<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'animesite') or die(mysqli_error($db));
if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'anime':
        echo 'Are you sure you want to delete this anime?<br/>';
        break;
    case 'caracter':
        echo 'Are you sure you want to delete this caracter?<br/>';
        break;
    } 
    echo 'Are you sure you want to delete it: <a href="' . $_SERVER['REQUEST_URI'] . '&do=1">YES</a> '; 
    echo 'or click <a href="admin.php">NO</a> to come again to HOME';
} else {
    switch ($_GET['type']) {
    case 'caracter':
        $query = 'UPDATE anime SET
                anime_leadactor = 0 
            WHERE
                anime_leadactor = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $query = 'DELETE FROM caracter 
            WHERE
                caracter_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Your caracter has been deleted.
<a href="admin.php">Return to Index</a></p>
<?php
        break;
    case 'anime':
        $query = 'DELETE FROM anime 
            WHERE
                anime_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Your movie has been deleted.
<a href="admin.php">Return to Index</a></p>
<?php
        break;
    }
}
?>
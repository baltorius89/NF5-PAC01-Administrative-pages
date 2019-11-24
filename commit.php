<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'animesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'anime':
        $query = 'INSERT INTO
            anime
                (anime_name, anime_year, anime_type, anime_leadactor,
                anime_director)
            VALUES
                ("' . $_POST['anime_name'] . '",
                 ' . $_POST['anime_year'] . ',
                 ' . $_POST['anime_type'] . ',
                 ' . $_POST['anime_leadactor'] . ',
                 ' . $_POST['anime_director'] . ')';
        break;
    
    case 'caracter':
        $query = 'INSERT INTO 
            caracter
                (caracter_fullname, caracter_isactor, caracter_isdirector)
            VALUES
                ("' . $_POST['caracter_fullname'] . '",
                 ' . $_POST['caracter_isactor'] . ',
                 ' . $_POST['caracter_isdirector'] . ')';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'anime':
        $query = 'UPDATE anime SET
                anime_name = "' . $_POST['anime_name'] . '",
                anime_year = ' . $_POST['anime_year'] . ',
                anime_type = ' . $_POST['anime_type'] . ',
                anime_leadactor = ' . $_POST['anime_leadactor'] . ',
                anime_director = ' . $_POST['anime_director'] . '
            WHERE
                anime_id = ' . $_POST['anime_id'];
        break;
    
    case 'caracter':
        $query = 'UPDATE caracter SET
                caracter_fullname = "' . $_POST['caracter_fullname'] . '",
                caracter_isactor = ' . $_POST['caracter_isactor'] . ',
                caracter_isdirector = ' . $_POST['caracter_isdirector'] . '
            WHERE
                caracter_id = ' . $_POST['caracter_id'];
        break;
    }
}
if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
     <p>Done!, Volver para ver los resultados -> <a href="admin.php">Home</a></p>
 </body>
</html>

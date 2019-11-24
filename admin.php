<html>
    <head>
        <title></title>
        <style>
            table {
                margin:auto;
                width: 500px;
            }
            tr {
               height:32px;
               text-align:center;
            }
        </style>
    </head>
    <body>
        <h1 align="center">BASE DE DATOS DE ANIME</h1>
        <table border='1'>
            <tr>
                <th colspan="3">Introduce un nuevo anime: </th>
            </tr>
            <tr>
                <th colspan="3" align="center">Lista de Animes: <a href="anime.php?action=add"><button>[ADD]</button></a></th>
            </tr>
            <?php
                $db = mysqli_connect('localhost', 'root') or 
                die ('Unable to connect. Check your connection parameters.');
                mysqli_select_db($db, 'animesite') or die(mysqli_error($db));
                $query = 'SELECT * FROM anime';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
                while ($row = mysqli_fetch_assoc($result)) {
                    extract($row);
                    $table.= <<<ENDHTML
                            <tr>
                                <td>$anime_name</td>
                                <td><a href="anime.php?action=edit&id=$anime_id&type=anime"><button>[EDIT]</button></a></td>
                                <td><a href="delete.php?action=delete&id=$anime_id&type=anime"><button>[DELETE]</button></a></td>
                            </tr>
ENDHTML;
                }
                $table.= '<tr>
                            <th colspan="3" align="center">Lista de Actores: <a href="caracter.php?action=add"><button>[ADD]</button></a></th>
                         </tr>';
                $query = 'SELECT * FROM caracter where caracter_isactor=1';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
                while ($row = mysqli_fetch_assoc($result)) {
                    extract($row);
                    $table.= <<<ENDHTML
                            <tr>
                                <td>$caracter_fullname</td>
                                <td><a href="caracter.php?action=edit&id=$caracter_id&type=caracter"><button>[EDIT]</button></a></td>
                                <td><a href="delete.php?action=delete&id=$caracter_id&type=caracter"><button>[DELETE]</button></a></td>
                            </tr>
ENDHTML;
                }
                $table.= '<tr>
                            <th colspan="3" align="center">Lista de Directores: <a href="caracter.php?action=add"><button>[ADD]</button></a></th>
                         </tr>';
                $query = 'SELECT * FROM caracter where caracter_isdirector=1';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
                while ($row = mysqli_fetch_assoc($result)) {
                    extract($row);
                    $table.= <<<ENDHTML
                            <tr>
                                <td>$caracter_fullname</td>
                                <td><a href="caracter.php?action=edit&id=$caracter_id&type=caracter"><button>[EDIT]</button></a></td>
                                <td><a href="delete.php?action=delete&id=$caracter_id&type=caracter"><button>[DELETE]</button></a></td>
                            </tr>
ENDHTML;
                }
                echo $table;
            ?>
        </table>
    </body>
</html>

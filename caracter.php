
<?php
    $db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db, 'animesite') or die(mysqli_error($db));
    if ($_GET['action'] == 'edit') {
        $query = 'SELECT * FROM caracter WHERE caracter_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        while ($row = mysqli_fetch_assoc($result)) {
                    extract($row);
        }
    } else {
        $caracter_fullname = '';
        $caracter_isactor = 0;
        $caracter_isdirector = 0;
    }
?>
<html>
    <head>
        <title><?php echo ucfirst($_GET['action']);?> Caracter</title>
        <style>
            td{
                padding:5px;
            }
        </style>
    </head>
    <body>
        <form action="commit.php?action=<?php echo $_GET['action'];?>&type=caracter" method="post">
            <table align="center" border="1">
                <tr>
                    <th>Caracter</th>
                    <td><input type="text" name="caracter_fullname" value="<?php echo $caracter_fullname;?>"/></td>
                </tr>
                <tr>
                    <th>IsActor</th>
                    <td>
                        <input type="number" name="caracter_isactor" max="1" min="0" value="<?php echo $caracter_isactor;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>IsDirector</th>
                    <td>
                        <input type="number" name="caracter_isdirector" max="1" min="0" value="<?php echo$caracter_isdirector;?>"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <?php
                        if ($_GET['action'] == 'edit') {
                            echo '<input type="hidden" value="' . $_GET['id'] . '" name="caracter_id" />';
                        }
                        ?>
                        <input type="submit" name="submit"
                        value="<?php echo ucfirst($_GET['action']); ?>" />
                    </td>         
                </tr>
            </table>
        </form>
    </body>
</html>
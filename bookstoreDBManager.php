<?php

function queryHandler($input)
{

    //When making a query, remember to add an period beside
    // db name, in order to specify which table it is pulling from.
    // EXAMPLE: SELECT *
    //          FROM cty0008db.db_supplier, cty0008db.db_book


    //Checks if input contains a SQL DROP statement

    if (strripos($input, "DROP") !== false
        || (strripos($input, "TRUNCATE")) !== false) {

        echo "Drop statements are not allowed!";
        return;
    }


    // returns number of rows
    //mysqli_num_rows();

    $servername = "sysmysql8.auburn.edu";
    $username = "cty0008";
    $password = "Greyf@xx200";
    $dbname = "cty0008db";

    // Creates the DB Connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Checks DB Connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Changes user input to omit "\" from webhost file
    $input = str_replace('\\', '', $input);
    $result = $conn->query($input);

    // Displays if you have an invalid input/MySQL error
    if (!$result) {
        echo mysqli_error($conn);
        return;
    }

// output data of each row
    if ($result->num_rows > 0) {
        $fieldnames="<tr>";

        // Makes the table's first rows (or column names), (i.e., "phone #")

        while ($col = mysqli_fetch_field($result)) {
            $fieldnames .= "<td>".$col->name."</td>";
        }
        $fieldnames .= "</tr>";

        //Creates rows that contain data of each column
        $rows = "";
        while ($row = mysqli_fetch_row($result)){
            //row*s* - row count for loop.
            $rows .= "<tr>";
            for($i=0; $i< count($row); $i++){
                $rows .= "<td>".$row[$i]."</td>";
            }
            $rows .= "</tr>";
        }


        echo "<table id='customers''>";
        echo $fieldnames;
        echo $rows;
        echo "</table>";
        echo $result->num_rows." row(s) returned.";
        mysqli_free_result($result);
    }



    $conn->close();
}
?>




<?php

include("config.php");
mysqli_select_db($conn, "dbescuela");

function campo($valor) {
    $usr = $_SESSION["username"];
    $sql = "SELECT Mat1, Mat2, Mat3, Mat4, Mat5 FROM Log_in WHERE Username = '$usr';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["Mat1"] == NULL) {
                $insert = "INSERT INTO Log_in (Mat1) VALUES ('$valor') WHERE Username = '$usr'";

                if (mysqli_query($conn, $insert)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else if ($row["Mat2"] == NULL) {
                $insert = "INSERT INTO Log_in (Mat2) VALUES ('$valor') WHERE Username = '$usr'";

                if (mysqli_query($conn, $insert)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else if ($row["Mat3"] == NULL) {
                $insert = "INSERT INTO Log_in (Mat3) VALUES ('$valor') WHERE Username = '$usr'";

                if (mysqli_query($conn, $insert)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else if ($row["Mat4"] == NULL) {
                $insert = "INSERT INTO Log_in (Mat4) VALUES ('$valor') WHERE Username = '$usr'";

                if (mysqli_query($conn, $insert)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else if ($row["Mat5"] == NULL) {
                $insert = "INSERT INTO Log_in (Mat5) VALUES ('$valor') WHERE Username = '$usr'";

                if (mysqli_query($conn, $insert)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Ya no puedes registrar mas materias";
            }
        }
    }
}
<?php
session_start();
include 'connexion.php';

if (isset($_POST['nom']) && isset($_POST['code'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $nom = validate($_POST['nom']);
    $code = validate($_POST['code']);

    if (empty($nom)) {
        header("Location:loginForm.php?error=Code is requiered");
    } else if (empty($code)) {
        header("Location:loginForm.php?error=Password is requiered");
    } else {
        $sql = "select * from enseignant where nom='$nom' and code='$code'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['nom'] === $nom && $row['code'] === $code) {
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['code'] = $row['code'];

                #   $_SESSION['nom'] = $row['nom'];
                # $_SESSION['enseignant_id'] = $row['enseignant_id'];


                #  $_SESSION['id'] = $row['id'];
                header("location:dispo.php");
                exit();

                # code...
            }
        } else {
            header("location:loginForm.php?error=Incorrect Code or Password");
            exit();
        }
    }
} else {
    header("location:loginForm.php?error");
    exit();
}

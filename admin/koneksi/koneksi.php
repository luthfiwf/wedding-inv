<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "getsensy_wedding";

$my_apikey = "VXSW4FVOF6Z81PPZVAE8";

$konek = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($konek));

function registrasi($data)
{
    global $konek;
    $nama = $data["nama"];
    $email = $data["email"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($konek, $data["password"]);
    $password2 = mysqli_real_escape_string($konek, $data["password2"]);

    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi Password tidak sesuai');
              </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($konek, "INSERT INTO tbl_user VALUES('','$nama', '$email', '$username', '$password')");

    return mysqli_affected_rows($konek);
}

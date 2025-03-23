<?php
require_once '../../config/database.php';

class User
{
    public static function login($username, $password)
    {
        global $conn;

        try {
            $sql = "SELECT * FROM users where username = '$username' ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }


    public static function register($username, $password)
    {
        global $conn;

        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}

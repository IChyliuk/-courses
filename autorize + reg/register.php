<?php
session_start();
if ($_SESSION["auth"]) {
    header("Location: index.php");
} else {
    $filename = "database" . DIRECTORY_SEPARATOR . "users.txt";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"], $_POST["email"], $_POST["password"])) {
        $uid = GetMaxUid($filename);
        if ($uid !== null) {
            $userInfo = [
                "uid" => $uid,
                "username" => $_POST["username"],
                "email" => $_POST["email"],
                "password" => hash("sha256", $uid . $_POST["password"])
            ];

            if (!isUsernameTaken($filename, $_POST["username"])) {
                $encode = json_encode($userInfo) . PHP_EOL;
                file_put_contents($filename, $encode, FILE_APPEND | LOCK_EX);
                echo "Пользователь успешно зарегистрирован.";
                header("Location: login.html");
                exit;
            } else {
                echo "Пользователь с таким именем уже существует.";
                header("Location: register.html");
                exit;
            }
        }
    } else {
        header("Location: register.html");
        exit;
    }
}

function GetMaxUid($filename): ?int
{
    $maxUid = 0;
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $lines = explode(PHP_EOL, trim($content));

        foreach ($lines as $line) {
            $user = json_decode($line, true);
            if (is_array($user)) {
                if (isset($user['uid']) && $user['uid'] > $maxUid) {
                    $maxUid = $user['uid'];
                }
            }
        }
        return $maxUid + 1;
    }
    return null;
}

function isUsernameTaken($filename, $username): bool
{
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $lines = explode(PHP_EOL, trim($content));

        foreach ($lines as $line) {
            $user = json_decode($line, true);
            if (is_array($user) && isset($user['username']) && $user['username'] === $username) {
                return true;
            }
        }
    }
    return false;
}


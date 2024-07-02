<?php
session_start();
$agent_file = "database" . DIRECTORY_SEPARATOR . "agents.txt";
if ($_SESSION["auth"]) {
    header("Location: index.php");
} else {
    $_SESSION["auth"] = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = Read_DataBase($username);
        if ($result !== null && isset($result['uid']) && isset($result['password']) && hash('sha256', (string)$result['uid'] . $password)) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            file_put_contents($agent_file, $userAgent . PHP_EOL, FILE_APPEND);
            $_SESSION['auth'] = true;
            header("Location: index.php");
            exit;
        } else {
            echo "Неправильное имя пользователя или пароль.";
        }
    }
}
function Read_DataBase($username): ?array
{
    $filename = "database" . DIRECTORY_SEPARATOR . "users.txt";
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $lines = explode(PHP_EOL, $content);

        foreach ($lines as $lineItem) {
            $decode = json_decode($lineItem, true);

            if (is_array($decode) && isset($decode["username"]) && $decode["username"] === $username) {
                return $decode;
            }
        }
        return null; // Пользователь не найден
    } else {
        echo 'Файл не найден';
        return null;
    }
}


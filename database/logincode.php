<?php
include "connection.php";
session_start();

function resolve_redirect($raw_redirect) {
    if (!$raw_redirect) { return null; }
    $redirect = filter_var($raw_redirect, FILTER_SANITIZE_URL);
    $parts = parse_url($redirect);
    if (isset($parts['scheme']) || isset($parts['host'])) {
        return null;
    }
    if (strpos($redirect, '\\') !== false) { return null; }
    return $redirect;
}

if (isset($_POST['login'])) {
    $Email  = isset($_POST['Email']) ? trim($_POST['Email']) : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
    $redirectParam = isset($_POST['redirect']) ? $_POST['redirect'] : '';

    $stmt = $conn->prepare("SELECT cus_id, Name, Email, Password, PhoneNo, Address FROM customer WHERE Email = ? LIMIT 1");
    if ($stmt) {
        $stmt->bind_param('s', $Email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($Password, $row['Password'])) {
                $_SESSION['cus_id'] = $row['cus_id'];
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['PhoneNo'] = $row['PhoneNo'];
                $_SESSION['Address'] = $row['Address'];

                $redirect = resolve_redirect($redirectParam);
                if (!$redirect) { $redirect = '../userprofile.php'; }
                header('Location: ' . $redirect);
                exit;
            }
        }
        $stmt->close();
    }

    echo "<script>alert('invalid username/password !'); window.location.href= '../index.php';</script>";
    exit;
} else {
    echo "<script>alert('invalid username/password'); window.location.href= '../index.php';</script>";
    exit;
}
?>
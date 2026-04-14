<?php
require_once '../../config/Database.php';
require_once '../../classes/Auth.php';

$db = new Database();
$conn = $db->getConnection();
$auth = new Auth($conn);

// Proses register ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Panggil method register
    if ($auth->register($name, $email, $password)) {
        // Redirect ke halaman login jika berhasil
        header("Location: login.php");
        exit;
    } else {
        $error = "Pendaftaran gagal. Email sudah terdaftar.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <?php if (isset($error)) : ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>
    Sudah punya akun? <a href="login.php">Login di sini</a>
</body>
</html>
<?php
// Kullanıcı adı ve şifreyi kontrol etmek için basit bir şifreleme yapalım
$users = [
    'kullanici1' => 'sifre1',
    'kullanici2' => 'sifre2'
];

// Formdan gelen kullanıcı adı ve şifreyi alalım
$username = $_POST['username'];
$password = $_POST['password'];

// Kullanıcı adı ve şifreyi kontrol edelim
if (isset($users[$username]) && $users[$username] === $password) {
    // Oturum başlat
    session_start();
    $_SESSION['username'] = $username;
    // Kullanıcıyı test.php sayfasına yönlendir
    header("Location: test.php");
    exit;
} else {
    echo "Hatalı kullanıcı adı veya şifre. Lütfen tekrar deneyin.";
}
?>

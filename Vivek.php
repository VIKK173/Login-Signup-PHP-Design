<?php
session_start();
$file = "users.json";
$users = json_decode(file_get_contents($file), true);

$msg = "";

if (isset($_POST['action'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if ($_POST['action'] === "signup") {
        foreach ($users as $u) {
            if ($u['username'] === $username) {
                $msg = "User already exists!";
                goto end;
            }
        }

        $users[] = [
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ];

        file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
        $msg = "Signup successful!";
    }

    if ($_POST['action'] === "login") {
        foreach ($users as $u) {
            if ($u['username'] === $username && password_verify($password, $u['password'])) {
                $_SESSION['user'] = $username;
                $msg = "Login successful!";
                goto end;
            }
        }
        $msg = "Invalid login!";
    }
}
end:
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login / Signup</title>
<style>
body {
    margin: 0;
    height: 100vh;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    justify-content: center;
    align-items: center;
}

.box {
    background: #fff;
    width: 320px;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 15px 30px rgba(0,0,0,.2);
}

h2 {
    text-align: center;
    margin-bottom: 15px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background: #667eea;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #5a67d8;
}

.toggle {
    text-align: center;
    margin-top: 10px;
    color: #667eea;
    cursor: pointer;
}

.msg {
    text-align: center;
    color: green;
    margin-bottom: 10px;
}
.error {
    color: red;
}
</style>
</head>

<body>

<div class="box">
    <h2 id="title">Login</h2>

    <?php if ($msg): ?>
        <div class="msg <?= strpos($msg,'Invalid')!==false || strpos($msg,'exists')!==false ? 'error' : '' ?>">
            <?= $msg ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <input type="hidden" name="action" id="action" value="login">
        <button type="submit">Submit</button>
    </form>

    <div class="toggle" onclick="toggleForm()">Create an account</div>
</div>

<script>
function toggleForm() {
    let title = document.getElementById("title");
    let action = document.getElementById("action");
    let toggle = document.querySelector(".toggle");

    if (action.value === "login") {
        title.innerText = "Signup";
        action.value = "signup";
        toggle.innerText = "Already have an account?";
    } else {
        title.innerText = "Login";
        action.value = "login";
        toggle.innerText = "Create an account";
    }
}
</script>

</body>
</html>

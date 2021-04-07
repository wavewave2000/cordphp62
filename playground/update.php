<?php
include 'template/header.html';
require_once 'connectdb.php';
$id = "";
$username = "";
$status = "";
$strSQL = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = "";
    if (isset($_GET["id"]) && $_GET["id"] != '');
    $id = $_GET["id"];
    $username = $_GET["username"];
    $status = $_GET["status"];
} else {
    //echo "id is null";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $status = "";
    $id = $_GET["id"];
    $username = $_POST["username"];
    $status = $_POST["status"];
    //echo $username . " _ _ " .$status;
    $strSQL = "UPDATE `user` SET `username`='" . $username . "',`status`=" . $status . " WHERE id=" . $id;
    if (($username == "") && ($status == "")); {
        //echo "ผิดพลาด";

        $result = $myconn->query($strSQL);
        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
}


?>

<body>

    <form action="update.php?id=<?= $id ?>" method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?= $username ?>">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="status" value="<?= $status ?>">
            <label for="floatingPassword">Password</label>
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>
    <?php
    include 'template/header.html';
    ?>
</body>

</html>
<?php
function verifyCookie($db)
{
    $query = "SELECT token_cookie FROM users WHERE id_users = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$_COOKIE["remember"]["id_users"]]);
    $response = $stmt->fetch();
    return $response[0] == $_COOKIE["remember"]["token"];
}
function generateCookie($db, $row)
{
    $token_cookie = bin2hex(random_bytes(71));
    $token_hashed = password_hash($token_cookie, PASSWORD_DEFAULT);

    $query = "UPDATE users SET token_cookie = ? WHERE id_users = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$token_hashed, $row['id_users']]);

    //1 mois d'expiration du cookie
    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
    $idUser = $row['id_users'];

    setcookie("remember[token]", $token_hashed,  time() + 3600 * 24 * 31, "/", $domain);
    setcookie("remember[id_users]", $idUser,  time() + 3600 * 24 * 31, "/", $domain);
}

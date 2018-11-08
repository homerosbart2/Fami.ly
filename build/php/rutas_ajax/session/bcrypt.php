<?php
/**
 * In this case, we want to increase the default cost for BCRYPT to 12.
 * Note that we also switched to BCRYPT, which will always be 60 characters.
 */
$options = [
    'cost' => 9,
];
$hash = password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
if (password_verify('rasmuslrdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>
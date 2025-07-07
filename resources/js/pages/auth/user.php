<?php
// users.php
return [
    [
        'email' => 'oshani@gamil.com',
        'password' => password_hash('1234', PASSWORD_DEFAULT),
        'role' => 'admin'
    ],
    [
        'email' => 'manodya@gamil.com',
        'password' => password_hash('5678', PASSWORD_DEFAULT),
        'role' => 'user'
    ]
];

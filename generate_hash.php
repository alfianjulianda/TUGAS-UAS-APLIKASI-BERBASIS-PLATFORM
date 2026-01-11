<?php

$passwords = [
    'admin'      => '0987',
    'masyarakat' => '0987'
];

echo "<h2>Generate Password Hash SIPMAS</h2>";
echo "<pre>";

foreach ($passwords as $role => $plainPassword) {
    echo strtoupper($role) . PHP_EOL;
    echo "Password Asli : " . $plainPassword . PHP_EOL;
    echo "Password Hash : " . password_hash($plainPassword, PASSWORD_DEFAULT) . PHP_EOL;
    echo str_repeat("-", 50) . PHP_EOL;
}

echo "</pre>";

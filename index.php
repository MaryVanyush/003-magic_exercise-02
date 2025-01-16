<?php
declare(strict_types=1);

trait UserAuthentication {
    private $credentials = [
        'app' => ['username' => 'appUser', 'password' => 'appPass'],
        'mobile' => ['username' => 'mobileUser', 'password' => 'mobilePass'],
    ];

    public function authenticate($type, $username, $password) {
        if (!isset($this->credentials[$type])) {
            return "Неизвестный тип пользователя.";
        }

        if ($username === $this->credentials[$type]['username'] && $password === $this->credentials[$type]['password']) {
            return "Пользователь авторизован!";
        } else {
            return "Ошибка авторизации.";
        }
    }
}

class User {
    use UserAuthentication;

    public function login($type, $username, $password) {
        return $this->authenticate($type, $username, $password);
    }
}

$user = new User();
echo $user->login('app', 'appUser', 'appPass') . "\n";
echo $user->login('mobile', 'mobileUser', 'mobilePass') . "\n";
echo $user->login('web', 'webUser', 'webPass') . "\n";

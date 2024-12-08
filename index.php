<?php
declare(strict_types=1);


trait AppUserAuthentication {
    private $appUsername = 'appUser';
    private $appPassword = 'appPass';

    public function authenticateApp($username, $password) {
        if ($username === $this->appUsername && $password === $this->appPassword) {
            return "Пользователь авторизован!";
        } else{
            return "Ошибка авторизации.";
        } 
    }
}

trait MobileUserAuthentication {
    private $mobileUsername = 'mobileUser';
    private $mobilePassword = 'mobilePass';

    public function authenticateMob($username, $password) {
        if ($username === $this->mobileUsername && $password === $this->mobilePassword) {
            return "Пользователь авторизован!";
        } else {
            return "Ошибка авторизации.";
        }
    }
}

class User {
    use AppUserAuthentication;
    use MobileUserAuthentication;

    public function login($type, $username, $password) {
        if ($type === 'app') {
            return $this->authenticateApp($username, $password);
        } elseif ($type === 'mobile') {
            return $this->authenticateMob($username, $password);
        } else {
            return "Неизвестный тип пользователя.";
        }
    }
}

$user = new User();
echo $user->login('app', 'appUser', 'appPass') . "\n";
echo $user->login('mobile', 'mobileUser', 'mobilePass') . "\n";

# PHP-user-authentication

*PHP version required 7.3*

**How to use ?**

***Registration***
```php
<?php

use DevCoder\Authentication\Core\UserManager;
use DevCoder\Authentication\User;

// register
$userManager = new UserManager();

$password = $userManager->cryptPassword($_POST['password']);
$user = (new User())
    ->setUserName($_POST['username'])
    ->setPassword($password)
    ->setRoles(['ROLE_USER']);

$userManager->createUserToken($user);

// check Token in Session
var_dump($userManager->getUserToken());
// object(DevCoder\Authentication\Token\UserToken)[4]
//  private 'user' => 
//    object(DevCoder\Authentication\User)[5]
//      private 'userName' => string 'username' (length=8)
//      private 'password' => string '$2y$10$iWdcmebmikUFlgKMqW7/rOmUp1DjFAuWKqdUHBhL08FZ7LL6bwRey' (length=60)
//      private 'roles' => 
//        array (size=1)
//          0 => string 'ROLE_USER' (length=9)
//      private 'enabled' => boolean true

```

***Connected or not***
```php
<?php

use DevCoder\Authentication\Core\UserManager;
use DevCoder\Authentication\User;

$userManager = new UserManager();
if ($userManager->hasUserToken()) {
    // connected

    $token = $userManager->getUserToken();
    $user = $token->getUser();
    var_dump($user);
// object(DevCoder\Authentication\User)[5]
//  private 'userName' => string 'username' (length=8)
//  private 'password' => string '$2y$10$OBobeLhdvdiftuedlv1a6e4.qF6sCG/usq5WEV4E3uB.UiS1egv/m' (length=60)
//  private 'roles' => 
//    array (size=1)
//      0 => string 'ROLE_USER' (length=9)
//  private 'enabled' => boolean true

}else {
    // not connected
}
```
***Access management***

```php
$userManager = new UserManager();
if ($userManager->isGranted(['ROLE_ADMIN'])) {
    //is admin
    // return Response 200
}else {
    //is not admin
    // return Response 403
}
```

***Logout***

```php
$userManager = new UserManager();
$userManager->logout();
```

Ideal for small project
Simple and easy!
[https://github.com/devcoder-xyz/php-user-authentication](https://github.com/devcoder-xyz/php-user-authentication)

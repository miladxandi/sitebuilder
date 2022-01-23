@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
<<<<<<< HEAD
SET BIN_TARGET=%~dp0/../phpunit/phpunit/phpunit
=======
SET BIN_TARGET=%~dp0/phpunit
SET COMPOSER_BIN_DIR=%~dp0
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
php "%BIN_TARGET%" %*

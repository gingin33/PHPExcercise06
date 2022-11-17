brew install composer
brew install node

composer global require laravel/installer

echo "export PATH=~/.composer/vendor/bin:$PATH" >> ~/.bash_profile

source ~/.bash_profile

cd PHPExcercise06/
php artisan migrate

php artisan serve
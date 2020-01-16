git fetch --all
git reset --hard origin/master
composer dump-autoload
composer install

npm install

cd var/www/html/nigeria

cp .env.demo .env

php artisan optimize:clear
#php artisan migrate
php artisan cache:clear
php artisan view:clear
php artisan config:cache
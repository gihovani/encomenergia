echo "composer install"
composer install

echo "php index.php migrate index"
php index.php migrate index

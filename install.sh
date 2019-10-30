command -v composer >/dev/null 2>&1 || { echo >&2 "composer nao esta instalado."; exit 1; }
echo "composer install"
composer install

command -v php >/dev/null 2>&1 || { echo >&2 "php nao esta instalado."; exit 1; }
echo "php index.php migrate index"
php index.php migrate index

if hash yarn 2>/dev/null; then
	echo ""
	echo "yarn install"
	yarn install
else
	command -v npm >/dev/null 2>&1 || { echo >&2 "yarn / npm nao esta instalado."; exit 1; }
	echo "npm install"
	npm install
fi

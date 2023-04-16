default:
	make --version

env:
	cp .env.example .env

init: install artisan

install:
	composer install && npm install && npm run build

artisan:
	php artisan key:generate && php artisan migrate --seed

apidoc:
	php artisan l5-swagger:generate

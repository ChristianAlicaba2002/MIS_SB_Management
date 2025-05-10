.PHONY: install build run test

install:
	composer install
	npm install

build:
	copy .env.example .env || echo ".env already exists, skipping copy"
	php artisan key:generate
	php artisan migrate --force
	php artisan db:seed --force

run:
	php artisan serve

migrate:
	php artisan migrate

rollback:
	php artisan migrate:rollback

fresh:
	php artisan migrate:fresh
	php artisan db:seed

seed:
	php artisan db:seed

test:
	php artisan migrate:fresh --env=testing
	php artisan test

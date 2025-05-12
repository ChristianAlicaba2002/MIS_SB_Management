.PHONY: install generate build show_docker show_docker_run run clear migrate rollback fresh seed test start stop down mydb

APP_NAME = mis_sb
DB_NAME = mis_sb_db

install:
	@echo "Installing dependencies..."
	@cp .env.example .env || echo ".env already exists, skipping copy"
	@docker-compose exec $(APP_NAME) php artisan migrate --force

generate:
	@echo "Generating application key..."
	@docker-compose exec $(APP_NAME) php artisan key:generate

build:
	@echo "Building the Docker containers..."
	@docker-compose up -d --build

show_docker:
	@echo "Showing Docker containers..."
	@docker ps

show_docker_run:
	@echo "Showing running Docker containers..."
	@docker ps -a

clear:
	@echo "Clearing cache and config..."
	@docker-compose exec $(APP_NAME) php artisan cache:clear
	@docker-compose exec $(APP_NAME) php artisan config:clear

run:
	@echo "Starting the Laravel server on http://127.0.0.1:8000 ..."
	@docker-compose run $(APP_NAME) php artisan serve

migrate:
	@echo "Waiting for MySQL to be ready..."
	@echo "Running migrations..."
	@docker-compose exec $(APP_NAME) php artisan migrate

rollback:
	@echo "Rolling back migrations..."
	@docker-compose exec $(APP_NAME) php artisan migrate:rollback

fresh:
	@echo "Running fresh migrations..."
	@docker-compose exec $(APP_NAME) php artisan migrate:fresh
	@docker-compose exec $(APP_NAME) php artisan db:seed

seed:
	@echo "Seeding database..."
	@docker-compose exec $(APP_NAME) php artisan db:seed --class=AdminSeeder

test:
	@echo "Running tests..."
	@docker-compose exec $(APP_NAME) php artisan migrate:fresh --env=testing
	@docker-compose exec $(APP_NAME) php artisan test

start:
	@echo "Starting the $(APP_NAME) container..."
	@docker-compose start $(APP_NAME)

stop:
	@echo "Stopping the $(APP_NAME) container..."
	@docker-compose stop $(APP_NAME)

down:
	@echo "Stopping and removing all containers, networks, and volumes..."
	@docker-compose down -v

mydb:
	@docker-compose exec -it $(DB_NAME) mysql -u root -p
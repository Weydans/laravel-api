run:
	docker-compose up -d --build

build: down run
	docker-compose exec app composer install
	docker-compose exec app php artisan migrate
	docker-compose exec app php artisan optimize

install:
	mkdir .data
	cp .env.example .env

uninstall: down
	cd ../ && rm -rf laravel-api

status:
	sudo docker-compose ps -a

down:
	docker-compose down
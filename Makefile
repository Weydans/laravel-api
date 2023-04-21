run:
	docker-compose up -d --build
	sudo docker-compose ps -a

build: down install run
	docker-compose exec app composer install
	docker-compose exec app php artisan optimize:clear
	docker-compose exec app php artisan optimize
	docker-compose exec app php artisan migrate
	sudo docker-compose ps -a

install:
	ls .data || mkdir .data
	ls .env || cp .env.example .env

uninstall: down
	cd ../ && rm -rf laravel-api

status:
	sudo docker-compose ps -a

down:
	docker-compose down
	sudo docker-compose ps -a
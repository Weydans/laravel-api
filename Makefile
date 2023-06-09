run: install
	docker-compose exec app php artisan optimize:clear
	docker-compose exec app php artisan migrate
	sudo docker-compose ps -a
	docker-compose exec app php artisan queue:work --daemon --tries=3

build: install
	docker-compose exec app php artisan optimize:clear
	docker-compose exec app php artisan optimize
	docker-compose exec app php artisan migrate
	sudo docker-compose ps -a
	docker-compose exec app php artisan queue:work --daemon --tries=3

install: down
	ls .data || mkdir .data
	docker-compose up -d --build
	docker-compose exec app composer install

uninstall: down
	cd ../ && rm -rf laravel-api

status:
	sudo docker-compose ps -a

down:
	docker-compose down
	sudo docker-compose ps -a
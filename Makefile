run:
	docker-compose up -d --build

install:
	mkdir .data
	cp .env.example .env

uninstall:
	docker-compose down
	cd ../ && rm -rf laravel-api
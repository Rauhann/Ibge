
#!make
include .env
export $(shell sed 's/=.*//' .env)

t=

up:
	docker-compose up
downs:
	docker-compose down -v --remove-orphans
sh:
	docker exec -it -u nginx ibge-php /bin/bash
db:
	docker exec -it ibge-db bash -c "psql -U ${DB_USER} -d ${DB_NAME}"
install:
	composer install
dum:
	composer dump-autoload
reset:
	docker-compose down -v --remove-orphans && docker system prune -a -f && docker-compose up --build
functionals:
	vendor/bin/phpunit --testsuite f
test:
	vendor/bin/phpunit --filter GetRegionsActionFTest && vendor/bin/phpunit --filter GetStatesActionFTest && vendor/bin/phpunit --filter GetCitiesActionFTest && vendor/bin/phpunit --filter GetDistrictsActionFTest
migrate:
	vendor/bin/phinx migrate
rollback:
	vendor/bin/phinx rollback -e development
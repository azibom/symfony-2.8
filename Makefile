shell:
	docker exec -it sf2_php bash
down:
	docker-compose down
up:
	docker-compose up -d
check.permission:
	setfacl -R -m u:www-data:rwX -m u:$(whoami):rwX code/app/cache code/app/logs
	setfacl -dR -m u:www-data:rwX -m u:$(whoami):rwX code/app/cache code/app/logs

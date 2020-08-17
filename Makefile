shell:
	docker exec -it sf2_php bash
down:
	docker-compose down
up:
	docker-compose up -d
update.database:
	docker exec -it sf2_php php app/console generate:doctrine:entities 
fix.permission:
	sh ./bash/permission.sh
command.fixture:
	docker exec -it sf2_php php app/console doctrine:fixtures:load 

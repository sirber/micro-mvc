.PHONY: build dev stop migration-run

build:
	@docker compose build
	@cd src && composer install
	@cd src && composer dump-autoload

migration-run:
	@CONTAINER_ID=$$(docker ps -qf "name=pure-apache-1") && \
  docker exec $$CONTAINER_ID sh -c "cd ./private/ && php migration.php"
	
dev: build
	@docker compose up -d
	@echo "ready! open: http://localhost"

stop:
	@docker compose stop
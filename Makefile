.PHONY: build dev stop down migration-run

build:
	@docker compose build
	@cd src && composer install
	@cd src && composer dump-autoload

migration-run:
	@CONTAINER_ID=$$(docker ps -qf "name=micro-mvc") && \
  docker exec $$CONTAINER_ID sh -c "php migration.php"
	
dev: build
	@docker build -t micro-mvc:dev ./
	@docker compose up -d
	@echo "ready! open: http://localhost"

stop:
	@docker compose stop

down:
	@docker compose down

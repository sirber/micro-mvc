.PHONY: build dev stop down migration-run seeding-run help

help: ## Help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

build: ## Build
	@docker compose build
	@cd src && composer install
	@cd src && composer dump-autoload

migration-run: ## Run migrations
	@CONTAINER_ID=$$(docker ps -qf "name=micro-mvc") && \
  docker exec $$CONTAINER_ID sh -c "php migration.php"

seeding-run: ## Run seedings
	@CONTAINER_ID=$$(docker ps -qf "name=micro-mvc") && \
  docker exec $$CONTAINER_ID sh -c "php seeding.php"
	
dev: build ## Start dev environment
	@docker build -t micro-mvc:dev ./
	@docker compose up -d
	@echo "ready! open: http://localhost"

stop: ## Stop dev environment
	@docker compose stop

down: ## Remove dev environment
	@docker compose down -v

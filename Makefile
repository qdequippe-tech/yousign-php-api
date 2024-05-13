rector: ## Run rector (dry run)
	./vendor/bin/rector process --dry-run --verbose

rectify: ## Run rector
	./vendor/bin/rector process

cs: ## Fix code style (PHP CS Fixer)
	./vendor/bin/php-cs-fixer fix

cs_check: ## Check code style
	./vendor/bin/php-cs-fixer check

jane: ## Generate SDK
	./vendor/bin/jane-openapi generate --config-file=.jane-openapi.php

.PHONY: help

help: ## Display this help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

.DEFAULT_GOAL := help
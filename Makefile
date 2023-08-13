# Load env file (mysql user)
ifneq ("$(wildcard .env)","")
	include .env
	export $(shell sed 's/=.*//' .env)
endif

# Init var
LANG=fr_FR

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(firstword $(MAKEFILE_LIST)) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'


##
## Project setup
##---------------------------------------------------------------------------
install: composer-install config-files perm language-install ## Installation plugins/theme + permission

perm: ## Spécification des permissions en écriture des dossiers wp-content/plugins, upgrade, languages, uploads
	@#chgrp -R www-data public/
	@find "./public/wp-content/languages" -type d -exec chmod 775 {} \;
	@find "./public/wp-content/plugins" -type d -exec chmod 775 {} \;
	@find "./public/wp-content/upgrade" -type d -exec chmod 775 {} \;
	@find "./public/wp-content/uploads" -type d -exec chmod 775 {} \;

update: ## composer update + traductions + mise à jour base de donnée
	@composer update -n
	@wp language core update $(LANG)
	@wp language plugin update $(LANG) --all
	@wp core update-db

delete-classic-theme: ## Suppression des thèmes dans public/app/wp-content/themes/*
	@rm -rf public/app/wp-content/themes/*

info: ## Some information on wordpress, php, etc
	@wp core version --extra
	@php --version

# Internal rules
composer-install:
	@composer install -n

config-files:
ifeq (,$(wildcard public/wp-config.php))
	@cp public/wp-config.default.php public/wp-config.php
	@echo "public/wp-config.php create, please complete this file (database connexion)"
endif

language-install:
	@wp language core install $(LANG)
	@wp language plugin install $(LANG) --all

.PHONY: install
install:
	@composer install

.PHONY: test
test:
	@./vendor/bin/phpunit tests

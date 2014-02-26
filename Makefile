test:
	bin/behat

test-report:
	bin/behat --format html --out behat-report.html

update:
	composer update

docs:
	bin/sami.php update --force config/api-docs.php
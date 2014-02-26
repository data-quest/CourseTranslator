test:
	bin/behat

test-report:
	bin/behat --format html --out behat-report.html

update:
	composer update --no-dev

update-dev:
	composer update
docs:
	bin/sami.php update --force config/api-docs.php

autoload:
	composer dump-autoload -o
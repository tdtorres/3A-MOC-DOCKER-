FROM symfonycorp/cli:latest
CMD symfony new ProjetDocker --webapp
CMD  cd ProjetDocker/
CMD symfony server:start
CMD composer require symfony/orm-pack
CMD composer require --dev symfony/maker-bundle
CMD composer require annotations
CMD php bin/console doctrine:database:create 
CMD php bin/console doctrine:database:import import.sql
CMD php bin/console doctrine:mapping:import "ProjetDocker\Entity" annotation --path=src/Entity
CMD php bin/console make:entity --regenerate ProjetDocker
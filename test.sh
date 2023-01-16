#!/bin/bash

dump_autoload() {
    echo "|==> Recarregando a lista de classes, pacotes e bibliotecas"
    docker run -it --rm --volume "$PWD":/app -w /app sineverba/php74xc curl -sS https://getcomposer.org/installer | php
    php composer.phar dump-autoload
    rm composer.phar
}

#### Executa migração de banco sqlite completa
gerar_database() {
    echo "|==> Criando banco de dados sqlite"
    rm tests/data/database.sqlite
    touch tests/data/database.sqlite
    php artisan migrate:fresh --seed --env=testing
}

#### Atualizando os arquivos
dump_autoload

#### Executa migração de banco sqlite completa
gerar_database

#APP_ENV=testing
#### Executa o teste completo com coverage, relatórios e sonar
echo "--> Iniciando teste unitários"
docker run -it --rm --volume "$PWD":"$PWD" \
    -w "$PWD" \
    -e APP_ENV=testing \
    -e DB_CONNECTION=sqlite \
    -e DB_DATABASE=tests/data/database.sqlite \
    sineverba/php74xc \
    ./vendor/bin/phpunit -d memory_limit=4048M \
    --configuration phpunit.xml \
    --coverage-clover phpunit.coverage.xml \
    --log-junit phpunit.report.xml \
    --coverage-html ci

<p align="center">
    <a href="https://www.docker.com/"><img src="https://www.docker.com/sites/default/files/d8/styles/role_icon/public/2019-07/Moby-logo.png?itok=sYH_JEaJ" height="100"></a>
    <a href="https://getbootstrap.com/"><img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo-shadow.png" height="100"></a>
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="100"></a>
    <a href="https://fullcalendar.io/" target="_blank"><img src="https://avatars.githubusercontent.com/u/13825204?s=200&v=4.svg" height="100"></a>
    <a href="https://www.chartjs.org/" target="_blank"><img src="https://www.chartjs.org/img/chartjs-logo.svg" height="100"></a>
    <a href="https://www.postgresql.org/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/2/29/Postgresql_elephant.svg" height="100"></a>
   
</p>

<!-- PROJECT LOGO -->
<br />
<p align="center">

  <h3 align="center">LARAVEL_FCM</h3>

  <p align="center">
    Leitura de arquivos .json fornecidos por api e exibição de agenda simples.
  </p>
</p>

### INSTALAÇÃO

1. Instalando dependencias
 ```sh
sudo apt install php7.4-cli && sudo apt install php-pgsql && sudo apt install composer && sudo apt install curl && sudo apt-get install php-xml
 ```
2. Clonando projeto Git
 ```sh
git clone https://github.com/jacksonlink/laravel_fcm.git && cd laravel_fcm && composer install
 ```
3. Instalando Docker
 ```sh
sudo apt install -y && sudo apt install  apt-transport-https && sudo apt install ca-certificates && sudo apt install curl && sudo apt install software-properties-common && sudo apt install gnupg-agent && curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add - && sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
 ```
4. Instalando Docker Compose
 ```sh
sudo apt install docker-compose && curl -L "https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m)" -o /tmp/docker-compose && chmod +x /tmp/docker-compose && sudo mv /tmp/docker-compose /usr/local/bin/docker-compose
 ```
5. Preparando o Docker Compose
 ```sh
mkdir ~/postgres-demo && cd ~/postgres-demo && touch docker-compose.yml

Escreva no arquivo docker-compose.yml:

version: '3'

services:
  postgres:
    image: postgres:13.1
    healthcheck:
      test: [ "CMD", "pg_isready", "-q", "-d", "postgres", "-U", "root" ]
      timeout: 45s
      interval: 10s
      retries: 10
    restart: always
    environment:
      - POSTGRES_USER=root
      - POSTGRES_PASSWORD=password
      - APP_DB_USER=docker
      - APP_DB_PASS=docker
      - APP_DB_NAME=docker
    volumes:
      - ./db:/docker-entrypoint-initdb.d/
    ports:
      - 5432:5432
 ```
6. Preparando o Volume
 ```sh
mkdir db
touch db/01-init.sh

Escreva no arquivo 01-init.sh:

#!/bin/bash
set -e
export PGPASSWORD=$POSTGRES_PASSWORD;
psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
  CREATE USER $APP_DB_USER WITH PASSWORD '$APP_DB_PASS';
  CREATE DATABASE $APP_DB_NAME;
  GRANT ALL PRIVILEGES ON DATABASE $APP_DB_NAME TO $APP_DB_USER;
  \connect $APP_DB_NAME $APP_DB_USER
  BEGIN;
    CREATE TABLE IF NOT EXISTS event (
      id CHAR(26) NOT NULL CHECK (CHAR_LENGTH(id) = 26) PRIMARY KEY,
      aggregate_id CHAR(26) NOT NULL CHECK (CHAR_LENGTH(aggregate_id) = 26),
      event_data JSON NOT NULL,
      version INT,
      UNIQUE(aggregate_id, version)
    );
    CREATE INDEX idx_event_aggregate_id ON event (aggregate_id);
  COMMIT;
EOSQL
  ```
7. Subindo o docker e alimentando o banco
 ```sh
sudo docker-compose up
php artisan migrate
php artisan db:seed
 ```
Fonte: [https://graspingtech.com/docker-compose-postgresql/](https://graspingtech.com/docker-compose-postgresql/)

function up {
   docker compose up
   docker exec point-app npm run dev
}

function down {
    docker compose down
}

function stop {
    docker compose stop
}

function restart {
    docker compose restart
    docker exec point-app npm run dev
}

function vendor() {
    docker compose up -d
    docker exec point-app composer install
    docker compose down
}

function migrate() {
    docker compose up -d
    docker exec point-app php artisan migrate
    docker compose down
}

function create_network() {
    docker network create point
}

function seed() {
    docker compose up -d
    docker exec point-app php artisan db:seed ; php artisan module:seed
    docker compose down
}

function run() {
    create_network
    docker compose build
    docker compose up -d
    docker exec point-app composer install
    docker exec point-app php artisan storage:link
    docker exec point-app php artisan migrate
    docker exec point-app npm install
    docker exec point-app npm run dev
}

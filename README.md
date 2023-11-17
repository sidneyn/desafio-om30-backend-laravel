## Desafio - OM30 - Backend Laravel

Passo a passo para rodar o projeto

git clone https://github.com/sidneyn/desafio-om30-backend-laravel.git

Copie o arquivo .env.exmaple para .env colocando a seguinte configuração:

```ini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:X7060T5etUzZJhyUhQtKZiO4+9GaW6VSdQ6VtC889Q0=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=desafio
DB_USERNAME=root
DB_PASSWORD=password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=redis
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

Levante os containers do projeto.
```sh
docker-compose up -d
```

Acesse o container
```sh
docker-compose exec app bash
```

Instale as dependências do projeto
```sh
composer install --ignore-platform-reqs
```

Execute a migration para criação das tabelas.
```sh
php artisan migrate
```

Execute a migration para criação dos registros fake.
```sh
php artisan db:seed
```

### Objetivo

Desenvolver uma API de cadastro de pacientes, do qual possamos testar toda sua capacidade de criação de arquitetura, qualidade do código, validações e usabilidade.

### Requisitos

Sua aplicação deve:

- Obrigatoriamente para o desenvolvimento do back-end utilizar o framework Laravel.

- Obrigatoriamente a API deve estar nos padrões RESTful.

### Dados

- Desenvolver uma listagem de pacientes com busca, do qual deve-se permitir a adição, edição, visualização e exclusão de cada um dos pacientes.

- Cada paciente deve ter um endereço cadastrado em uma tabela à parte.

- Utilizar para banco de dados PostgreSQL e Redis (Cache e Queue).

- Utilizar migration, factory, faker e seeder.

- Criar um endpoint para listagem onde seja possível consultar pacientes pelo nome ou CPF.

- Criar um endpoint para obter os dados de um único pacientes (paciente e seu endereço).

- Criar endpoints de cadastro e atualização de paciente, contendo os campos e suas respectivas validações (Obs: use tudo que o framework(Laravel) te oferece para não criar códigos repetidos e desnecessários):

  - Foto do Paciente;
  - Nome Completo do Paciente;
  - Nome Completo da Mãe;
  - Data de Nascimento;
  - CPF;
  - CNS;
  - Endereço completo, (CEP, Endereço, Número, Complemento, Bairro, Cidade e Estado)*;

 - Criar um endpoint para excluir um paciente (paciente e seu endereço).

 - Criar um endpoint para consulta de CEP que implemente a API do ViaCEP e faça cache (Redis) dos dados para futuras consultas.

 - Criar um endpoint que faça importação de dados (pacientes) via arquivo .csv e seja processada em queue **assincronamente**.
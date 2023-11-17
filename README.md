## Desafio - OM30 - Backend Laravel

Passo a passo para rodar o projeto

1 - git clone https://github.com/sidneyn/desafio-om30-backend-laravel.git

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
composer install
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
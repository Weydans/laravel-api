# API Laravel

API desenvolvida em Laravel utilizando as principais funcionalidades do framework como: migrations, policies, autenticação, envio de e-mail, filas e etc.

## Dependências

É necessário ter previamente instalado em sua máquina os seguintes softwares:

- [git](https://git-scm.com/downloads)
- [Docker](https://docs.docker.com/engine/install/)
- [docker-compose](https://docs.docker.com/compose/install/)

Clique nos links acima para acessar a página de instalação de cada um.

## Instalação

- Clone o projeto
```bash
git clone https://github.com/Weydans/laravel-api.git
```
## Execução

- Acesse a pasta do projeto
```bash
cd laravel-api
```

- Configure o arquivo `.env` com as credenciais do seu provedor de banco de dados

- Prepara ambiente
```bash
sudo make install
```

- Suba os containers do Docker
```bash
sudo make
```

- Prepare a tabela para execução da fila
```bash
sudo docker-compose exec app php artisan queue:table
```

- Derruba os containers e sobe novamente a aplicação em modo produção
```bash
sudo make build
```

- Acesse o sistema pelo navegador clicando [aqui](http://localhost:8080) ou abra o browser e insira a seguinte url `http://localhost:8080`.

## Parar Execução

Interrompe a execução dos containers
```bash
sudo make down
```

## Desinstalação

Acesse a pasta do projeto substituindo o trecho `/path/to/project` pelo caminho onde o projeto encontra-se na sua máquina
```bash
cd /path/to/project
```

Remova a pasta com todos os arquivos do projeto
```bash
sudo rm -rf laravel-api
```
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

- Copie o `.env.example` para `.env` e __insira as credenciais do seu provedor de e-mail e baco de dados__
```
cp .env.example .env
```

- Suba a plicação com um dos comandos abaixo (`buid` para produção ou apenas `make` para desenvolvimento)
```bash
sudo make build
```

```bash
sudo make
```

- Acesse o sistema pelo navegador clicando [aqui](http://localhost:8080) ou abra o browser e insira a seguinte url `http://localhost:8080`.



## Parar Execução

Interrompe a execução dos containers
```bash
sudo make down
```



## Desinstalação

Remove a pasta com todos os arquivos do projeto
```bash
sudo make uninstall && cd ..
```
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



## Importante

- __Após terminar a instalação seja e modo desevolvimento ou produção o sistema fica com o terminal preso ao serviço da fila__
- __O sistema não possiu um usuário default é necessário acessar o serviço do banco de dados `db` e inserir o usuário para autenticação__

Exemplo de inserção:

- Em um terminal a parte acesse ao bash do container `db`
```
sudo docker-compose exec db bash
```

- Uma vez no terminal interno do container acesse a base de dados
__(nunca exponha esses dados em produção)__
```
mysql -u onflyuser -ponflypass
```

- Estamos no terminal do mysql, agora crie um usuário

__(a hash abaixo é da senha `123`. Nunca exponha suas senhas)__
```
INSERT INTO users(name, email, password) VALUES ('Seu Nome', 'seu@email.aqui', '$2y$10$NJxQ7Kj0X3bK2qbEwQdCCOSUCOD2pat/5trFtTLIyanwBKBQJukiy');
```

- Para sair do terminal do mysql 
```
quit
```

- Para sair do terminal do container 
```
exit
```


## Acesso

A aplicação pode ser acessada por qualquer cliente de API pelas rotas:

`URI: http://localhost:8080/api/v0`

Recursos:
- `POST:   /login`
- `GET:    /expenses`
- `POST:   /expenses`
- `GET:    /expenses/{id}`
- `PUT:    /expenses/{id}`
- `DELETE: /expenses/{id}`
    


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

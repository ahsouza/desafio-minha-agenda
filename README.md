# desafio-minha-agenda

Com o **Docker** instalado em sua máquina, altere o `branch` do projeto para `docker` com o seguinte comando `git`:

```sh
git checkout docker
```
Agora iremos utilizar comandos docker-compose na construção dos serviços

Compilando imagem do aplicativo:

```sh
docker-compose build app
```

Execute o ambiente em modo background:

```sh
docker-compose up -d
```

Liste os contêineres em segundo plano:

```sh
docker-compose ps
```

Instalando dependências do projeto:

```sh
docker-compose exec app composer install
```

Criptografando sessões do usuário:

```sh
docker-compose exec app php artisan key:generate
```

Vá até seu navegador e acesse o nome de `domínio` ou `endereço IP` do seu servidor na porta **8000**

`http://localhost:8000`


Exemplos de como fazer solicitações **HTTP** da [API Minha Agenda](https://github.com/ahsouza/desafio-minha-agenda#cadastro-usuario)

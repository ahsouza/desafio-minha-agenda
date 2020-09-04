# desafio-minha-agenda
Desafio em processo seletivo para vaga desenvolvedor back-end

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
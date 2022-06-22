# Instruções de uso

## Referências

1 - Ter instalado no computador o Docker: https://docs.docker.com/engine/install/

2 - Ter instalado no computador o Docker Compose: https://docs.docker.com/compose/install/

## Linux ou WSL2

1 - Duplique o arquivo .env.example para um novo chamado ".env"

2 - "make reset"

3 - Em outra aba de terminal, execute "make sh" para acessar o container

4 - Em outra aba de terminal, execute "make db" para acessar o banco de dados

## Windows

1 - Duplique o arquivo .env.example para um novo chamado ".env"

3 - "docker-compose up --build"

4 - Em outra aba de terminal, execute "docker exec -it -u nginx ibge-php /bin/bash" para acessar o container

5 - Em outra aba de terminal, execute "docker exec -it ibge-db bash -c "psql -U ibge -d ibge" para acessar o banco de dados

## Testes

1 - Execute "make test", dentro do container, para executar todos os testes

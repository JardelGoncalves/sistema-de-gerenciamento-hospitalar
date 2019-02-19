<p align="center">
  <img width="400" src="/app/assets/img/logo.png">
</p>

Simples aplicativo para gerencimento de informações do hospital como cadastro de médico, cadastro de pacientes, cadstro de planos e gerenciar consultas (marcar, desmarcar e visualizar).

## Dependências
### Docker
Neste simples projeto, utilizamos o ambiente docker devido as facilidades para subir e testar ambientes de desenvolvimento. Para instalar, recomendamos seguir os passos da <a href="https://docs.docker.com/install/">Documentação do Docker CE</a>

### Docker Compose
O Docker facilita e muito a vida de um desenvolvedor e facilitar ainda mais, existe um utilitário conhecido como docker-compose que permite o dev em poucos minutos preparar um ambinete com todas as dependências para um determinado projeto rodar, como no nosso caso onde precisamos do PHP, outros pacotes essenciais do PHP, drive do Postgres, o próprio PostgreSQL e o Apache.

Neste projeto utlizamos para preparar o ambiente completo permitindo rodá-lo com apenas um comando. Para instalá-lo também recomendamos instalar seguindo os passos da <a href="https://docs.docker.com/compose/install/">Documentação do Docker Compose</a>.

**OBS:** Vale ressaltar que para do Docker Compose funcionar é preciso ter o **Docker** instalado.

## Executando
Acesse a pasta raiz do projeto e execute o seguinte comando:
```
docker-compose up
```
Este comando pode demorar alguns minutos dependendo da conexão com a internet.

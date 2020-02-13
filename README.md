# *REPOSITÓRIO DEPRECIADO*
### REPOSITÓRIO FOI MOVIDO PARA [https://github.com/db1group/MestreDosCodigosPhpChecker](https://github.com/db1group/MestreDosCodigosPhpChecker)

# Mestre dos códigos PHP Checker
Esse repositório contém todos os testes automatizados para validação automatizada dos exercícios de PHP do Mestre dos códigos.

## Antes de começar
Cada exercício possui um identificador (`EXERCISE_ID`) ao início de seu enunciado, que será utilizado ao nomear as *tags* das imagens de teste.
Isso ocorre porque cada imagem criada tem objetivo de testar apenas um exercício.

Mais detalhes você pode conferir na [Estrutura do projeto](#estrutura-do-projeto).

O [Docker Hub](https://hub.docker.com/repository/docker/byivo/mdc-php-checker) contém todas as *tags* disponíveis.



## Executar validações da imagem contra seu exercício

Acesse a pasta do projeto que possui o arquivo `index.php` e execute:
`docker run --rm -it -v $(pwd):/opt/project/public byivo/mdc-php-checker:EXERCISE_ID`

> Onde:
>* `docker run` cria e executa um container a partir de uma imagem.
>* `--rm` excluir esse container assim que ele é parado.
>* `-it` execute em modo de terminal interativo.
>* `-v $(pwd):/opt/project/public` monte um volume chamado */opt/project/public* dentro do container, contendo os arquivos do diretório que estou rodando o comando *$(pwd)* 
>* `byivo/mdc-php-checker` imagem utilizada na criação do container
>* `EXERCISE_ID` *tag* da imagem, que **deve ser substituída pelo ID do exercício a ser testado**.



## Criando uma imagem com os testes de um exercício 

Para criar a imagem, execute na raiz do projeto:
```sh
./build-non-versioned-image-for-exercise.sh EXERCISE_ID
```
> Onde: 
>*  `./build-non-versioned-image-for-exercise.sh` é o caminho do script
>* `EXERCISE_ID` deve ser substituído pelo identificador do exercício. (É a palavra entre parênteses ao início do enunciado e.g. ddos-tracker; calculator)



## Estrutura do projeto

O projeto é separado em duas partes:

#### Arquivos de configuração do projeto PHP

A pasta `docker-build` possui os arquivos de configuração do docker e de execução dos testes.
Aqui ficam os arquivos que são comuns de todas as imagens.

#### Testes de validação

A pasta `test` contém diversos diretórios, onde cada um possui os testes associados com a resolução de um problema. 
A *tag* de cada imagem será o mesmo nome do diretório de testes usado para criar a imagem.

Cada uma dessas pastas será copiada em sua própria imagem, dividindo espaço com os [Arquivos de configuração do projeto PHP](#arquivos-de-configurao-do-projeto-php).

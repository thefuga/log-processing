# Log-Processing
Esta e a solução para o problema proposto [aqui](https://github.com/thefuga/log-processing/blob/master/DESCRIPTION.md)

## instruções
### Dependências
- `PHP >= 7`;
- `Composer`;
- `MySQL` ou `PostgreSQL`.

## Passos
- Atualize o arquivo .env com os dados para conexão com o banco de dados;
- Execute `composer install` para instalar as dependências;
- Execute `php log-processing migrate:fresh` para executar as migrations;
- Rode comandos na forma `php log-processing 'command'`.

## Comandos disponíveis
### Banco de dados
- `seed 'filename'`: carrega o banco de dados com os dados presentes em `storage/filename.txt`.
 
 ### Models
 - `create 'Model'`: cria um model valido no banco de dados (utilizando factories). Ex.: `php log:processing create Consumer`;
 - `show 'Model' 'id'`: busca e exibe a entrada com aquele ID;
 - `destroy 'Model' 'id'`: deleta o model com aquele ID.
 
 ### Consumer
 - `consumer:requests 'filename.csv'`: gera um relatório com a contagem de requests por consumidor em `storage/filename.csv`.
 
### Service
- `service:requests 'filename.csv'`: gera um relatório com a contagem de requests por serviço em `storage/filename.csv`;
- `service:latencies 'filename.csv':` gera um relatório com tempos médios de latências por serviço em `storage/filename.csv`.

## Relatórios
Os relatórios gerados com os comandos acima estão disponíveis em `storage/requests_per_consumer.csv`, `storege/requests_per_service.csv` e `storage/average_latency_times.csv`, e foram gerados com o arquivo `storage/logs.txt`.

## Justificativa
Após analisar o formato das entradas, criei modelos com base nos objetos representados pelo JSON fornecido. Todos os dados foram considerados, embora alguns não sejam utilizados diretamente pelos relatórios. Achei interessante modelar tudo para tentar reproduzir com mais fidelidade os objetos representados.
Comandos foram criados para permitir a execução dos requisitos, e alguns outros para permitir testes e uso geral do banco. Os comandos de criação de models utilizam factories.
Um model base foi criado para armazenar permitir reuso dos properties de mass assignement e cast, para permitir o uso de UUID.
Ainda sobre UUID, um trait foi criado para gerar estes IDs aleatoriamente nos models que não possuíam um ID previamente.
Tambem foi criado um trait para auxiliar nos parametros dos models.
O código tenta seguir o [PSR](https://www.php-fig.org/psr/).

# Painel de Controle v2.0.0

O Painel de Controle é uma ferramenta desenvolvida para administrar e monitorar um site, fornecendo aos usuários autorizados a capacidade de gerenciar conteúdos, usuários e métricas relacionadas ao site.

## Funcionalidades Principais

- **Gestão de Conteúdo do Site**:
  - Edição e organização de seções como serviços, depoimentos, rodapé, cabeçalho, área de contato, etc.
  - Adição, edição e exclusão de depoimentos que serão exibidos no site.
  - Paginação e reordenação dos depoimentos.

- **Controle de Usuários**:
  - Cadastro, edição e exclusão de usuários com diferentes níveis de permissão: Administrador, Subadministrador e Colaborador.
  - Visualização da lista de usuários e seus respectivos cargos.

- **Métricas e Monitoramento**:
  - Exibição de métricas como total de visitas, visitas do dia e visitas recentes ao site.
  - Monitoramento do tráfego do site.

- **Segurança**:
  - Implementação de medidas de segurança para prevenir falhas como SQL Injection, Cross-Site Scripting (XSS), Local File Inclusion (LFI), Remote File Inclusion (RFI), NullByte e Upload de Shell.

## Tabelas do Banco de Dados

- **online_tb**: Armazena informações sobre os visitantes online do site.
- **tb_admin_usuario**: Contém dados dos usuários do painel de controle, incluindo informações de login e níveis de permissão.
- **tb_admin_visitas**: Registra as visitas ao painel de controle, incluindo dados como data e hora da visita.
- **tb_site_depoimentos**: Mantém os depoimentos cadastrados para exibição no site, incluindo informações como autor, mensagem e data de envio.
- **tb_site_servicos**: Mantém os serviços cadastrados para a exibição no site, incluir dentro de uma lista com limite de 6 serviços.
- **NOVO** **tb_site_slides**: Mantém os slides cadastrados para a exibição no site, incluir dentro de uma lista com limite de 8 slides.
- **NOVO** **tb_site_config**: Mantém a estruturação do site para a exibição, sendo possivel editar na area de "editar geral".

## Grande Atualização v2.0.0: Um Novo Começo!

Estou animado em anunciar uma atualização completa e do zero para o projeto! Nesta nova versão, foi reimaginado e reescrito tudo, desde as pastas até as classes, aplicando novos Design Patterns e organizando o código para acomodar futuras funcionalidades.

Essas mudanças não apenas melhoram a estrutura do projeto, tornando-o mais fácil de entender e dar manutenção, mas também preparam o terreno para a implementação de emocionantes recursos no futuro. Estou comprometido em fornecer a melhor experiência possível e estou ansioso para compartilhar mais novidades em breve.

## Changelog

### Versão 2.0.0
- **Mudanças no Codigo**
  - Mudança total do codigo
  - Pastas modificadas
  - Projeto rescrito do zero


### Versão 1.3.1
- **Correção**
  - PHPMailer
  - Define corretamente

### Versão 1.3.0
- **Nova Funcionalidade**
  - Seção Cadastrar Slides
    - Cadastro do nome
    - Upload de Imagem
  - Seção Listar Slides
  - Seção Editar Slides
  - Tabela de slides
  - Seção Editar Geral
  - Mudanças dinamicas no site

### Versão 1.2.0
- **Nova Funcionalidade**
  - Seção de criação de serviços
  - Seção de Lista de Serviços
  - Seção de Edição de cada serviço
  - Exclusão individual de cada serviço
  - Tabela na Lista de Serviços
  - Exibição dinamico no site
  - Auteração na logica de Listas em geral

- **Mudanças no Codigo**
  - Aquivos Adicionados:
      - TableList.php
      - CadastraServico.php
      - EditarServico.php
      - ListaServico.php

  - Auteração dos arquivos:
    - ListaDepoimento.php
    - ListaServico.php
    - CadastraDepoimento.php
    - CadastraServico.php
    - Painel.php
  
- **Correções**
  - :white_check_mark:XSS ListaDepoimento   
  - :white_check_mark:XSS Site              
  - :white_check_mark:Privilege Escalation  
  
### Versão 1.1.3
- **Correções**
  - :white_check_mark:Bug do Cadastro de depoimentos              
  - :white_check_mark:Alteração na logica da lista de Depoimentos 

### Versão 1.1.2
- **Correções**
  - :white_check_mark:Responsividade no Painel  

### Versão 1.1.1
- **Correções**
  - :white_check_mark:Responsividade das Tabelas  

### Versão 1.1.0
- **Nova Funcionalidade**
  - URL Dinamica
  - Seção Cadastra Depoimentos
  - Depoimentos no Banco de Dados
  - Filtragem dos depoimentos
  - tabela de depoimentos
  - Edição do depoimentos
  - Exclusão do depoimentos
  - Alteração da ordem dos depoimentos
  - Depoimentos Mostrado no site

- **Correções**
  - :white_check_mark:Vulnerabilidade Null Byte corrigida 
  - :white_check_mark:Vulnerabilidade XSS Corrigida       

### Versão 1.0.0

- Laçamento do projeto no GitHUB

### Versão Beta 0.16.1
- **Beta Release**
  - Correção de bugs
  - Correção dos cookies
  - Correção das SideBars

### Versão Beta 0.16.0
- **Beta Release**
  - Lembrar-me
  - Cookies
  - Validação dos Cookies com DB
  - filtragem dos cookies
  - Manter o login ao fechar a pagina

### Versão Beta 0.15.1
- **Beta Release**
  - Correção das URL Dinamicas

### Versão Beta 0.15.0
- **Beta Release**
  - Seção Editar Usuario
  - Seção Cadastra Usuario
  - Conexão com DB funcionalidades com Banco de Dados
  - Filtração das entradas do usuarios
  - Permissão de usuario atraves do cargo

### Versão Beta 0.14.0
- **Beta Release**
  - Seção box-content
  - Tabela
  - Metricas de Visitas totais
  - Metricas de Visitas de Hoje
  - Metricas de Usuarios Onlines
  - Tabela dos usuarios que estão online
  - Tabela dos Login e cargo dos Colaboradores

### Versão Beta 0.13.2
- **Beta Release**
  - Conexão com DB de forma segura

### Versão Beta 0.13.1
- **Beta Release**
  - Correção da vulnerabilidade XSS

### Versão Beta 0.13.0
- **Beta Release**
  - Criação do painel
  - Planejamento do Painel
  - Estrutura do Painel
  - Redirecionamentos

### Versão Beta 0.12.1
- **Beta Release**
  - Correção da vulnerabilidade SQLI

### Versão Beta 0.12.0
- **Beta Release**
  - Criação do login
  - Classes de Banco de dados
  - Conexão com banco de dados
  - Iniciando o CRUD
  - Autenticação com admin
  - Session_start iniciando com sessões
  - permissão do painel atraves do SESSION

### Versão Beta 0.9.2
- **Beta Release**
  - Correção de bugs no autoload
  - Correção de bugs no Factory

### Versão Beta 0.9.1
- **Beta Release**
  - Correção de bugs no envio do email

### Versão Beta 0.9.0
- **Beta Release**
  - Estruturação da pasta classes
  - Autoload
  - Envio de Email com php
  - Recebimento de Email com php
  - PHP na indentação html
  - Criação do banco de dados
  - Criação da tabela "tb_admin_usuario"
  - Criação da pasta painel
  - Url dinamico
  - Configuração do .htaccess
  - Configuração do .htaccess do painel
  - Ajuste na marcação html

### Versão Alfa 0.4.0
- **Alfa Release**
  - Adicionando Media Querys
  - Site Responsivo

### Versão Alfa 0.3.1
- **Alfa Release**
  - Correção das seções
  - Correção do css

### Versão Alfa 0.3.0
- **Alfa Release**
  - Marcação Html do projeto
  - Estilização basica do projeto
  - Crição da seção banner
  - Criação da seção sobre
  - Criação da seção depoimento
  - Criação da seção footer

### Versão Alfa 0.2.1
- **Alfa Release**
  - Correção da Estrutura de pasta

### Versão Alfa 0.2.0
- **Alfa Release**
  - Estruturação do projeto
  - criação do index.php
  - Pensamento Basico do Projeto

### Versão Alfa 0.1.0

- **Alfa Release**:
  - Criação do Projeto
  - Fase inicial
  - Preparação do git

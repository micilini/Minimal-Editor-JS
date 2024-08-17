# Minimal Editor.JS para PHP

Solução em PHP que utiliza o [Editor.JS](https://github.com/codex-team/editor.js) de forma mínima para uso rápido.

Este sistema foi criado para que você possa fazer o uso do editor.js com PHP sem a necessidade de passar por todo o processo de instalação e configuração que existe na [documentação](https://editorjs.io/getting-started/) do plugin oficial.

Uma vez que essa versão já conta com todos os arquivos e componentes necessários para a utilização rápida. Bastando apenas clonar o projeto e abrir no navegador.

## O que é o Editor.JS?

O [Editor.JS](https://github.com/codex-team/editor.js) é um editor de texto de código aberto que oferece uma variedade de recursos para ajudar os usuários a criar e formatar conteúdo com eficiência.

## Como fazer a instalação?

Para usar este sistema é necessário que você já tenha um ambiente de desenvolvimento PHP instalado na sua máquina local/remota.

Se você estiver usando o Windows, você pode configurar um novo ambiente por meio do [XAMPP](https://www.apachefriends.org/pt_br/index.html).

Com o ambiente já configurado, basta fazer o clone deste repositório para dentro do seu ambiente (no caso do XAMPP faça isso dentro da pasta 'htdocs'):

```git clone https://github.com/micilini/Minimal-Editor-JS.git```

Em seguida, basta abrir a pasta do projeto pelo seu navegador e começar a utilizar o editor.js 😍

## Características

Esta solução salva automáticamente a cada 30 segundos, todo o texto que foi digitado em um arquivo chamado ```default.json``` dentro da pasta ```data/drafts```.

Para alterar o tempo de salvamento automático basta modificar o valor da variável ```autoSaveSeconds``` existente dentro do arquivo ```index.php``` na linha ```65```.

Salvamentos manuais também são permitidos, bastando apenas que você clique no botão ```Save Draft```.

Para salvar em um arquivo com um nome customizado clique no botão ```Save as...```.

Para apagar todo o rascunho basta clicar no botão ```Reset Draft```.

Para apagar todos os arquivos temporários existentes na pasta ```data/temp``` basta clicar no botão ```Reset Temp```.

É importante ressaltar que o PHP carrega todo o conteúdo do arquivo ```default.json``` de forma automática sempre quando você acessa o arquivo ```index.php```.

Para inserir uma imagem no editor, basta copiar e colar em uma linha em branco.

## Imagens

![Tela 01](https://github.com/micilini/Minimal-Editor-JS/blob/main/public/assets/screen-01.png)





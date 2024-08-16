-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/08/2024 às 04:17
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `panel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `online_tb`
--

CREATE TABLE `online_tb` (
  `id` int(11) NOT NULL,
  `ip` varchar(128) NOT NULL,
  `last_action` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin_usuarios`
--

CREATE TABLE `tb_admin_usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin_visitas`
--

CREATE TABLE `tb_admin_visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(128) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site_categorias`
--

CREATE TABLE `tb_site_categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slog` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site_categorias`
--

INSERT INTO `tb_site_categorias` (`id`, `nome`, `slog`, `order_id`) VALUES
(14, 'Política', 'política', 14),
(15, 'Economia', 'economia', 15),
(16, 'Crime e Segurança', 'crime-e-seguranca', 16);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site_config`
--

CREATE TABLE `tb_site_config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `icone_descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `icone_descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `icone_descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site_config`
--

INSERT INTO `tb_site_config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `icone_descricao1`, `icone2`, `icone_descricao2`, `icone3`, `icone_descricao3`) VALUES
('Website', 'Lucas S. da Anunciação', 'Lucas Santos é um empreendedor visionário cuja história inspiradora começa em uma pequena cidade do interior. Desde jovem, Lucas demonstrava uma mente inquisitiva e uma paixão pelo mundo dos negócios. Após se formar na universidade com uma visão clara de seu futuro, Lucas decidiu mergulhar de cabeça no empreendedorismo.\r\n<br>\r\n<br>\r\nOs primeiros passos de Lucas foram marcados por desafios e obstáculos aparentemente intransponíveis. No entanto, sua determinação inabalável e sua habilidade em transformar adversidades em oportunidades logo se destacaram. Com uma ideia inovadora e uma equipe dedicada, Lucas fundou sua primeira startup, enfrentando os altos e baixos do mundo dos negócios com coragem e resiliência.\r\n<br>\r\n<br>\r\nAo longo de sua jornada empreendedora, Lucas enfrentou desafios que testaram sua determinação e criatividade. Desde a busca por investidores até a construção de uma cultura empresarial sólida, cada obstáculo serviu como um degrau em sua escalada rumo ao sucesso.\r\n<br>\r\n<br>\r\nHoje, a empresa de Lucas é um exemplo de inovação e excelência, transformando indústrias e impactando positivamente a vida de milhões de pessoas em todo o mundo. Sua história é um lembrete poderoso de que, com visão, trabalho árduo e resiliência, qualquer sonho pode se tornar realidade.', 'fa-brands fa-css3', 'Serviço de CSS, deixe seus sites bonitos com estilos atuais, ou um 3D mais moderno!', 'fa-brands fa-html5', 'Marcações, todo site prescisa ser marcado pela presença do html, viva aos hiper textos!', 'fa-brands fa-js', 'Javascript, logica, programação, tudo que prescisamos para deixa seu site interativo e funcional, alem de um foco e destaque maior no seu site!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site_depoimentos`
--

CREATE TABLE `tb_site_depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site_depoimentos`
--

INSERT INTO `tb_site_depoimentos` (`id`, `nome`, `depoimento`, `data`, `order_id`) VALUES
(28, 'Joshua Olivia', 'Site extremamente bacana, Que coisa linda de se ver!', '06/08/2023', 29),
(29, 'Orlando', 'Nossa eu botei pouca fe nos serviços que me apresentaram, mas agora vendo os numeros, vejo que posso confia na DW_Studio!', '03/08/2021', 41),
(41, 'Losena', 'Ponte de losena, final de xadrez', '07/09/1887', 28),
(42, 'Cavalos', 'Cavalos posicoes fechadas', '01/02/1457', 42);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site_noticias`
--

CREATE TABLE `tb_site_noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `slog` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site_noticias`
--

INSERT INTO `tb_site_noticias` (`id`, `categoria_id`, `data`, `titulo`, `conteudo`, `capa`, `slog`, `order_id`) VALUES
(11, 14, '2024-03-11', 'Nova Lei de Proteção Ambiental é Aprovada no Congresso Nacional', '<h1><strong>Nova Lei de Prote&ccedil;&atilde;o Ambiental &eacute; Aprovada no Congresso Nacional</strong></h1>\r\n<p>Em uma vota&ccedil;&atilde;o hist&oacute;rica, o Congresso Nacional aprovou por unanimidade a&nbsp;<strong>Lei de Prote&ccedil;&atilde;o Ambiental do Brasil</strong>. A nova legisla&ccedil;&atilde;o visa fortalecer a preserva&ccedil;&atilde;o dos ecossistemas, combater o desmatamento ilegal e promover a sustentabilidade em todo o pa&iacute;s.</p>\r\n<p>A lei estabelece medidas rigorosas para a prote&ccedil;&atilde;o de &aacute;reas verdes, rios, florestas e biodiversidade. Algumas das principais disposi&ccedil;&otilde;es incluem:</p>\r\n<ol>\r\n<li>\r\n<p><strong>Restri&ccedil;&otilde;es ao Desmatamento</strong>: Ficam proibidos o desmatamento em &aacute;reas de preserva&ccedil;&atilde;o permanente e o corte indiscriminado de &aacute;rvores em propriedades privadas. A fiscaliza&ccedil;&atilde;o ser&aacute; intensificada para garantir o cumprimento dessas regras.</p>\r\n</li>\r\n<li>\r\n<p><strong>Incentivos &agrave; Conserva&ccedil;&atilde;o</strong>: Propriet&aacute;rios rurais que adotarem pr&aacute;ticas sustent&aacute;veis, como reflorestamento e uso respons&aacute;vel do solo, receber&atilde;o incentivos fiscais e cr&eacute;ditos ambientais.</p>\r\n</li>\r\n<li>\r\n<p><strong>Combate ao Tr&aacute;fico de Animais Silvestres</strong>: A nova lei prev&ecirc; penas mais severas para o tr&aacute;fico de animais e plantas nativas. Al&eacute;m disso, ser&atilde;o criadas unidades especializadas para investigar e reprimir esse tipo de crime.</p>\r\n</li>\r\n<li>\r\n<p><strong>Participa&ccedil;&atilde;o da Sociedade Civil</strong>: A sociedade ter&aacute; maior participa&ccedil;&atilde;o na gest&atilde;o ambiental, por meio de conselhos consultivos e audi&ecirc;ncias p&uacute;blicas. Isso garantir&aacute; transpar&ecirc;ncia e engajamento nas decis&otilde;es relacionadas ao meio ambiente.</p>\r\n</li>\r\n</ol>\r\n<p>O presidente da Rep&uacute;blica, em pronunciamento ap&oacute;s a aprova&ccedil;&atilde;o da lei, destacou a import&acirc;ncia desse marco para o Brasil e para as futuras gera&ccedil;&otilde;es. Ele ressaltou que a preserva&ccedil;&atilde;o ambiental &eacute; um compromisso inegoci&aacute;vel e que o pa&iacute;s est&aacute; dando um passo significativo na dire&ccedil;&atilde;o certa.</p>\r\n<p>A nova Lei de Prote&ccedil;&atilde;o Ambiental entrar&aacute; em vigor em 90 dias, permitindo que os &oacute;rg&atilde;os competentes se preparem para sua implementa&ccedil;&atilde;o. Ambientalistas, cientistas e defensores da natureza celebram essa conquista como um avan&ccedil;o crucial na busca por um Brasil mais verde e sustent&aacute;vel.</p>', 'politicaAmbiente_news.jpg', 'nova-lei-de-protecao-ambiental-e-aprovada-no-congresso-nacional', 11),
(12, 15, '2024-03-11', 'Investimentos em Marketing Digital Aumentam 85% nos Próximos Cinco Anos', '<h1><strong>Investimentos em Marketing Digital Aumentam 85% nos Pr&oacute;ximos Cinco Anos</strong></h1>\r\n<p>Uma pesquisa recente revelou que os investimentos em&nbsp;<strong>marketing digital</strong>&nbsp;est&atilde;o em ascens&atilde;o no pa&iacute;s. L&iacute;deres do setor preveem um aumento significativo de&nbsp;<strong>85% nos pr&oacute;ximos cinco anos</strong>.</p>\r\n<p>Aqui est&atilde;o algumas tend&ecirc;ncias e not&iacute;cias relevantes sobre o marketing digital:</p>\r\n<ol>\r\n<li>\r\n<p><strong>Cultura do SEO em Evolu&ccedil;&atilde;o</strong>: Empresas est&atilde;o cada vez mais focadas em otimiza&ccedil;&atilde;o de mecanismos de busca (SEO) para melhorar sua visibilidade online.&nbsp;<a class=\"tooltip-target\" href=\"https://www.bing.com/aclick?ld=e81L9BD1DKeB4JTt7cJeLK7TVUCUzay-Rd2M2YkWi9tmE0j1wemeG9fv8kAzscGcZSutKyTiO0gkt-klP0Fh_fS6VdbVCkvh97ntFZ81ssSchnSICv3sr5bdfYks6dUy8DOhnkw8BucFi9oaM6lxLD827WEd3y5_mzMjb7wz83_m96xYDe&amp;u=aHR0cHMlM2ElMmYlMmZhZHMuZ29vZ2xlLmNvbSUyZmludGwlMmZwdC1CUl9iciUyZnN0YXJ0JTJmb3ZlcnZpZXctYWRvbiUyZiUzZnN1YmlkJTNkYnItcHQtYWRvbi1hd2Etc2NoLWMtc2NydSFvMyU3ZTg4NWIyNjc5NTA1ZjE0YTcxZjJkNDM5NjNmM2UyOGZlJTdlcDc3NjY2Mzg1MTg5JTI2JTI2Z2NsaWQlM2Q4ODViMjY3OTUwNWYxNGE3MWYyZDQzOTYzZjNlMjhmZSUyNmdjbHNyYyUzZDNwLmRzJTI2dXRtX3NvdXJjZSUzZGJpbmclMjZ1dG1fbWVkaXVtJTNkY3BjJTI2dXRtX2NhbXBhaWduJTNkMTcwNzYzMCUyNTIwJTI1N0MlMjUyMEdvb2dsZSUyNTIwQWRzJTI1MjAlMjU3QyUyNTIwRFIlMjUyMCUyNTdDJTI1MjBFU1MwMSUyNTIwJTI1N0MlMjUyMExBVEFNJTI1MjAlMjU3QyUyNTIwQlIlMjUyMCUyNTdDJTI1MjBwdCUyNTIwJTI1N0MlMjUyMERlc2slMjUyQlRhYiUyNTIwJTI1N0MlMjUyMFNFTSUyNTIwJTI1N0MlMjUyMFNLV1MlMjUyMC0lMjUyMFBIUiUyNTIwJTI1N0MlMjUyMFR4dCUyNTIwJTI1N0MlMjUyMEJpbmdfSGlnaCUyNnV0bV90ZXJtJTNkbWFya2V0aW5nJTI1MjBkaWdpdGFsJTI2dXRtX2NvbnRlbnQlM2REZXNrJTI1MkJUYWIlMjUyMCUyNTdDJTI1MjBTS1dTJTI1MjAtJTI1MjBQSFIlMjUyMCUyNTdDJTI1MjBUeHQlMjUyMCU3ZSUyNTIwSGlnaCUyNTIwJTdlJTI1MjBNYXJrZXRpbmc&amp;rlid=885b2679505f14a71f2d43963f3e28fe\" target=\"_blank\" rel=\"noopener\" data-citationid=\"b942e5d2-7f09-f026-8ca6-6cde41a52b28-12-group\">A cultura do SEO est&aacute; em constante atualiza&ccedil;&atilde;o, com estrat&eacute;gias adaptando-se &agrave;s mudan&ccedil;as nos algoritmos dos mecanismos de busca</a><a class=\"ac-anchor sup-target\" href=\"https://revistalivemarketing.com.br/a-cultura-do-seo-e-o-futuro-do-marketing-digital-em-constante-atualizacao/\" target=\"_blank\" rel=\"noopener\" data-citationid=\"b942e5d2-7f09-f026-8ca6-6cde41a52b28-12\" aria-label=\"1: Cultura do SEO em Evolu&ccedil;&atilde;o\"><sup class=\"citation-sup\">1</sup></a>.</p>\r\n</li>\r\n<li>\r\n<p><strong>Escola P&uacute;blica de Marketing Digital</strong>: A Prefeitura Municipal lan&ccedil;ou a&nbsp;<strong>1&ordf; Escola P&uacute;blica de Marketing Digital do Brasil</strong>.&nbsp;<a class=\"tooltip-target\" href=\"https://www.progresso.com.br/cidades/prefeitura-lanca-1a-escola-publica-de-marketing-digital-do-brasil/418150/\" target=\"_blank\" rel=\"noopener\" data-citationid=\"b942e5d2-7f09-f026-8ca6-6cde41a52b28-18-group\">O projeto inovador visa capacitar jovens e empreendedores nas habilidades necess&aacute;rias para o mundo digital</a><a class=\"ac-anchor sup-target\" href=\"https://www.progresso.com.br/cidades/prefeitura-lanca-1a-escola-publica-de-marketing-digital-do-brasil/418150/\" target=\"_blank\" rel=\"noopener\" data-citationid=\"b942e5d2-7f09-f026-8ca6-6cde41a52b28-18\" aria-label=\"2: 1&ordf; Escola P&uacute;blica de Marketing Digital do Brasil\"><sup class=\"citation-sup\">2</sup></a>.</p>\r\n</li>\r\n<li>\r\n<p><strong>Marketing de Influ&ecirc;ncia no B2B</strong>: Um estudo da Ogilvy revelou que 48% das equipes de marketing consideram o&nbsp;<strong>Facebook</strong>&nbsp;como a pr&oacute;xima plataforma importante para o marketing de influenciadores no segmento B2B.&nbsp;<a class=\"tooltip-target\" href=\"https://www.baguete.com.br/noticias/11/03/2024/b2b-deve-investir-mais-em-marketing-de-influencia\" target=\"_blank\" rel=\"noopener\" data-citationid=\"b942e5d2-7f09-f026-8ca6-6cde41a52b28-24-group\">Essa tend&ecirc;ncia mostra que o marketing de influ&ecirc;ncia n&atilde;o deve ser limitado apenas ao LinkedIn</a><a class=\"ac-anchor sup-target\" href=\"https://www.baguete.com.br/noticias/11/03/2024/b2b-deve-investir-mais-em-marketing-de-influencia\" target=\"_blank\" rel=\"noopener\" data-citationid=\"b942e5d2-7f09-f026-8ca6-6cde41a52b28-24\" aria-label=\"3: Facebook\"><sup class=\"citation-sup\">3</sup></a>.</p>\r\n</li>\r\n</ol>\r\n<p>Essas not&iacute;cias indicam que o marketing digital est&aacute; se tornando uma parte essencial das estrat&eacute;gias empresariais. &Agrave; medida que a tecnologia avan&ccedil;a, as empresas est&atilde;o investindo cada vez mais em estrat&eacute;gias digitais para alcan&ccedil;ar seus p&uacute;blicos de maneira eficaz.</p>', 'marketingDigital_news.jpg', 'investimentos-em-marketing-digital-aumentam-85%-nos-próximos-cinco-anos', 13),
(13, 16, '2024-03-11', 'Notícia de Segurança Pública', '<h1>Not&iacute;cia de Seguran&ccedil;a P&uacute;blica</h1>\r\n<p><strong>Corpo de advogado executado no Rio &eacute; enterrado nesta quarta-feira (28)</strong>&nbsp;O corpo do advogado, v&iacute;tima de um assassinato brutal no Rio de Janeiro, foi sepultado hoje. O crime chocou a comunidade jur&iacute;dica e levanta preocupa&ccedil;&otilde;es sobre a seguran&ccedil;a na cidade.</p>\r\n<p><strong>Criminosos usam caminh&atilde;o de lixo como barricada em opera&ccedil;&atilde;o da PM no Rio</strong>&nbsp;Em uma opera&ccedil;&atilde;o policial, criminosos utilizaram um caminh&atilde;o de lixo como barricada para dificultar a a&ccedil;&atilde;o das for&ccedil;as de seguran&ccedil;a. A ousadia dos bandidos ressalta os desafios enfrentados pelas autoridades no combate ao crime.</p>\r\n<p><strong>For&ccedil;as Armadas continuar&atilde;o nas pris&otilde;es enquanto for necess&aacute;rio, diz chefe militar do Equador</strong>&nbsp;O chefe militar do Equador afirmou que as For&ccedil;as Armadas permanecer&atilde;o nas pris&otilde;es do pa&iacute;s pelo tempo necess&aacute;rio para garantir a seguran&ccedil;a e a ordem. A medida visa conter a viol&ecirc;ncia e evitar fugas de detentos.</p>\r\n<p><strong>Agora no Senado, Dino apresenta projeto que pro&iacute;be acampamentos em frente a quart&eacute;is</strong>&nbsp;O senador Dino prop&ocirc;s um projeto de lei que visa proibir acampamentos e manifesta&ccedil;&otilde;es em frente a quart&eacute;is das for&ccedil;as de seguran&ccedil;a. A iniciativa busca preservar a integridade das instala&ccedil;&otilde;es militares e garantir a tranquilidade nas &aacute;reas adjacentes.</p>\r\n<p><strong>RJ: menino da Baixada Fluminense &eacute; a segunda crian&ccedil;a baleada em 2024 no estado</strong>&nbsp;A viol&ecirc;ncia armada no Rio de Janeiro atinge at&eacute; mesmo os mais jovens. Um menino da Baixada Fluminense se tornou a segunda crian&ccedil;a baleada no estado este ano, evidenciando a urg&ecirc;ncia de medidas para proteger a popula&ccedil;&atilde;o vulner&aacute;vel.</p>\r\n<p><strong>Cubano confessa participa&ccedil;&atilde;o na morte de galerista e d&aacute; mais detalhes do crime</strong> Um cubano suspeito de envolvimento na morte de um galerista norte-americano no Rio de Janeiro confessou sua participa&ccedil;&atilde;o no crime e forneceu informa&ccedil;&otilde;es adicionais. O caso continua sob investiga&ccedil;&atilde;o, revelando as complexidades do cen&aacute;rio criminal.</p>', 'crimeSeguranca_news.jpg', 'notícia-de-seguranca-publica', 12),
(14, 15, '2024-03-11', 'Notícia de Economia: Investimentos de Longo e Curto Prazo', '<h1><strong>Not&iacute;cia de Economia: Investimentos de Longo e Curto Prazo</strong></h1>\r\n<p>Investir &eacute; uma estrat&eacute;gia fundamental para alcan&ccedil;ar objetivos financeiros, mas entender os prazos dos investimentos &eacute; crucial para tomar decis&otilde;es acertadas. Vamos explorar as diferen&ccedil;as entre investimentos de&nbsp;<strong>longo prazo</strong>&nbsp;e&nbsp;<strong>curto prazo</strong>:</p>\r\n<ol>\r\n<li>\r\n<p><strong>Longo Prazo</strong>:</p>\r\n<ul>\r\n<li><strong>Dura&ccedil;&atilde;o</strong>: Entre&nbsp;<strong>cinco e dez anos</strong>.</li>\r\n<li><strong>Caracter&iacute;sticas</strong>:\r\n<ul>\r\n<li>Ideal para metas distantes, como aposentadoria ou educa&ccedil;&atilde;o dos filhos.</li>\r\n<li>Mais toler&acirc;ncia ao risco, pois o tempo permite recupera&ccedil;&atilde;o de eventuais perdas.</li>\r\n<li>Exemplos:&nbsp;<strong>a&ccedil;&otilde;es</strong>,&nbsp;<strong>fundos imobili&aacute;rios</strong>,&nbsp;<strong>previd&ecirc;ncia privada</strong>.</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p><strong>Curto Prazo</strong>:</p>\r\n<ul>\r\n<li><strong>Dura&ccedil;&atilde;o</strong>: Menos de&nbsp;<strong>seis meses a um ano</strong>.</li>\r\n<li><strong>Caracter&iacute;sticas</strong>:\r\n<ul>\r\n<li>Objetivos imediatos, como viagens ou compras.</li>\r\n<li>Menos risco, mas menor potencial de retorno.</li>\r\n<li>Exemplos:&nbsp;<strong>t&iacute;tulos de renda fixa</strong>, como&nbsp;<strong>LCI</strong>,&nbsp;<strong>LCA</strong>&nbsp;e&nbsp;<strong>CDB</strong>.</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p><strong>Por que a dificuldade em pensar a longo prazo?</strong>&nbsp;Durante d&eacute;cadas, o Brasil enfrentou hiperinfla&ccedil;&atilde;o, o que incentivava investimentos r&aacute;pidos para evitar desvaloriza&ccedil;&atilde;o da moeda. Mesmo ap&oacute;s a estabiliza&ccedil;&atilde;o, essa mentalidade persiste.</p>\r\n<p><strong>Impostos e Liquidez</strong>:</p>\r\n<ul>\r\n<li>Ativos de&nbsp;<strong>curto prazo</strong>&nbsp;est&atilde;o mais sujeitos &agrave; tributa&ccedil;&atilde;o regressiva do&nbsp;<strong>Imposto de Renda</strong>&nbsp;(al&iacute;quotas de 22,5% a 17,5%).</li>\r\n<li>Investimentos de&nbsp;<strong>m&eacute;dio prazo</strong>&nbsp;(um a cinco anos) t&ecirc;m menos liquidez, mas efici&ecirc;ncia fiscal maior (al&iacute;quota de 17,5% a 15%).</li>\r\n</ul>\r\n<p><a class=\"tooltip-target\" href=\"https://borainvestir.b3.com.br/objetivos-financeiros/investir-melhor/curto-medio-e-longo-o-que-sao-os-prazos-dos-investimentos-e-como-defini-los/\" target=\"_blank\" rel=\"noopener\" data-citationid=\"514cb196-a497-1d09-a770-b6b523436a93-55-group\">Em resumo, escolha seus investimentos com base nos seus objetivos e no prazo que melhor se alinha &agrave;s suas necessidades e planos financeiros</a></p>', 'investimento_news.jpg', 'notícia-de-economia:-investimentos-de-longo-e-curto-prazo', 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site_servicos`
--

CREATE TABLE `tb_site_servicos` (
  `id` int(11) NOT NULL,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site_servicos`
--

INSERT INTO `tb_site_servicos` (`id`, `servico`, `order_id`) VALUES
(1, 'Serviços de HTML, CSS, JS e PHP junto com MySQL', 1),
(2, 'um monte de coisa legal', 2),
(3, 'outra coisa egal', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_site_slides`
--

CREATE TABLE `tb_site_slides` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_site_slides`
--

INSERT INTO `tb_site_slides` (`id`, `nome`, `slide`, `order_id`) VALUES
(15, 'teste de novo', 'ane_slide.jpg', 15);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `online_tb`
--
ALTER TABLE `online_tb`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin_usuarios`
--
ALTER TABLE `tb_admin_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin_visitas`
--
ALTER TABLE `tb_admin_visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site_categorias`
--
ALTER TABLE `tb_site_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site_depoimentos`
--
ALTER TABLE `tb_site_depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site_noticias`
--
ALTER TABLE `tb_site_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site_servicos`
--
ALTER TABLE `tb_site_servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_site_slides`
--
ALTER TABLE `tb_site_slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `online_tb`
--
ALTER TABLE `online_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_admin_usuarios`
--
ALTER TABLE `tb_admin_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_admin_visitas`
--
ALTER TABLE `tb_admin_visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_site_categorias`
--
ALTER TABLE `tb_site_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_site_depoimentos`
--
ALTER TABLE `tb_site_depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `tb_site_noticias`
--
ALTER TABLE `tb_site_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_site_servicos`
--
ALTER TABLE `tb_site_servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_site_slides`
--
ALTER TABLE `tb_site_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

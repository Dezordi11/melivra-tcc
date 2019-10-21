-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Out-2019 às 23:55
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `nota` int(11) NOT NULL DEFAULT '0',
  `texto` text CHARACTER SET latin1 COLLATE latin1_bin,
  `tipo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`idAvaliacao`, `idUsuario`, `nota`, `texto`, `tipo`) VALUES
(1, 8, 3, 'Muito bom!', 'a'),
(2, 8, 5, 'Melhorou muito. Entrega na hora.', 'a'),
(3, 31, 5, 'Muito bom! O melhor.', 'a'),
(5, 30, 0, 'PÃ©ssimo, nunca entrega na hora.', 'd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idEmprestimo` int(11) DEFAULT NULL,
  `conteudo` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idUsuario`, `idEmprestimo`, `conteudo`, `data`) VALUES
(9, 31, 32, 'Estarei no local combinado Ã s 14:00!', '2019-10-18 02:39:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `idEmprestimo` int(11) NOT NULL,
  `idProposta` int(11) NOT NULL,
  `idUsuarioA` int(11) DEFAULT NULL,
  `idUsuarioB` int(11) DEFAULT NULL,
  `dataEmprestimo` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`idEmprestimo`, `idProposta`, `idUsuarioA`, `idUsuarioB`, `dataEmprestimo`, `status`) VALUES
(32, 13, 8, 31, '2019-10-18', 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `idLivro` int(11) NOT NULL,
  `titulo` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `autor` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `sinopse` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`idLivro`, `titulo`, `autor`, `sinopse`, `foto`) VALUES
(1, 'A Hora da Estrela', 'Clarice Lispector', 'A Hora da Estrela Ã© um romance literÃ¡rio da escritora brasileira Clarice Lispector. O romance narra a histÃ³ria da datilÃ³grafa alagoana, MacabÃ©a, que migra para o Rio de Janeiro, tendo sua rotina narrada por um escritor fictÃ­cio chamado Rodrigo S.M.', NULL),
(2, 'Harry Potter e o Enigma do Principe', 'J.K. Rowling', 'No sexto ano de Harry em Hogwarts, Lord Voldemort e seus Comensais da Morte estÃ£o criando o terror nos mundos bruxo e trouxa. Dumbledore convence seu velho amigo HorÃ¡cio Slughorn para retornar a Hogwarts como professor de poÃ§Ãµes apÃ³s Harry encontrar um estranho livro escolar.', 'C:\\xampp\\htdocs\\meusprog\\TCC - meLivra\\Imagens\\HarryPotter.jpg'),
(3, '', '', '', ''),
(6, 'O Senhor dos AnÃ©is', 'J.R.R. Tolkien', 'Este volume estÃ¡ composto pela primeira (A Sociedade do Anel), segunda (As Duas Torres) e terceira parte (O Retorno do Rei) da grande obra de ficÃ§Ã£o fantÃ¡stica de J. R. R. Tolkien, O Senhor dos AnÃ©is. Ã‰ impossÃ­vel transmitir ao novo leitor todas as qualidades e o alcance do livro. Alternadamente cÃ´mica, singela, Ã©pica, monstruosa e diabÃ³lica, a narrativa desenvolve-se em meio a inÃºmeras mudanÃ§as de cenÃ¡rios e de personagens, num mundo imaginÃ¡rio absolutamente convincente em seus detalhes. Nas palavras do romancista Richard Hughes, \"quanto Ã  amplitude imaginativa, a obra praticamente nÃ£o tem paralelos e Ã© quase igualmente notÃ¡vel na sua vividez e na habilidade narrativa, que mantÃªm o leitor preso pÃ¡gina apÃ³s pÃ¡gina\". Tolkien criou em O Senhor dos AnÃ©is uma nova mitologia num mundo inventado que demonstrou possuir um poder de atraÃ§Ã£o atemporal.', 'http://books.google.com/books/content?id=kNBJDwAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),
(7, 'Violetas na janela', 'Vera LÃºcia Marinzeck de Carvalho', 'Com uma linguagem cativante, PatrÃ­cia conta como foi seu desencarne, aos 19 anos, e como Ã© a vida no plano espiritual - como Ã© a alimentaÃ§Ã£o, a vestimenta e a sensaÃ§Ã£o que teve ao rever a famÃ­lia.', 'http://books.google.com/books/content?id=cTFosRP-ls4C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(8, 'Cu(In1-xGax)Se2 Based Thin Film Solar Cells', 'Subba Ramaiah Kodigala', 'Cu(In1-xGax)Se2 Based Thin Film Solar Cells provides valuable contents about the fabrication and characterization of chalcopyrite Cu(In1-xGax)Se2 based thin film solar cells and modules. The growth of chalcopyrite Cu(In1-xGax)(S1-ySey)2 absorbers, buffers, window layers, antireflection coatings, and finally metallic grids, which are the sole components of solar cells, is clearly illustrated. The absorber, which contains multiple elements, segregates secondary phases if the growth conditions are not well optimized i.e., the main drawback in the fabrication of solar cells. More importantly the solutions for the growth of thin films are given in detail. The properties of all the individual layers and single crystals including solar cells analyzed by different characterization techniques such as SEM, AFM, XPS, AES, TEM, XRD, optical, photoluminescence, and Raman spectroscopy are explicitly demonstrated. The electrical analyses such as conductivities, Hall mobilities, deep level transient spectroscopy measurements etc., provide a broad picture to understand thin films or single crystals and their solar cells. The book clearly explains the working principle of energy conversion from solar to electrical with basic sciences for the chalcopyrite based thin film solar cells. Also, it demonstrates important criteria on how to enhance efficiency of the solar cells and modules. The effect of environmental factors such as temperature, humidity, aging etc., on the devices is mentioned by citing several examples. Illustrates a number of growth techniques to prepare thin film layers for solar cells Discusses characterization techniques such as XRD, TEM, XPS, AFM, SEM, PL, CL, Optical measurements, and Electrical measurements Includes I-V, C-V measurements illustrations Provides analysis of solar cell efficiency Presents current trends in thin film solar cells research and marketing', 'http://books.google.com/books/content?id=FgIOdpQfyDUC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(9, 'A arte de pedir', 'Amanda Palmer', 'Cantora e compositora, Ã­cone indie, feminista, mulher de Neil Gaiman, agitadora e mobilizadora de multidÃµes online: Amanda Palmer Ã© um retrato perfeito da boa conexÃ£o entre o artista e seu pÃºblico. ApÃ³s desligar-se de sua gravadora, Amanda recorreu ao entÃ£o recÃ©m-lanÃ§ado Kickstarter, site de financiamento coletivo, para conclamar os fÃ£s a colaborar financeiramente para a produÃ§Ã£o do prÃ³ximo Ã¡lbum de sua banda. O projeto arrecadou mais de 1 milhÃ£o de dÃ³lares, recorde que chamou atenÃ§Ã£o tanto da imprensa como da indÃºstria fonogrÃ¡fica. Desse episÃ³dio surgiu o convite para uma celebrada palestra nos TED Talks. O tema: saber pedir. Desdobramento inevitÃ¡vel da palestra homÃ´nima, o livro A arte de pedir trata essencialmente de recorrer ao outro, sem temor, sem vergonha e sem reservas. Por que nÃ£o pedimos ajuda, dinheiro, amor, com a mesma naturalidade com que pedimos uma cadeira vazia num restaurante ou uma caneta, na rua, para fazer uma anotaÃ§Ã£o? Pedir Ã© digno e necessÃ¡rio, e Ã© a conexÃ£o entre quem dÃ¡ e quem recebe que enriquece a vida humana, defende Amanda. Longe de ser um manual sobre como pedir, o livro Ã© uma provocaÃ§Ã£o bem-vinda e urgente, que incita o leitor a superar seus medos e admitir o valor de precisar e doar ajuda, sempre.', 'http://books.google.com/books/content?id=3iOVBgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(10, 'Eu sou a lenda', 'Richard Matheson', 'Uma impiedosa praga assola o mundo, transformando cada homem, mulher e crianÃ§a do planeta em algo digno dos pesadelos mais sombrios. Nesse cenÃ¡rio pÃ³s-apocalÃ­ptico, tomado por criaturas da noite sedentas de sangue, Robert Neville pode ser o Ãºltimo homem na Terra. Ele passa seus dias em busca de comida e suprimentos, lutando para manter-se vivo (e sÃ£o). Mas os infectados espreitam pelas sombras, observando atÃ© o menor de seus movimentos, Ã  espera de qualquer passo em falso... Eu sou a lenda, Ã© considerado um dos maiores clÃ¡ssicos do horror e da ficÃ§Ã£o cientÃ­fica, tendo sido adaptado para o cinema trÃªs vezes.', 'http://books.google.com/books/content?id=3BWzDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(11, 'O Hobbit', 'J.R.R. Tolkien', 'Bilbo Bolseiro Ã© um hobbit que leva uma vida confortÃ¡vel e sem ambiÃ§Ãµes. Mas seu contentamento Ã© perturbado quando Gandalf, o mago, e uma companhia de anÃµes batem Ã  sua porta e levam-no para uma expediÃ§Ã£o. Eles tÃªm um plano para roubar o tesouro guardado por Smaug, o MagnÃ­fico, um grande e perigoso dragÃ£o. Bilbo reluta muito em participar da aventura, mas acaba surpreendendo atÃ© a si mesmo com sua esperteza e sua habilidade como ladrÃ£o!', 'http://books.google.com/books/content?id=KRUArHCWwIQC&printsec=frontcover&img=1&zoom=1&source=gbs_api'),
(12, 'Coringa O PalhaÃ§o Do Crime', 'Henrique', 'Esta obra mostra uma versÃ£o sobre o passado e o que ocasionou uma das mentes mais descontroladas e perversas do mundo dos quadrinhos. Coringa estÃ¡ retratado em seu mais alto grau de psicose e agressividade. A obra se passa pouco tempo apÃ³s os acontecimentos de A Piada Mortal . Coringa escapou novamente do Asilo Arkham e quer dominar nÃ£o sÃ³ Gotham City, mas tambÃ©m o mundo. SÃ³ que para isso nÃ£o bastarÃ¡ derrotar Batman e outros herÃ³is da Liga da JustiÃ§a. Coringa terÃ¡ que enfrentar seu passado e sua prÃ³pria loucura. Eu era outra pessoa uma vez, em seguida, mergulhei em um tanque de produtos quÃ­micos e virei o Coringa. E o cara que eu deveria ser, nem mesmo nos obituÃ¡rios apareceu. Eu mudo a forma de perceber a mim mesmo todos os dias da semana. Isso mantÃ©m a minha vida interessante. Porque eu iria querer ser apenas ser o mesmo cara chato todos os dias? Isso Ã© loucura.', 'http://books.google.com/books/content?id=TtZxDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(13, 'Londres', 'Airton Ortiz', 'Famosa por sua neblina, seus Ã´nibus double-decker e suas estilosas cabines telefÃ´nicas, Londres Ã© um berÃ§o cultural como nenhum outro. Na capital inglesa, por exemplo, Ã© possÃ­vel visitar o Shakespeare Globe, reproduÃ§Ã£o do famoso teatro onde eram encenadas as peÃ§as de William Shakespeare ? o autor inglÃªs chegou a ser sÃ³cio da versÃ£o original do teatro, que pegou fogo em 1613. AlÃ©m de museus. Muitos museus. Museum of London, National Gallery, Tate Modern... Isso sÃ³ para citar alguns. As igrejas da cidade tambÃ©m sÃ£o um caso Ã  parte. AlÃ©m das famosas St. Paul Cathedral ? onde Charles e Diana se casaram, em 1981 ?, Temple Church e Abadia de Westminster (onde estÃ£o enterrados o naturista britÃ¢nico Charles Darwin e o fÃ­sico Isaac Newton), vocÃª verÃ¡ aqui igrejas que nÃ£o estÃ£o no roteiro da maioria dos turistas que visitam a cidade, como a St. Olave?s Church, na City, que sobreviveu ao grande incÃªndio que consumiu a cidade em 1666 e era chamada por Charles Dickens de St. Ghastly Church ? algo como igreja da grande carranca ?, e a St. Giles?s Bowl, onde os prisioneiros do governo inglÃªs eram enterrados apÃ³s serem decapitados. Na Torre de Londres, que apesar do nome nÃ£o Ã© uma torre, e sim um castelo, estÃ¡ grande parte da histÃ³ria ? e segredos ? da monarquia britÃ¢nica. Marcado por prisÃµes e execuÃ§Ãµes, este grande sÃ­mbolo da Inglaterra foi palco de um grande mistÃ©rio: o rei Eduardo V, entÃ£o com 12 anos, foi encarcerado no local por ordem do tio, Ricardo III, e ninguÃ©m nunca mais teve notÃ­cias do jovem monarca. Quem sabe ele ainda nÃ£o estejavagando pelos prÃ©dios da Torre de Londres? E, para se refrescar depois de tanto andar pela cidade, nada melhor do que uma cervejinha em um de seus milhares de pubs. Embarque nesta leitura e descubra onde tomar as melhores cervejas de Londres e onde comer o melhor fish chips, o prato mais tradicional da capital inglesa.', 'http://books.google.com/books/content?id=tdRiDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(14, 'Box Percy Jackson e os Olimpianos', 'Rick Riordan', 'O Box reÃºne os cinco livros da sÃ©rie.', 'http://books.google.com/books/content?id=mZbeJ2dkKX0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(15, 'A bola no ar', 'Edileuza Soares', 'O rÃ¡dio esportivo foi essencial para a transformaÃ§Ã£o do futebol em esporte popular e um importante complemento na definiÃ§Ã£o do rÃ¡dio como meio de comunicaÃ§Ã£o de massa. A partir das primeiras narraÃ§Ãµes de jogos de futebol e de entrevistas com veteranos radialistas, a autora nos traz a histÃ³ria do rÃ¡dio esportivo. De forma criativa e original, ela analisa os diversos estilos de narraÃ§Ã£o e sua evoluÃ§Ã£o atÃ© os tempos atuais, desde o primeiro locutor atÃ© os astros do momento no radialismo esportivo. Nesse estudo pioneiro, a autora demonstra que o rÃ¡dio continua um instrumento de comunicaÃ§Ã£o vibrante.', 'http://books.google.com/books/content?id=WCgpyBBBBfIC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(16, 'A Culpa Ã© das Estrelas', 'John Green', 'Apesar do milagre da medicina que fez diminuir o tumor que a atacara hÃ¡ alguns anos, Hazel nunca tinha conhecido outra situaÃ§Ã£o que nÃ£o a de doente terminal, sendo o capÃ­tulo final da sua vida parte integrante do seu diagnÃ³stico. Mas com a chegada repentina ao Grupo de Apoio dos MiÃºdos com Cancro de uma atraente reviravolta de seu nome Augustus Waters, a histÃ³ria de Hazel vÃª-se agora prestes a ser completamente rescrita.Perspicaz, arrojado, irreverente e cru, A Culpa Ã© das Estrelas Ã© a obra mais ambiciosa e comovente que o premiado autor John Green nos apresentou atÃ© hoje, explorando de maneira brilhante a aventura divertida, empolgante e trÃ¡gica que Ã© estar-se vivo e apaixonado.John Green Ã© autor de vÃ¡rios bestsellers do The New York Times. Recebeu o Michael L. Printz Award e o Edgar Award. Foi por duas vezes finalista do L. A. Times Book Prize. Os seus livros foram traduzidos em mais de vinte lÃ­nguas. John Ã© tambÃ©m o co-criador, com o seu irmÃ£o Hank, do vlogbrothers, uma sÃ©rie de vÃ­deos on-line que jÃ¡ foram visionados mais de 200 milhÃµes de vezes.\"John Green nÃ£o Ã© apenas um autor. Ã‰ uma vedeta da multimÃ©dia que se apresenta perante auditÃ³rios de mil lugares de fÃ£s aos gritos.\" Los Angeles Times', 'http://books.google.com/books/content?id=0Ce7HDOnNFMC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(24, 'O Bairro da Estrela Polar', 'FRANCISCO MOITA FLORES', 'Diana nasceu no bairro da Estrela Polar. Algures em Lisboa. Um daqueles bairros cercado por estradas com muito movimento, isolado da cidade, voltado sobre si, feito de gente que veio de todos os lados do mundo. No Estrela Polar existe o cafÃ© Futuro de Portugal, dirigido pelo BazÃ³fias, carteirista reformado, burlÃ£o de grandes talentos. Ã‰ aqui que se reÃºne a quadrilha agora encabeÃ§ada por Diana, lÃ­der conhecida como a Â«Robin dos BosquesÂ», que rouba aos ricos para dar aos pobres. Comandados pela bela Diana, Tosta Mista, ZÃ© Cigano, Francisquinho, Batman, Clara, Manela e Paulo monopolizam o trÃ¡fico de droga no bairro, deixando a polÃ­cia sempre desorientada, e organizam-no para que o crime seja actividade rentÃ¡vel para sair da crise. Quanto mais nÃ£o seja para financiar a organizaÃ§Ã£o do arraial de recolha de fundos para a construÃ§Ã£o do centro social da igreja do bairro. Diana dirige assaltos e operaÃ§Ãµes perigosas mas nÃ£o Ã© assassina. Mas a raiva que habita no seu coraÃ§Ã£o contra os homens que destruÃ­ram o pai, tem cada um deles uma bala Ã  espera. Ã‰ essa a sua obsessÃ£o. Uma histÃ³ria dos nossos dias, que consegue cruzar a violÃªncia com o humor, a ternura e a uniÃ£o de personagens pÃ­caras do submundo do Portugal do sÃ©culo XXI.', 'http://books.google.com/books/content?id=_JzQK9vZ2fwC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(26, 'O JapÃ£o. Estudos e impressÃµes de viagem', 'Pedro GastÃ£o Mesnier', 'NÃ£o definido', 'http://books.google.com/books/content?id=dmkhWbUcO2oC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(27, 'A Hora Ã© Essa!', 'Kim Kiyosaki', 'Convenhamos que quando se trata de dinheiro, homens e mulheres sÃ£o diferentes. HÃ¡ questÃµes Ãºnicas que as mulheres enfrentam com relaÃ§Ã£o ao dinheiro e aos investimentos. Este best-seller de Kim Kiyosaki foca nas forÃ§as e oportunidades que as mulheres tÃªm no mundo do dinheiro hoje. Conhecida internacionalmente como palestrante, escritora, empreendedora e investidora do mercado imobiliÃ¡rio, Kim Kiyosaki sabe o que Ã© necessÃ¡rio para ser uma mulher bem-sucedida e financeiramente independente. E Ã© exatamente sobre isso que se trata esse livro! Agora Ã© o momento de as mulheres passarem a ser mais inteligentes com seu dinheiro. A paixÃ£o de Kim Ã© educar e incentivar as mulheres a criarem seguranÃ§a financeira e a ter paz de espÃ­rito. Comece sua jornada rumo Ã  independÃªncia financeira hoje! \"Este livro deveria ser lido por todas as mulheres. Hoje, mais do que nunca, as mulheres precisam ser financeiramente inteligentes.\" â€“ Donald Trump', 'http://books.google.com/books/content?id=zB-WDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(28, 'Veja Rio', '', 'NÃ£o definido', 'http://books.google.com/books/content?id=fidPAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),
(30, 'Apenas por nome', 'Ellen Gable', 'FiladÃ©lfia, 1876, A vida de Caroline Martin finalmente parece ter melhorado. Depois de anos de trabalho duro, ela conheceu um homem rico e virtuoso cujo amor parece trazer junto o tipo de vida que existe apenas nos livros que ela possui em sua mesa de cabeceira. Uma tragÃ©dia, porÃ©m, irÃ¡ ensinar Caroline sobre a complexidade com que o prÃ³prio Deus cria as vidas daqueles que se voltam para ele. Vencedor da medalha de ouro em FicÃ§Ã£o Religiosa do prÃªmio IPPY 2010. Amazon Kindle Bestseller.', 'http://books.google.com/books/content?id=IkSlDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(31, 'O MedalhÃ£o Secreto !', 'Maria Helena Guedes', 'O MedalhÃ£o secreto, o medalhÃ£o secreto Ã© uma sÃ©rie de livros de ficÃ§Ã£o criada por L. J. Smith. A sÃ©rie gira em torno de doze bruxos adolescentes que formam um cÃ­rculo de magia que fica conhecido como O CÃ­rculo Secreto .', 'http://books.google.com/books/content?id=Y7V5DwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(32, 'Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 'Harry Potter Ã© um garoto cujos pais, feiticeiros, foram assassinados por um poderosÃ­ssimo bruxo quando ele ainda era um bebÃª. Ele foi levado, entÃ£o, para a casa dos tios que nada tinham a ver com o sobrenatural. No dia de seu aniversÃ¡rio de 11 anos, Harry descobre sua verdadeira histÃ³ria e seu destino: ser um aprendiz de feiticeiro atÃ© o dia em que terÃ¡ que enfrentar a pior forÃ§a do mal, o homem que assassinou seus pais. Potter fica sabendo que Ã© a Ãºnica pessoa a ter sobrevivido a um ataque do tal bruxo do mal e essa Ã© a causa da marca em forma de raio que ele carrega na testa. Ele nÃ£o Ã© um garoto qualquer, ele sequer Ã© um feiticeiro qualquer; ele Ã© Harry Potter, sÃ­mbolo de poder, resistÃªncia e um lÃ­der natural entre os sobrenaturais.', 'http://books.google.com/books/content?id=GjgQCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(33, 'GestÃ£o do AmanhÃ£', '', 'NÃ£o existe outro momento mais vibrante na histÃ³ria recente da humanidade. Um ambiente repleto de desafios reserva oportunidades atÃ© entÃ£o nÃ£o mapeadas. O mundo estÃ¡ em aberto. A vida estÃ¡ em aberto. O que fez empresas como Netflix, Airbnb e Uber assumirem o lugar de companhias e modelos de negÃ³cios aparentemente consagrados e indestrutÃ­veis? O que nos reserva o futuro? Embora muito se tenha falado sobre esses novos players do mercado, ainda hÃ¡ inÃºmeras dÃºvidas sobre como serÃ¡ o futuro do mundo corporativo, com seus diversos modelos de empresas e negÃ³cios, muitos dos quais ainda se consideram inabalÃ¡veis. O fato, porÃ©m, Ã© que, diariamente, o mundo passa por mudanÃ§as em todas as Ã¡reas. Hoje coabitam, no mesmo momento, o novo â€“ representado pelas novas tecnologias, inovaÃ§Ãµes e rupturas â€“ com o clÃ¡ssico, o tradicional, forjado ao longo de sÃ©culos de convivÃªncia e desenvolvimento humano. Essa nova Era Ã© conhecida como a 4a RevoluÃ§Ã£o Industrial, a mais abrangente, profunda e ampla da histÃ³ria. Ã‰ a Ãºnica que harmoniza descobertas transformadoras integrando, pela primeira vez, o mundo fÃ­sico, digital e biolÃ³gico em um mesmo ambiente. Com essas mudanÃ§as, o modelo de gestÃ£o tambÃ©m precisa mudar: os modelos corporativos, os lÃ­deres, os mecanismos de educaÃ§Ã£o etc. Sandro Magaldi e JosÃ© Salibi Neto trazem nesta obra um panorama completo dos modelos de gestÃ£o ao decorrer da histÃ³ria e qual deve ser o modelo nesse novo momento no qual estamos vivendo. Em um texto abrangente e ao mesmo tempo simples, eles apresentam tudo o que vocÃª precisa saber para nÃ£o ser derrubado por nÃ£o se adaptar ao novo.', 'http://books.google.com/books/content?id=kcZQDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(34, 'melhor de Peter Drucker: homem, sociedade, adminis', 'Peter Drucker', 'Este livro traz ao leitor brasileiro uma compilaÃ§Ã£o da essÃªncia do pensamento de Peter Drucker. A obra Ã© dividida em trÃªs partes. A primeira fala do homem - status, funÃ§Ã£o, dignidade dos indivÃ­duos que sempre foram a preocupaÃ§Ã£o de Drucker. A segunda enfoca a administraÃ§Ã£o - quais sÃ£o os fundamentos e as principais responsabilidades da administraÃ§Ã£o. A terceira e Ãºltima parte estuda as raÃ­zes da nova sociedade - as tendÃªncias histÃ³ricas do sÃ©culo XX, que fundamentaram seu surgimento e as forÃ§as que as moldaram.', 'http://books.google.com/books/content?id=ClAZfIUn7kcC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(35, 'melhor de Peter Drucker: homem, sociedade, adminis', 'Peter Drucker', 'Este livro traz ao leitor brasileiro uma compilaÃ§Ã£o da essÃªncia do pensamento de Peter Drucker. A obra Ã© dividida em trÃªs partes. A primeira fala do homem - status, funÃ§Ã£o, dignidade dos indivÃ­duos que sempre foram a preocupaÃ§Ã£o de Drucker. A segunda enfoca a administraÃ§Ã£o - quais sÃ£o os fundamentos e as principais responsabilidades da administraÃ§Ã£o. A terceira e Ãºltima parte estuda as raÃ­zes da nova sociedade - as tendÃªncias histÃ³ricas do sÃ©culo XX, que fundamentaram seu surgimento e as forÃ§as que as moldaram.', 'http://books.google.com/books/content?id=ClAZfIUn7kcC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(36, 'Peter Pan', 'Monteiro Lobato', 'Depois de o Gato FÃ©lix afirmar, em â€œReinaÃ§Ãµes de Narizinhoâ€, que o palhaÃ§o que havia desaparecido fora raptado por Peter Pan, todos ficaram na dÃºvida de quem seria esse menino. NinguÃ©m sabia. Nem Dona Benta, que tratou de encomendar um livro chamado â€œPeter Pan and Wendyâ€, do inglÃªs J. M. Barrie, em uma livraria de SÃ£o Paulo para descobrir de quem se tratava. A famosa histÃ³ria do â€œmenino que nÃ£o queria crescerâ€ Ã© contada aqui por Dona Benta para turma do SÃ­tio do Picapau Amarelo. Enquanto todos ouvem a histÃ³ria, a sombra da Tia NastÃ¡cia comeÃ§a a desaparecer, do mesmo jeito que acontece no livro. Agora, alÃ©m de conhecer todas as aventuras vividas por Peter Pan, a Turma tambÃ©m quer encontrar o autor do desaparecimento da sombra da cozinheira do SÃ­tio. Este livro Ã© um dos clÃ¡ssicos da literatura infantil que Lobato adaptou para o universo do SÃ­tio do Picapau Amarelo. Nesta coleÃ§Ã£o, cada volume das adaptaÃ§Ãµes dos clÃ¡ssicos Ã© ilustrado por um artista diferente que apresenta a sua interpretaÃ§Ã£o dos personagens. â€œPeter Panâ€ foi ilustrado por Fabiana SalomÃ£o, uma paulista que Ã© fÃ£ das aventuras lobatianas e hÃ¡ 14 anos ilustra livros infantis.', 'http://books.google.com/books/content?id=WkoG03CgxzcC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(37, 'A hora da estrela', 'Clarice Lispector', 'Ãšltimo livro escrito por Clarice Lispector, A hora da estrela Ã© tambÃ©m uma despedida. LanÃ§ada pouco antes de sua morte em 1977, a obra conta os momentos de criaÃ§Ã£o do escritor Rodrigo S. M. (a prÃ³pria Clarice) narrando a histÃ³ria de MacabÃ©a, uma alagoana Ã³rfÃ£, virgem e solitÃ¡ria, criada por uma tia tirana, que a leva para o Rio de Janeiro, onde trabalha como datilÃ³grafa. Em A hora da estrela Clarice escreve sabendo que a morte estÃ¡ prÃ³xima e pÃµe um pouco de si nas personagens Rodrigo e MacabÃ©a. Ele, um escritor Ã  espera da morte; ela, uma solitÃ¡ria que gosta de ouvir a RÃ¡dio RelÃ³gio e que passou a infÃ¢ncia no Nordeste, como Clarice. A despedida de Clarice Ã© uma obra instigante e inovadora. Como diz o personagem Rodrigo, \"estou escrevendo na hora mesma em que sou lido\". Ã‰ Clarice contando uma histÃ³ria e, ao mesmo tempo, revelando ao leitor seu processo de criaÃ§Ã£o e sua angÃºstia diante da vida e da morte. MacabÃ©a, a nordestina, cumpre seu destino sem reclamar. Feia, magra, sem entender muito bem o que se passa Ã  sua volta, Ã© maltratada pelo namorado OlÃ­mpico e pela colega GlÃ³ria. Os dois sÃ£o o seu oposto: o metalÃºrgico OlÃ­mpico sonha alto e quer ser deputado, e GlÃ³ria, carioca da gema e gorda, tem famÃ­lia e hora certa para comer. Os dois acabam juntos, enquanto MacabÃ©a, sozinha, continua a viver sem saber por que estÃ¡ vivendo, sem pensar no futuro nem sonhar com uma vida melhor. AtÃ© que um dia, seguindo uma recomendaÃ§Ã£o de GlÃ³ria, procura a cartomante Carlota, uma ex-prostituta do Mangue, que revela a MacabÃ©a toda a inutilidade de sua vida. Mas tambÃ©m enche-a de esperanÃ§a, prevendo a paixÃ£o por um estrangeiro rico, com quem ela iria se casar.', 'http://books.google.com/books/content?id=LRC4DjSE4ucC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(38, 'Dom Casmurro', 'Machado de Assis', 'A histÃ³ria se passa no Rio de Janeiro do Segundo ImpÃ©rio e conta a trajetÃ³ria de Bentinho e Capitu. A dÃºvida quanto Ã  traiÃ§Ã£o da mulher amada, Capitu, Ã© o motor do grande clÃ¡ssico de Machado de Assis. Trata-se de um romance narrado em primeira pessoa por Bentinho, o que permite manter questÃµes sem elucidaÃ§Ã£o atÃ© o final, jÃ¡ que a histÃ³ria conta apenas com a perspectiva subjetiva de Bentinho. O romance Dom Casmurro, alÃ©m de estar entre as grandes obras da literatura brasileira, Ã© considerado a obra-prima de Machado de Assis. Neste volume, o professor Ricardo LeÃ£o faz comentÃ¡rios e notas acerca da estrutura literÃ¡ria, polÃ­tica e costumes, alÃ©m de um glossÃ¡rio. As ilustraÃ§Ãµes sÃ£o de Eduardo Burato. Um livro indicado para estudantes e aqueles que desejam conhecer mais profundamente a obra do bruxo do Cosme Velho. Esta ediÃ§Ã£o traz comentÃ¡rios de estilo, de vocabulÃ¡rio, alÃ©m de um Ã­ndice cronolÃ³gico importante na compreensÃ£o do tempo no qual se situa a histÃ³ria. Traz apresentaÃ§Ã£o e posfÃ¡cio fundamentais Ã  compreensÃ£o da obra. Ã‰ tambÃ©m ilustrado. O texto foi consolidado com ediÃ§Ãµes originais. Integra a ColeÃ§Ã£o ClÃ¡ssicos Lazuli.', 'http://books.google.com/books/content?id=jgYkDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `idPostagem` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idLivro` int(11) DEFAULT NULL,
  `local` varchar(1000) DEFAULT NULL,
  `dt_entrega` date DEFAULT NULL,
  `estadoLivro` varchar(50) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`idPostagem`, `idUsuario`, `idLivro`, `local`, `dt_entrega`, `estadoLivro`, `tipo`) VALUES
(45, 31, 7, 'ParkShopping Canoas - Avenida Farroupilha - Marechal Rondon, Canoas - RS, Brasil', NULL, 'Perfeito estado', 'a'),
(47, 15, 9, NULL, '2019-10-25', NULL, 'b'),
(48, 15, 10, 'ParkShopping Canoas - Avenida Farroupilha - Marechal Rondon, Canoas - RS, Brasil', NULL, 'Perfeito estado', 'c'),
(49, 15, 8, 'IFRS - Campus Canoas - Rua Doutora Maria ZÃ©lia Carneiro de Figueiredo - Igara, Canoas - RS, Brasil', NULL, 'Danificado', 'a'),
(50, 8, 11, 'ParkShopping Canoas - Avenida Farroupilha - Marechal Rondon, Canoas - RS, Brasil', NULL, 'Perfeito estado', 'a'),
(51, 8, 12, 'Gotham Comedy Club, West 23rd Street, Nova Iorque, NY, EUA', NULL, 'Danificado', 'a'),
(55, 8, 16, 'ParkShopping Canoas - Avenida Farroupilha - Marechal Rondon, Canoas - RS, Brasil', NULL, 'Levemente danificado', 'c'),
(74, 15, 37, 'IFRS - Campus Canoas - Rua Doutora Maria ZÃ©lia Carneiro de Figueiredo - Igara, Canoas - RS, Brasil', NULL, 'Levemente danificado', 'a'),
(75, 15, 38, NULL, '2019-10-24', NULL, 'b'),
(76, 31, 11, 'ParkShopping Canoas - Avenida Farroupilha - Marechal Rondon, Canoas - RS, Brasil', NULL, 'Danificado', 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `proposta`
--

CREATE TABLE `proposta` (
  `idProposta` int(11) NOT NULL,
  `idPostagem` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `estadoLivro` varchar(50) DEFAULT NULL,
  `dataEntregaInicial` date DEFAULT NULL,
  `local` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `proposta`
--

INSERT INTO `proposta` (`idProposta`, `idPostagem`, `idUsuario`, `estadoLivro`, `dataEntregaInicial`, `local`) VALUES
(13, 55, 31, 'Levemente danificado', '2019-10-24', 'ParkShopping Canoas - Avenida Farroupilha - Marechal Rondon, Canoas - RS, Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(16) DEFAULT NULL,
  `sobrenome` varchar(20) NOT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `admin` char(1) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `nota` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `sobrenome`, `senha`, `email`, `admin`, `imagem`, `celular`, `nota`) VALUES
(8, 'Gabriel', '', '$2y$10$rN3xuojEcItnMXf.iKu5pOtfaE0.ImxcYre9gIqHui1vN/3heQ2D6', 'gabe.stoll11@gmail.com', NULL, 'deuszordi icone.png', 0, NULL),
(14, 'Augustinho', '', '$2y$10$deb4U.Cng6d8VPJHwkq1pOnwOdbZc.DdlPOcrv08tJ1M/AUF7gypW', 'augustinho@gmail.com', NULL, 'agostinho.jpg', 0, NULL),
(15, 'JoÃ£o', 'Dezordi', '$2y$10$3dzfrer3AIyDqnjMmZ.LeOaAzL3BVOqkjZvxZWB5sLY276waeSh6i', 'jp.dezordi@gmail.com', NULL, 'trapala extra - moeda.png', 123456789, NULL),
(28, 'teste1', '', '$2y$10$0uqkmRJTKibKFXcN7ZB9jun3qw3hOwbE0GVV94fGoo7.pOao5tD3C', 'teste@a.com', NULL, 'trapala extra - estrela 2.png', 0, NULL),
(29, 'test2', '', '$2y$10$H/EosfTOy2SDc8vmbjiujuC6Plwejb7jSbte2S/svv.QBD.DRNDeC', 'teste2@a.com', NULL, 'capa deuszordi.png', 0, NULL),
(30, 'teste3', '', '$2y$10$o0bNNTYXa67k6PvxTb0M4OKcBL3xcavtp2YbO3CXjsGplaWEGIuUe', 'teste3@a.com', NULL, 'trapala extra - estrela 2.png', 0, NULL),
(31, 'teste4', '', '$2y$10$nPq2FcO3S3hSAjsoNkXHGud503Whnv5MxoAy3l4qA.keb3ZJuuYdi', 'teste4@gmai.com', NULL, 'capa deuszordi.png', 0, NULL),
(32, 'teste5', '', '$2y$10$GyzO3OjhYVkix4q5DcXSGe.O0P7XFpI2TDJQnNGz8NHdxQrcypu3G', 'tst@gmaoi.com', NULL, 'capa deuszordi.png', 0, NULL),
(33, 'Beatriz', 'Verch', '$2y$10$ZNgC9uACh0Bhg6HmA71d0uWjwQpMl7v6Gca/ia8R/nAGljJQD3vw.', 'beaverch@gmail.com', NULL, 'IMG-20161018-WA0014.jpg', 0, NULL),
(34, 'Douglas', 'Lima', '$2y$10$kdrHyx3v5DDFWdY4e0DaquLIEtPHriqwPVeNCS3uKLS1g3nPTPZR6', 'douglas@gmail.com', NULL, '12002054_1010795205639376_458321092174806977_n.jpg', 0, NULL),
(35, 'admin', '', '$2y$10$loCDgjtPHBE/SxOvWuLPM.tesObW5VCM4QL7UEHN/FOL9kaGz1F5S', 'admin@admin.com', NULL, '', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `fkAvaliacao_idx` (`idUsuario`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `fkComentario_idx` (`idUsuario`),
  ADD KEY `fkComentario2_idx` (`idEmprestimo`);

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`idEmprestimo`),
  ADD KEY `fkEmprestimo1_idx` (`idUsuarioA`),
  ADD KEY `fkEmprestimo2_idx` (`idUsuarioB`),
  ADD KEY `idProposta` (`idProposta`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`idLivro`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`idPostagem`),
  ADD KEY `fkPostagem1_idx` (`idUsuario`),
  ADD KEY `fkPostagem2_idx` (`idLivro`);

--
-- Indexes for table `proposta`
--
ALTER TABLE `proposta`
  ADD PRIMARY KEY (`idProposta`),
  ADD KEY `fkProposta1_idx` (`idPostagem`),
  ADD KEY `fkProposta2_idx` (`idUsuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `idEmprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `idPostagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `proposta`
--
ALTER TABLE `proposta`
  MODIFY `idProposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fkAvaliacao` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fkComentario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkComentario2` FOREIGN KEY (`idEmprestimo`) REFERENCES `emprestimo` (`idEmprestimo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`idProposta`) REFERENCES `proposta` (`idProposta`),
  ADD CONSTRAINT `fkEmprestimo1` FOREIGN KEY (`idUsuarioA`) REFERENCES `postagem` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkEmprestimo2` FOREIGN KEY (`idUsuarioB`) REFERENCES `proposta` (`idUsuario`);

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `fkPostagem1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkPostagem2` FOREIGN KEY (`idLivro`) REFERENCES `livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `proposta`
--
ALTER TABLE `proposta`
  ADD CONSTRAINT `fkProposta1` FOREIGN KEY (`idPostagem`) REFERENCES `postagem` (`idPostagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkProposta2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

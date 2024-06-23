-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/06/2024 às 04:13
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbeducjogos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `artigos`
--

CREATE TABLE `artigos` (
  `id` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `data_publicacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artigos`
--

INSERT INTO `artigos` (`id`, `id_usuarios`, `titulo`, `imagem`, `conteudo`, `data_publicacao`) VALUES
(9, 1, 'Jogos feitos para deficientes visuais', '../img/imicast.jpg', 'Acessibilidade é tornar o mundo melhor para todos e quem disse que no mundo dos games não existe fórmulas de trabalhar a inclusão de deficientes visuais ao universo dos jogos virtuais? Recentemente, diversos produtores - principalmente aqueles que trabalham de forma independente - trabalham com a produção dos audiogames, jogos que se utilizam de recursos sonoros para determinarem ações e direções que o jogador deve tomar. Devido a sua característica de usar sons como principal forma de orientar o usuário, este tipo de game acaba se tornando acessível para pessoas que possuem algum tipo de deficiência visual e que, devido as suas limitações, eventualmente não conseguem ter uma boa experiência de jogabilidade em títulos tradicionais.\r\nCom a evolução dos jogos e novas formas de pensar na hora de oferecer produtos diferenciados ao mercado, a França se destacou ao divulgar o game “A Blind Legend” (Uma Lenda Cega), que foi lançado após uma campanha de arrecadação por crowdfunding que obteve 40 mil euros (cerca de R$ 120 mil) em doações. Com a possibilidade de rodar em computadores ou dispositivos móveis, o título foi elaborado para atender o público que apesar de possui alguma deficiência visual, gostaria de ser integrado ao mundo dos games. O fato mais curioso é que como era de se esperar, não apresenta nenhum gráfico. Para progredir neste título o jogador vai utilizar apenas sua a audição, compondo aos poucos o cenário imaginário do game.\r\nEntre jogos que simulam outros títulos famosos e outras produções totalmente inovadoras. Confira abaixo uma breve lista com cinco opções de audiogames:\r\n1. A Blind Legend\r\nNarrando a saga de um cavaleiro que perdeu a visão após ter sua mulher sequestrada, nesse jogo o desafio se torna atravessar ambientes repletos de perigos como uma floresta labiríntica e ameaçadora, por exemplo. Com um narrador que entra em certos momentos e controlando os movimentos do personagem por meio de toques na tela ou no mouse, você pode conduzir o cavaleiro Edward Blake encarnando a sua filha e pode até controlar uma espada, que funciona com movimentos bruscos correspondentes do jogador.\r\n2. Novos Olhos\r\nUm game produzido por brasileiros e que conta a história do personagem André, um garoto que foi congelado e só conseguiu acordar em um futuro distante. Precisando se adaptar à nova realidade, o jovem é controlado pelo jogador por meio de localizados nas extremidades da tela e instruções sonoras, que utilizam efeitos 3D para ajudar os jogadores a identificar onde está sua origem.\r\nO título foi produzido em 2016 e de acordo com o grupo que criou &quot;Novos Olhos&quot;, a inspiração surgiu após um episódio do programa &quot;The Noite&quot;, onde um menino cego derrotou sem grandes esforços o apresentador Danilo Gentilli em uma partida do game “Dragon Ball GT Final Bout”. O jogo foi feito para Android e poder encontrado na Internet para download direto.\r\n3. Super Mario Bros. Audio Edition\r\nSuper Mario é um dos maiores clássicos do mundos games e também ganhou uma versão em audiogame. Vale destacar que essa versão é quase uma cópia fiel do jogo da Nintendo e permite uma experiência incrível. O jogo segue a mesma ideia, forma de jogar e ainda conta com a mesma trilha sonora e efeitos.\r\nA versão para deficientes visuais de Super Mario Bros conta com uma infinidade de indicações sonoras que provavelmente confundirá os jogadores iniciantes, portanto é um jogo que precisa de uma certa paciência do jogador até que a jogabilidade se torna confortável. Para cada situação há um som, e para saber o que cada barulho significa, o título disponibiliza um guia de sons.\r\nAssim como a versão original, esta adaptação foi fiel ao mapa clássico.\r\n4. Pac-Man Talks\r\nUm audiogame inspirado em um dos jogos mais viciantes do mundo. Criado pela PCS Games, essa versão de Pac-Man continua com o objetivo igual ao da versão original: fugir dos fantasmas que perseguem o nosso herói e coletar o maior número de pontos possível e essas ações são possíveis por meio de um narrador que sinaliza os caminhos possíveis que estão a sua frente enquanto o som característico dos fantasmas aumentando indica que eles estão chegando.\r\n5. Slender: Lost Vision\r\nE o gênero terror não poderia ficar de fora, por isso trouxemos o &quot;Slender: Lost Vision&quot;, um audiogame inspirado na história do Slenderman. Desenvolvido pela DragonApps, o jogo acessível vai te dar muitos sustos, portanto, prepare o coração!\r\nNo game, você entra no papel de um jovem curioso que decide investigar estranhos casos de desaparecimentos e relatos de fenômenos paranormais. A ferramenta inseparável do personagem é um gravador que ele leva para uma floresta sombria a noite para descobrir o que está acontecendo.\r\nO objetivo principal em &quot;Slender: Lost Vision&quot; é coletar oito páginas de documentos que vão te ajudar a desvendar o mistério por trás de Slendeman, mas é preciso fugir constantemente do vilão enquanto você completa a missão, e tudo isso usando apenas a audição. A regulagem sonora do jogo é desregulada propositalmente, ou seja, o volume dos barulhos e sons do game vão fazer saltar da cadeira diversas vezes.', '2024-06-12 16:04:00'),
(10, 1, '+6 sites de jogos educativos', '../img/post-6sites.jpg', 'Conheça outros sites que disponibilizam jogos e outros conteúdos educativos além do nosso portal.\r\n1- Ludo Educativo\r\nUm “ensino ninja” é a meta desta turma. Eles querem que você aprenda sem notar que está praticando matérias consideradas “chatas”.  Tem jogos muito legais de ciências, matemática, ´português, inglês e muito mais!\r\n2- Escola Games\r\nÉ um site gratuito de jogos educativos para crianças a partir de 5 anos. Todos os jogos são desenvolvidos com acompanhamento pedagógico para aprender brincando. Há inúmeros jogos com temas de língua portuguesa, matemática, geografia, história, ciências, inglês e meio ambiente.\r\n3- Smart Kids\r\nAlém dos jogos, neste site há material de pesquisa e tudo é bem organizado. Há muitas informações selecionadas por datas comemorativas, o que pode ajudar muito na hora de aprender e estudar sobre temas como Dia do Soldado, Dia da Árvore, Dia do Índio etc.\r\n4- Nosso Clubinho\r\nSe você tem entre seis e oito anos de idade, vai encontrar muitos jogos interessantes por aqui, como este de português. O site tem muitas outras informações para além dos jogos, que podem inclusive te ajudar com o dever de casa.\r\n5- Nova Escola\r\nO site é dedicado aos professores, mas nada impede de você entrar lá e utilizar o material disponível.\r\n6- Discovery Kids\r\nNo site do Discovery Kids há muitos jogos. Nem todos são para aprendizagem, mas há alguns muito legais.', '2024-06-12 16:13:00'),
(11, 1, 'Importância dos JEDs', '../img/garotojogando.jpg', 'JEDs (Jogos Educativos Digitais) Pesquisas que abordam o uso de jogos na educação.\r\nExistem diversas pesquisas científicas que exploram o uso de jogos na educação e seus benefícios. De acordo com o artigo Uso de jogos didáticos no processo ensino-aprendizagem, os benefícios dos jogos didáticos incluem o estímulo à motivação, desenvolvimento de habilidades e aprimoramento do processo de ensino. O texto conclui enfatizando a importância dos jogos como ferramentas dinâmicas e eficazes no ensino-aprendizagem, proporcionando um ambiente harmonioso e divertido para o crescimento intelectual dos alunos e contribuindo para a formação de cidadãos críticos e reflexivos.\r\nJá a pesquisa Uso de jogos educacionais no processo de ensino e de aprendizagem explora a relevância e a integração dos jogos, especialmente os digitais, na educação. Reconhecendo que jogos sempre foram parte essencial da vida humana, especialmente na infância, a pesquisa argumenta que os jogos digitais são ferramentas valiosas no processo educativo. Eles oferecem motivação e desenvolvem persistência em crianças em idade escolar, tornando o aprendizado mais divertido e relevante.\r\nComo eles podem auxiliar no aprendizado?\r\nSe explorados a partir de objetivos pedagógicos definidos, os jogos e a gamificação podem apoiar de formas variadas o processo de ensino e aprendizagem.\r\nCom os jogos, é possível aprender na prática. Isso significa que a escola consegue criar oportunidades para seus estudantes colocarem a mão na massa. Aprender de forma dinâmica faz toda diferença!\r\nAlém disso, aplicar jogos na educação contribui para amplificar a participação, o engajamento das turmas e a capacidade de fazer perguntas. Que tal estimular o raciocínio lógico na escola por meio dos jogos educativos?\r\nGestor, esse caminho também ajuda a construir uma cultura de protagonismo e autonomia dentro da escola. Quando aplicado de forma planejada, um jogo educativo cria situações novas, que demandam pensamento crítico e decisões ágeis.\r\nAlém disso, a aplicação de jogos na educação pode criar um clima de leveza e de prazer em aprender. Pode também estimular o gosto pela leitura, pela pesquisa e por diferentes campos do conhecimento.\r\nÉ assim! Os estudantes aprendem brincando e sem o peso da obrigatoriedade.', '2024-06-12 16:20:00'),
(12, 1, 'Dicas para educadores', '../img/proftela.jpg', 'Os jogos pedagógicos podem fazer muita diferença na rotina da escola. Mas, para isso, é preciso uma boa mediação!\r\nGestor, veja a seguir algumas sugestões de práticas que vão apoiar a sua escola na aplicação de jogos na educação:\r\nValorizar a diversidade de jogos\r\nExiste uma grande diversidade de jogos, que podem ser tanto físicos como digitais. É um mundo bastante criativo! Para estimular o trabalho com jogos na escola, é importante conhecer diferentes tipos e formatos.\r\nPara essa pesquisa, vale considerar o repertório de educadores e gestores pedagógicos da escola, que podem contribuir com sugestões de jogos interdisciplinares ou indicados para cada campo do conhecimento.\r\nGestor, não esqueça de ouvir também estudantes de faixas etárias variadas. A opinião das crianças e dos adolescentes conta muito para que as escolhas sejam mais assertivas e encantadoras.\r\nSeleção de conteúdo\r\nPara garantir a segurança e o cuidado com o conteúdo, é importante realizar uma curadoria apurada, levando em consideração a idade e a qualidade do jogo que será disponibilizado na escola\r\nCom apoio do corpo docente, acompanhe esse universo e, se puder, valide e peça dicas também a consultores especializados.\r\nO trabalho com os jogos na educação pode ser muito significativo! Mas é preciso zelar pela qualidade dos jogos e pela exploração das suas potencialidades de forma inteligente e cuidadosa.\r\nIntencionalidade pedagógica\r\nE o que nunca deve ser esquecido ao aplicar jogos na educação: a intencionalidade pedagógica!\r\nQuais são os objetivos ao trabalhar determinado jogo? Por que a escolha de um tipo em detrimento do outro? Como esse uso vai se relacionar com o que está sendo estudado? Esse jogo trabalha com competências que a escola valoriza?\r\nA intencionalidade pedagógica é fundamental para garantir os benefícios dos jogos na educação, além de um trabalho com qualidade.\r\nGestor, estimule os grupos de professores a priorizar sempre a intencionalidade pedagógica no uso de jogos na educação.', '2024-06-12 16:28:00'),
(13, 1, 'A evolução dos jogos', '../img/gamesevolution.jpg', 'Foi no século XX que os jogos começaram a dar seus primeiros passos no mundo digital. O primeiro jogo digital da história marca o ponto de partida de uma revolução que não apenas transformou a maneira como nos divertimos, mas também se tornou uma ferramenta poderosa no campo da educação.\r\nEm 1958, William Higinbotham, um físico do Laboratório Nacional de Brookhaven nos Estados Unidos, desenvolveu o primeiro jogo digital conhecido como &quot;Tennis for Two&quot;. Este jogo simples, apresentado em um osciloscópio, permitia que os jogadores interagissem virtualmente em uma partida de tênis. Embora rudimentar em comparação aos padrões atuais, &quot;Tennis for Two&quot; marcou o início de uma nova era de entretenimento eletrônico.\r\nAo longo das décadas seguintes, os jogos digitais evoluíram rapidamente. O advento dos computadores pessoais na década de 1970 e dos consoles de jogos domésticos na década de 1980 expandiu significativamente o alcance e a complexidade dos jogos. Títulos icônicos como &quot;Pong&quot;, &quot;Space Invaders&quot; e &quot;Super Mario Bros&quot; capturaram a imaginação de milhões de jogadores em todo o mundo, estabelecendo os fundamentos para uma indústria multibilionária.\r\nNo entanto, à medida que os jogos digitais se tornaram mais sofisticados, também surgiram oportunidades para explorar seu potencial educacional. Nos anos 80 e 90, jogos educativos começaram a ganhar popularidade, oferecendo uma abordagem interativa e envolvente para o aprendizado. Títulos como &quot;Where in the World Is Carmen Sandiego?&quot; e &quot;Math Blaster&quot; combinavam desafios educacionais com elementos de jogabilidade para criar experiências de aprendizagem estimulantes e divertidas.\r\nA evolução tecnológica continuou a impulsionar a diversidade e a qualidade dos jogos educativos. Com o advento da internet e dispositivos móveis, os jogos digitais se tornaram ainda mais acessíveis e versáteis. Aplicativos e plataformas online oferecem uma variedade de jogos educativos em uma ampla gama de disciplinas, desde matemática e ciências até línguas e habilidades sociais.\r\nUma das razões pelas quais os jogos digitais se tornaram tão eficazes como ferramentas educacionais é sua capacidade de engajar os jogadores de uma forma única. Ao contrário dos métodos de ensino tradicionais, os jogos oferecem um ambiente de aprendizado interativo e adaptativo, onde os jogadores podem experimentar e aprender com seus erros sem medo de julgamento. Além disso, a gamificação, ou seja, a aplicação de elementos de jogo em contextos não relacionados a jogos, tem sido amplamente adotada em ambientes educacionais para motivar os alunos e reforçar o aprendizado.\r\nHoje, os jogos educativos são amplamente utilizados em escolas, instituições de ensino superior e ambientes de aprendizado corporativo em todo o mundo. Plataformas como o Minecraft Education Edition oferecem ferramentas poderosas para professores e educadores criarem experiências de aprendizado personalizadas e imersivas. Além disso, jogos sérios, que são projetados com objetivos educacionais específicos em mente, estão se tornando cada vez mais populares em campos como medicina, negócios e treinamento profissional.\r\nÀ medida que continuamos a avançar no século XXI, é provável que os jogos digitais desempenhem um papel ainda maior na educação e na aprendizagem ao longo da vida. Com o desenvolvimento de tecnologias como a realidade virtual e aumentada, os limites do que é possível em termos de jogos educativos estão se expandindo constantemente. O primeiro jogo digital pode ter sido apenas um simples jogo de tênis, mas sua influência continua a ressoar até os dias de hoje, transformando a maneira como aprendemos e nos divertimos.', '2024-06-12 16:44:00'),
(14, 1, 'A diversidade dos jogos', '../img/diversidade.jpg', 'Desmistificando o Preconceito: A Diversidade dos Jogos Além da Violência\r\nApesar dos avanços na compreensão e aceitação dos jogos digitais como uma forma legítima de entretenimento e até mesmo de arte, persiste um estigma que associa esses jogos à violência e ao comportamento agressivo. Este preconceito muitas vezes obscurece a realidade complexa e diversificada do mundo dos jogos, ignorando a vasta gama de experiências que eles oferecem. É hora de desafiar esse pensamento equivocado e reconhecer a riqueza e variedade que os jogos têm a oferecer.\r\nUm dos argumentos mais comuns contra os jogos digitais é que eles promovem a violência e influenciam comportamentos agressivos, especialmente entre os jovens. No entanto, inúmeras pesquisas refutaram essa noção, não encontrando uma ligação direta entre jogar jogos violentos e comportamentos violentos na vida real. Estudos mostraram que a grande maioria dos jogadores de jogos violentos não manifesta comportamentos agressivos fora do jogo, e que outros fatores, como ambiente familiar e saúde mental, desempenham um papel muito mais significativo.\r\nAlém disso, os jogos digitais são incrivelmente diversos em termos de gênero, estilo e temática. Enquanto alguns jogos podem apresentar violência como parte de sua narrativa ou mecânica de jogo, muitos outros exploram uma variedade de temas e experiências, desde aventuras épicas e exploração de mundos fantásticos até quebra-cabeças desafiadores e narrativas emocionais. Jogos como \"Journey\", \"Animal Crossing\" e \"The Sims\" são exemplos de títulos que oferecem experiências profundamente envolventes sem recorrer à violência.\r\nAlém disso, os jogos também têm o potencial de promover a empatia, a compreensão e a conscientização sobre uma variedade de questões sociais e culturais. Jogos como \"Life is Strange\" abordam temas como bullying, depressão e identidade, oferecendo aos jogadores uma oportunidade única de explorar e refletir sobre essas questões de uma maneira interativa e envolvente. Da mesma forma, jogos como \"This War of Mine\" e \"Papers, Please\" desafiam os jogadores a enfrentar dilemas éticos e morais complexos, proporcionando uma visão poderosa das realidades da guerra e da injustiça social.\r\nAlém disso, os jogos digitais têm sido cada vez mais reconhecidos como uma forma de arte legítima. Títulos como \"Journey\", \"The Last of Us\" e \"Shadow of the Colossus\" são elogiados por sua narrativa envolvente, design visual deslumbrante e trilha sonora emocionante, evocando emoções e provocando reflexões profundas nos jogadores. O crescente reconhecimento dos jogos como uma forma de expressão artística está ajudando a desafiar a percepção de que eles são meramente brinquedos infantis ou passatempos frívolos.\r\nEm resumo, o preconceito contra os jogos digitais baseado na suposta relação entre jogos violentos e comportamentos agressivos é simplista e desatualizado. Os jogos são uma forma diversificada de entretenimento e expressão criativa, oferecendo uma ampla gama de experiências que vão muito além da violência. É hora de reconhecer a riqueza e a complexidade do mundo dos jogos, e apreciar o vasto potencial que eles têm a oferecer para educar, inspirar e entreter.', '2024-06-12 17:11:00'),
(15, 1, 'Os JEDs no Brasil', '../img/alunosBrasil.jpg', 'JEDs (Jogos Educativos Digitais)\r\nNo Brasil, a educação enfrenta desafios significativos, incluindo a falta de recursos, infraestrutura precária e desigualdade socioeconômica. Diante desses obstáculos, os jogos educativos emergem como uma ferramenta poderosa para complementar e enriquecer o processo de aprendizado, oferecendo uma abordagem divertida, interativa e acessível para educar e capacitar alunos de todas as idades e origens sociais.\r\nEnquanto o acesso à educação formal pode ser limitado em muitas comunidades brasileiras, a disseminação crescente da tecnologia, especialmente smartphones e tablets, oferece uma oportunidade única para expandir o alcance da aprendizagem por meio de jogos digitais. Aplicativos e plataformas online oferecem uma variedade de jogos educativos em português, abordando uma ampla gama de disciplinas, desde matemática e ciências até línguas e história do Brasil.\r\nA importância dos jogos educativos no contexto brasileiro vai além de simplesmente transmitir conhecimento. Esses jogos têm o potencial de estimular o pensamento crítico, promover a resolução de problemas e desenvolver habilidades cognitivas essenciais. Além disso, eles podem ajudar a tornar a aprendizagem mais acessível e inclusiva, atendendo às necessidades individuais dos alunos e adaptando-se a diferentes estilos de aprendizagem.\r\nUma das vantagens dos jogos educativos é sua capacidade de engajar os alunos de uma forma única. Ao contrário de métodos de ensino mais tradicionais, os jogos oferecem um ambiente de aprendizado interativo e envolvente, onde os alunos podem experimentar e aprender com seus erros sem medo de julgamento. Isso pode ser especialmente benéfico em um contexto brasileiro, onde os desafios socioeconômicos podem desencorajar os alunos e minar sua confiança na sala de aula.\r\nAlém disso, os jogos educativos podem ser uma ferramenta valiosa para complementar o currículo escolar e reforçar o aprendizado fora da sala de aula. Eles podem ser usados tanto por professores em atividades planejadas como por alunos de forma independente, oferecendo uma oportunidade para a aprendizagem contínua e autodirigida.\r\nEm um país tão vasto e diversificado como o Brasil, os jogos educativos podem desempenhar um papel importante na redução das disparidades educacionais entre regiões urbanas e rurais, bem como entre escolas públicas e privadas. Eles podem ajudar a nivelar o campo de jogo, oferecendo a todos os alunos acesso a recursos educativos de alta qualidade, independentemente de sua localização geográfica ou condição socioeconômica.\r\nEm suma, os jogos educativos têm o potencial de transformar a educação no Brasil, oferecendo uma abordagem inovadora e inclusiva para o aprendizado. Ao aproveitar o poder da tecnologia e do entretenimento, podemos capacitar os alunos brasileiros a alcançar todo o seu potencial e construir um futuro mais brilhante e equitativo para todos.', '2024-06-12 17:51:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_jogos` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `data_comentario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `titulo_jogo` varchar(255) DEFAULT NULL,
  `imagem_jogo` varchar(255) DEFAULT NULL,
  `data_jogo` datetime DEFAULT current_timestamp(),
  `descricao_jogo` varchar(255) DEFAULT NULL,
  `iframe_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogos`
--

INSERT INTO `jogos` (`id`, `titulo_jogo`, `imagem_jogo`, `data_jogo`, `descricao_jogo`, `iframe_url`) VALUES
(7, 'Contra a Dengue 3', '../img/jogo-dengue.jpg', '2024-06-12 17:53:00', 'Sophia agora embarca em uma aventura no mundo digital. Encontre os irmãos Rômulo e Renata e, juntos, combatam a dengue!', '<iframe src=\"https://www.ludoeducativo.com.br/pt/embed/contra-dengue-3\" width=\"960\" height=\"834\" style=\"width:960px;height:834px;border:0;margin:0;padding:0;\" frameborder=\"0\" title=\"Contra Dengue 3 - Portal Ludo Educativo\"></iframe>'),
(8, 'Aventureca', '../img/jogo-aventureca.jpg', '2024-06-12 17:58:00', 'Jogo de plataforma e de raciocínio em que o objetivo é atravessar o nível misturando e absorvendo as cores.', '<iframe src=\"https://www.ludoeducativo.com.br/pt/embed/aventureca\" width=\"960\" height=\"706\" style=\"width:960px;height:706px;border:0;margin:0;padding:0;\" frameborder=\"0\" title=\"Aventureca - Portal Ludo Educativo\"></iframe>'),
(9, 'Brigadeirolândia', '../img/jogo-palavras-brigadeiro.jpg', '2024-06-12 18:46:00', 'Forme palavras e alimente o brigadeirolense!\r\nNeste jogo, o objetivo do jogador é zelar para que nunca falte doces para os amistosos habitantes.', '<iframe src=\"https://www.ludoeducativo.com.br/pt/embed/brigadeirolandia\" width=\"960\" height=\"706\" style=\"width:960px;height:706px;border:0;margin:0;padding:0;\" frameborder=\"0\" title=\"Brigadeirolândia - Portal Ludo Educativo\"></iframe>'),
(10, 'Jogo da Sustentabilidade', '../img/jogo-reciclagem.jpg', '2024-06-12 18:05:00', 'Jogue e aprenda a reciclar o lixo brincando.\r\nColoque o lixo nos locais corretos e também um jogo da memória.', '<iframe src=\"https://www.ludoeducativo.com.br/pt/embed/jogo-da-sustentabilidade\" width=\"960\" height=\"706\" style=\"width:960px;height:706px;border:0;margin:0;padding:0;\" frameborder=\"0\" title=\"Jogo da sustentabilidade - Portal Ludo Educativo\"></iframe>'),
(11, 'O Museu Encantado', '../img/jogo-museu.jpg', '2024-06-12 18:13:00', 'História, Arte, lógica e destreza!\r\nNeste jogo você precisa ajudar o fantasminha a arrumar o Museu após uma festa que os malvados deram... Junte tudo aquilo que sabe de história e arte, suas habilidades de jogador e embarque nessa aventura!', '<iframe src=\"https://www.ludoeducativo.com.br/pt/embed/o-museu-encantado\" width=\"960\" height=\"706\" style=\"width:960px;height:706px;border:0;margin:0;padding:0;\" frameborder=\"0\" title=\"O Museu Encantado - Portal Ludo Educativo\"></iframe>'),
(12, 'TabuÁgua', '../img/jogo-tabuagua.jpg', '2024-06-12 18:33:00', 'Faça contas da tabuada para revelar seus rivais em um delicioso jogo de queimada na piscina!\r\nVocê deverá resolver contas da tabuada para arremessar a bola e revelar um rival. E não se esqueça, quanto mais rápido você responder, mais pontos fará!', '<iframe src=\"https://www.ludoeducativo.com.br/pt/embed/tabuagua\" width=\"960\" height=\"706\" style=\"width:960px;height:706px;border:0;margin:0;padding:0;\" frameborder=\"0\" title=\"TabuÁgua - Portal Ludo Educativo\"></iframe>'),
(14, 'AlfaBeta Heroi', '../img/jogo-alfabeta.jpg', '2024-06-12 18:55:00', 'Venha ajudar a Alfa Heroína a corrigir as palavras alteradas pelo malvado Greeny!\r\nAlfaBeta Herói é um jogo de Português focado nos erros mais comuns da Língua Portuguesa.\r\n\r\n', '<iframe src=\"https://www.ludoeducativo.com.br/pt/embed/alfabeta-heroi\" width=\"960\" height=\"706\" style=\"width:960px;height:706px;border:0;margin:0;padding:0;\" frameborder=\"0\" title=\"AlfaBeta Heroi - Portal Ludo Educativo\"></iframe>');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `tipo` enum('ADMIN','USUARIO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nascimento`, `tipo`) VALUES
(1, 'ADMIN', 'adm@email.com', '123', '2024-06-06', 'ADMIN');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`),
  ADD KEY `id_jogos` (`id_jogos`);

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `artigos`
--
ALTER TABLE `artigos`
  ADD CONSTRAINT `artigos_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_jogos`) REFERENCES `jogos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

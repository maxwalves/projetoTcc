<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Camax Tech - Desenvolvimento de Software</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        #whatsapp-button {
            position: fixed;
            bottom: 15%;
            right: 20px;
            /* Posicionado no lado direito */
            background-color: transparent;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        #whatsapp-button img {
            width: 50px;
            height: 50px;
        }

        #content {
            /* Estilo para o conteúdo da página */
        }

        #banner {
            background-color: transparent;
            /* Cor de fundo do banner */
            display: flex;
            justify-content: center;
            align-items: center;
            /* Ajuste a altura conforme necessário */
            color: #black;
            /* Cor do texto no banner */
        }

        .banner-content h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .banner-content p, li {
            font-size: 18px;
            color: black
        }
    </style>
</head>

<body>

    <div id="whatsapp-button" style="display: none">
        <a href="https://api.whatsapp.com/send?phone=5541999317213" target="_blank">
            <img src="{{ asset('/img/whatsapp.png') }}" alt="WhatsApp">
        </a>
    </div>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-2 d-none d-md-flex">
        <div class="container">
            <div class="d-flex justify-content-between topbar">
                <div class="top-info">
                    <small class="me-3 text-white-50"><a href="#"><i
                                class="fas fa-envelope me-2 text-secondary"></i></a>contato@camaxtech.com</small>
                </div>
                <div class="top-link">
                    <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i
                            class="fab fa-instagram text-primary"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-lg py-0">
                <a href="/" class="navbar-brand" style="width: 40%;">
                    <img src="{{ asset('/img/logosite2.png') }}" width="80%" alt="">
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                    <div class="navbar-nav ms-auto mx-xl-auto p-0">
                        <a href="/" class="nav-item nav-link active text-secondary">Home</a>
                        <a href="/sobre" class="nav-item nav-link">Sobre</a>
                        <a href="/servicos" class="nav-item nav-link">Serviços</a>
                        <a href="/projetos" class="nav-item nav-link">Projetos</a>
                        <a href="/contato" class="nav-item nav-link">Contato</a>
                    </div>
                </div>
                <div class="d-none d-xl-flex flex-shirink-0">
                    <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                        <a href="https://api.whatsapp.com/send?phone=5541999317213" target="_blank"
                            class="position-relative animated tada infinite">
                            <i class="fab fa-whatsapp text-white fa-2x"></i>
                        </a>
                    </div>
                    <div class="d-flex flex-column pe-4">
                        <span class="text-white-50">Gostaria de um orçamento?</span>
                        <span class="text-secondary"> (41) 99931-7213</span>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Criação de Logotipo e Identidade Visual</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Criação de Logotipo e Identidade Visual</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Project Start -->
    <div class="container-fluid project py-5 my-5">
        <div class="container py-5">
            <div id="banner">
                <div class="banner-content">
                    <div>
                        <h3>Consulta Inicial</h3>
                        <p>Tudo começa com uma consulta inicial. Nesse estágio, nossos designers e especialistas em identidade visual se reúnem com o cliente para entender a visão, os valores e os objetivos da marca. É o momento de definir as diretrizes para a criação do logotipo e identidade visual.</p>
                    </div>

                    <br>

                    <div>
                        <h3>Análise e Inspiração</h3>
                        <p>Nossa equipe realiza uma análise profunda do mercado e da concorrência, identificando oportunidades para a diferenciação da marca. Também buscamos inspiração em diversos elementos, como cultura, história e design contemporâneo.</p>
                    </div>

                    <br>

                    <div>
                        <h3>Design do Logotipo</h3>
                        <p>Nossos designers criam conceitos de logotipo baseados nas informações coletadas. Trabalhamos em estreita colaboração com o cliente, refinando o design até que ele capture perfeitamente a identidade da marca. A simplicidade e a memorabilidade são fundamentais em nossos logotipos.</p>
                    </div>

                    <br>

                    <div>
                        <h3>Identidade Visual Completa</h3>
                        <p>Nossa expertise não se limita apenas ao logotipo. Desenvolvemos uma identidade visual completa que inclui paleta de cores, tipografia, padrões e diretrizes de uso. Isso garante que sua marca seja consistente e reconhecível em todos os pontos de contato.</p>
                    </div>

                    <br>

                    <div>
                        <h3>Aprovação</h3>
                        <p>Após o design finalizado, o logotipo e a identidade visual passam por testes rigorosos para garantir que funcionem em diferentes contextos e mídias. Aprovamos o design com o cliente antes de prosseguir com a implementação.</p>
                    </div>

                    <br>

                    <div>
                        <h3>Entrega e Guia de Uso</h3>
                        <p>Entregamos os arquivos finais do logotipo e da identidade visual, juntamente com um guia abrangente de uso. Esse guia fornece diretrizes claras sobre como aplicar a identidade visual em diversos materiais, garantindo sua consistência em todas as comunicações da marca.</p>
                    </div>

                    <br>

                    <div>
                        <h2>Benefícios da Identidade Visual Forte</h2>
                        <p>Investir na criação de logotipo e identidade visual pode proporcionar diversos benefícios para sua marca:</p>
                        <ul>
                            <li>Reconhecimento Instantâneo: Um logotipo memorável ajuda as pessoas a identificar sua marca imediatamente.</li>
                            <li>Consistência de Marca: Uma identidade visual bem definida garante que sua marca seja consistente em todas as comunicações.</li>
                            <li>Diferenciação: A identidade visual pode destacar sua marca em um mercado competitivo.</li>
                            <li>Conexão Emocional: Um design bem pensado pode criar uma conexão emocional com seu público.</li>
                        </ul>
                    </div>
                                                                                                                                            
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- Footer Start -->
    <div class="container-fluid footer bg-dark wow fadeIn" data-wow-delay=".3s">
        <div class="container pt-5 pb-4">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <a href="index.html">
                        <h1 class="text-white fw-bold d-block">Camax<span class="text-secondary">Tech</span> </h1>
                    </a>
                    <p class="mt-4 text-light">Empresa especializada em desenvolvimento de sites, softwares e
                        marketing.</p>
                    <div class="d-flex hightech-link">
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
                                class="fab fa-instagram text-primary"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Links</a>
                    <div class="mt-4 d-flex flex-column short-link">
                        <a href="/sobre" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Sobre nós</a>
                        <a href="/contato" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Contato</a>
                        <a href="/servicos" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Nossos serviços</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Entre em contato</a>
                    <div class="text-white mt-4 d-flex flex-column contact-link">
                        <a href="#" class="py-3 text-light border-bottom border-primary"><i
                                class="fas fa-phone-alt text-secondary me-2"></i> (41) 99931-7213</a>
                        <a href="#" class="py-3 text-light border-bottom border-primary"><i
                                class="fas fa-envelope text-secondary me-2"></i> contato@camaxtech.com</a>
                    </div>
                </div>
            </div>
            <hr class="text-light mt-5 mb-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <span class="text-light"><a href="#" class="text-secondary">Desenvolvido por Camax
                            Tech</a></span>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <span class="text-secondary">Desenhado por <a href="https://htmlcodex.com"
                        class="text-secondary">HTML Codex</a> Distribuído por <a
                        href="https://themewagon.com" class="text-secondary">ThemeWagon</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up text-white"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        const whatsappButton = document.getElementById('whatsapp-button');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) { // Ajuste o valor conforme necessário
                whatsappButton.style.display = 'block';
            } else {
                whatsappButton.style.display = 'none';
            }
        });
    </script>
</body>

</html>

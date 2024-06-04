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
            <h1 class="display-2 text-white mb-4 animated slideInDown">Entre em contato</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Contato</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Fact Start -->
    <div class="container-fluid bg-secondary py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">1</h1>
                        <h5 class="text-white mt-1">Forneça informações sobre a sua empresa</h5>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".3s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">2</h1>
                        <h5 class="text-white mt-1">Orçamento e aprovação</h5>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".5s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">3</h1>
                        <h5 class="text-white mt-1">Desenvolvimmento do site e software</h5>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">4</h1>
                        <h5 class="text-white mt-1">Você feliz com sua empresa na internet</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Entre em contato</h5>
                <h1 class="mb-3">Estamos prontos para te atender</h1>
                <p class="mb-2">Iremos preparar uma proposta e orçamento especiais para a sua empresa!</p>
            </div>
            <div class="contact-detail position-relative p-5">
                <div class="row g-5 mb-5 justify-content-center">
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Entre em contato</h4>
                                <a class="h5" href="tel:(41) 99931-7213" target="_blank">(41) 99931-7213</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-envelope text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">E-mail</h4>
                                <a class="h5" href="mailto:contato@camaxtech.com"
                                    target="_blank">contato@camaxtech.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-12 wow fadeIn" data-wow-delay=".5s">
                        <form action="{{ url('/mensagensInicial') }}" method="POST">
                            @csrf
                            <div class="p-5 rounded contact-form">
                                <div class="mb-4">
                                    <input type="text" class="form-control border-0 py-3" placeholder="Seu Nome"
                                        name="nome" id="nome" required>
                                </div>
                                <div class="mb-4">
                                    <input type="email" class="form-control border-0 py-3" placeholder="Seu e-mail"
                                        name="email" id="email" required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control border-0 py-3" placeholder="Projeto"
                                        name="projeto" id="projeto" required>
                                </div>
                                <div class="mb-4">
                                    <textarea class="w-100 form-control border-0 py-3" rows="6" cols="10" placeholder="Mensagem"
                                        name="conteudo" id="conteudo" required></textarea>
                                </div>
                                <div class="text-start">
                                    <button class="btn bg-primary text-white py-3 px-5" type="submit">Enviar
                                        mensagem</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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
                        <a href="/servicos" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Nossos serviços</a>
                        <a href="/projetos" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Nossos projetos</a>
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

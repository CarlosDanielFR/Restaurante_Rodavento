@extends('layouts.app_landingpage')

@section('title', 'Hotel Rodavento - Valle de Bravo')

@push('styles')
    <style>
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(180deg, rgba(11,29,38,0.4) 0%, rgba(11,29,38,0.85) 80%, #0b1d26 100%),
            url("{{ asset('images/Hotel.jpeg') }}") center/cover no-repeat;
            display: flex;
            align-items: center;
            position: relative;
            padding-top: 100px;
        }

        .subtitle-tag {
            letter-spacing: 4px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .subtitle-tag::before {
            content: '';
            width: 50px;
            height: 2px;

        }

        .feature-section {
            padding: 100px 0;
            position: relative;
        }

        .big-number {
            font-size: 14rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.05);
            position: absolute;
            top: -60px;
            left: -20px;
            z-index: 0;
            line-height: 1;
            user-select: none;
            font-family: 'Playfair Display', serif;
        }

        .feature-content {
            position: relative;
            z-index: 1;
        }

        .img-container img {
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
            object-fit: cover;
            width: 100%;
            height: 500px;
            border-radius: 4px;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="subtitle-tag text-accent justify-content-center mb-3">
                        --- Un refugio en el bosque ---
                    </div>
                    <h1 class="display-2 text-white fw-semibold mb-4">
                        Conecta con la Naturaleza y el Lujo
                    </h1>
                    <a href="#experiencia" class="btn-link-accent fs-6">
                        Descubre Rodavento <i class="bi bi-arrow-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Secciones del contenido -->
    <div class="container py-5">

        <!-- Sección 01 -->
        <section class="feature-section" id="experiencia">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6 order-lg-1">
                    <div class="feature-content pe-lg-5">
                        <span class="big-number">01</span>
                        <div class="subtitle-tag text-accent mb-3">EL ORIGEN</div>
                        <h2 class="display-5 text-white mb-4">¿Qué experiencia buscas vivir?</h2>
                        <p class="text-white-50 mb-4 lh-lg">
                            Ubicado en el corazón del bosque de Valle de Bravo, Hotel Rodavento ofrece un concepto único de alojamiento en suites rodeadas de pinos y junto a nuestro lago privado.
                        </p>
                        <a href="#" class="btn-link-accent">
                            Leer más <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 order-lg-2">
                    <div class="img-container">
                        <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=800&auto=format&fit=crop" alt="Hotel Rodavento Vista">
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 02 -->
        <section class="feature-section" id="habitaciones">
            <div class="row align-items-center gy-5">
                <div class="col-lg-5 order-lg-1">
                    <div class="img-container">
                        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=800&auto=format&fit=crop" alt="Suites Rodavento">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 order-lg-2">
                    <div class="feature-content ps-lg-4">
                        <span class="big-number">02</span>
                        <div class="subtitle-tag text-accent mb-3">HOSPEDAJE EXCLUSIVO</div>
                        <h2 class="display-5 text-white mb-4">Nuestras Suites en el Bosque</h2>
                        <p class="text-white-50 mb-4 lh-lg">
                            Diseñadas para fusionarse con el entorno natural sin perder la elegancia y la comodidad. Cada suite cuenta con terrazas privadas, chimeneas y vistas impresionantes.
                        </p>
                        <a href="#" class="btn-link-accent">
                            Ver disponibilidad <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

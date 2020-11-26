@extends('welcome')
@section('content') 
        <div class="container">
            <h3 style="text-align: center">Súťaž o najkrajšiu trofej jeleňa 2020</h3>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/galeria1.jpg" class="d-block w-100" alt="1Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Prvé miesto</h5>
                        <p>Juraj B. z Košíc</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/galeria2.jpg" class="d-block w-100" alt="2Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Druhé miesto</h5>
                        <p>Zdeněk P. z Napajedel</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/galeria3.jpg" class="d-block w-100" alt="3Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tretie miesto</h5>
                        <p>Oliver K. z Prahy</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
@endsection

@extends('layout.layout')

@section('content')
<main id="mainContentWrapper">
    <div class="content-container">
        <!-- Hoofdsectie met titel -->
        <div class="content-header">
            <h1>ONZE <span class="highlighted">SERVICE</span></h1>
        </div>

        <!-- Beschrijving van de diensten -->
        <div class="content-body">
            <p>Dit zijn alle diensten die wij leveren.</p>
        </div>

        <!-- Eerste set van diensten -->
        <div class="service-section">
            <div class="service-item">
                <img src="{{ asset('foto\'s/test.png')}}" alt="Graphic Design Service">
                <h2>Graphic Design</h2>
                <p>Ons bedrijf biedt grafisch ontwerp diensten aan, zoals logo's, branding, webdesign, printmaterialen en visuele content.</p>
            </div>
            
            <div class="service-item">
            <img src="{{ asset('foto\'s/test.png')}}" alt="Software Development Service">
                <h2>Software Development</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit dignissimos, facere consectetur, ipsam delectus voluptatibus reiciendis quas, </p>
            </div>
            
            <div class="service-item">
            <img src="{{ asset('foto\'s/test.png')}}"alt="Product Design Service">
                <h2>Product Design</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis nihil provident ipsa ut optio sunt tenetur vitae excepturi consequuntur est, </p>
            </div>
        </div>

        <!-- Tweede set van diensten -->
        <div class="service-section">
            <div class="service-item">
            <img src="{{ asset('foto\'s/test.png')}}" alt="Blog Writing Service">
                <h2>Blog Writing</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora deleniti, dolorum dolore, </p>
            </div>

            <div class="service-item">
            <img src="{{ asset('foto\'s/test.png')}}" alt="Social Marketing Service">
                <h2>Social Marketing</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi ab quo tempore? </p>
            </div>

            <div class="service-item">
            <img src="{{ asset('foto\'s/test.png')}}" alt="IT Services">
                <h2>IT Services</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, accusantium? </p>
            </div>
        </div>
    </div>
</main>
@endsection

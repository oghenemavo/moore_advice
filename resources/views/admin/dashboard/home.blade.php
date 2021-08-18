@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@latest/dist/css/splide-extension-video.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@latest/dist/css/splide-extension-video.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@latest/dist/js/splide-extension-video.min.js"></script>

<style>
    .bg-section2 {
        background: purple;
        color: #fff;
    }

    .avatar {
        display: inline-block;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: grey;
    }

    .opaque {
        background: #000;
        opacity: 0.4;
    }

    .time-ct {
        display: inline-block;
        padding: 4px;
        background: #000;
        opacity: 0.4;
    }

    .content-slide {
        height: 400px;
        background: blue;
    }
</style>
<!-- or the reference on CDN -->

@endpush

@section('content')

<div class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach($videos as $video)
                <li class="splide__slide" data-splide-html-video="{{ asset('video/'. $video->content) }}">
                    <img src="thumbnail01.jpg">
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7">

            <div class="banner splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($banners as $banner)
                            <li class="splide__slide content-slide">
                                <img src="{{ asset('image/'. $banner->content) }}" alt="Card image cap">
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>             

            <div class="logo splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($logos as $logo)
                            <li class="splide__slide content-slide">
                                <img src="{{ asset('image/'. $logo->content) }}" alt="Card image cap">
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>             
                
        </div>

        <div class="col-lg-5 bg-section2 py-3">
            <h4 class="text-center">11-June-2020</h4>
            <div class="d-flex justify-content-around">
                <div>
                    <span class="time-ct mr-3">0</span> <span class="time-ct ">3</span> :
                </div>
                <div>
                    <span class="time-ct mr-1">1</span> <span class="time-ct ">0</span> :

                </div>
                <div>
                    
                    <span class="time-ct mr-1">4</span> <span class="mr-1 time-ct ">3</span> PM
                </div>
            </div>

            <div class="mb-2">
                <h3 class="text-center opaque my-2">Heading One</h3>
    
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Title2</th>
                            <th>Title3</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables1 as $table)
                            <tr>
                                <td>
                                    <span class="avatar">&nbsp;</span> {{ $table->title1 }}
                                </td>
                                <td>{{ $table->title2 }}</td>
                                <td>{{ $table->title3 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>

            <div class="mb-2">
                <h3 class="text-center opaque my-2">Heading Two</h3>
                @foreach($tables2 as $table)
                    <div class="d-flex justify-content-between">
                        <div>AAA <span class="ml-2">{{ $table->title1 }}</span></div>
                        <div>BBB <span class="ml-2">{{ $table->title2 }}</span></div>
                        <div>CCC <span class="ml-2">{{ $table->title3 }}</span></div>
                    </div>
                @endforeach
            </div>

            <div class="mb-2">
                <h3 class="text-center opaque my-2">Heading Three</h3>
    
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title4</th>
                            <th>Title5</th>
                            <th>Title6</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tables3 as $table)
                    <tr>
                        <td>{{ $table->title1 }}</td>
                        <td>{{ $table->title2 }}</td>
                        <td>{{ $table->title3 }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@latest/dist/js/splide-extension-video.min.js"></script>

<script>
	document.addEventListener( 'DOMContentLoaded', function () {
        
        new Splide( '.logo', {
            type   : 'loop',
            autoplay: true,
            padding: {
                right: '5rem',
                left : '5rem',
            },
        } ).mount();
        
        new Splide( '.banner', {
            type   : 'loop',
            autoplay: true,
            padding: {
                right: '5rem',
                left : '5rem',
            },
        } ).mount();

        new Splide( '.splide', {
            autoplay: true,
		    mute    : true,
            heightRatio: 0.2625,
            cover      : true,
            lazyLoad   : 'sequential',
            video      : {
                loop: true,
            },
        } ).mount( window.splide.Extensions );


	} );
</script>
@endpush
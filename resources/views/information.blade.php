@extends('layouts.app')

@section('title',$meta['title'])
@section('meta_keywords',$meta['keywords'])
@section('meta_description',$meta['description'])

@section('content')

    <main class="main__content_wrapper">

        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">{{ $result['title'] }}</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">{{ $result['title'] }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about__section section--padding mb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="about__content--maintitle mb-25">{{ $result['title'] }}</h2>
                        <p class="about__content--desc mb-20"><?php echo $result['description']; ?></p>
                    </div>
                </div>
            </div>
        </section>
    </main> 
    


@endsection

@extends('layouts.app')

@section('content')
    @include('dashboard.components.balance_bar')

    <section class="main-container">
        <div class="wrapper">
            <div class="page">
                <header class="page-title">
                    <div class="title">{{ __('news.title') }}</div>
                    <div class="description">{{__('news.desc')}}</div>
                </header>

                <div class="news-wrapper">
                    @foreach($allNews as $news)
                    <div class="news-item">
                        <div class="news-date">
                            {{ $news->created_at->translatedFormat('d F Y') }}</div>
                        <div class="news-title">{{$news->title}}</div>
                        <div class="news-text">{!! Illuminate\Support\Str::markdown($news->content) !!}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endSection

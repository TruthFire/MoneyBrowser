@extends('layouts.app')

@section('content')
    @include('dashboard.components.balance_bar')

    <section class="main-container">
        <div class="wrapper">
            <div class="page">
                <header class="page-title">
                    <div class="title">News</div>
                    <div class="description">Stay up to date with all the events and updates of the AddonMoney project.</div>
                </header>

                <div class="news-wrapper">
                    @foreach($allNews as $news)
                    <div class="news-item">
                        <div class="news-date">
                            {{ $news->created_at->format('d F Y') }}</div>
                        <div class="news-title">{{$news->en_title}}</div>
                        <div class="news-text">{!! Illuminate\Support\Str::markdown($news->en_content) !!}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endSection

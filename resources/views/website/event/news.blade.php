@extends('website.layouts.app')

@section('content')
    <section>
        <div class="container-fluid p-0">
            <!-- Breadcrumb -->
            <nav class="bio-breadcrumb" aria-label="Breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"
                            aria-label="मुख्य पृष्ठ पर जाएं">{{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $language === 'hi' ? 'बीएसआईपी समाचार' : 'BSIP News' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container mt-4">

            @foreach ($news as $event)
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h2 class="event-heading">
                            {{ $language === 'hi' ? $event->title_hin : $event->title }}
                        </h2>
                    </div>
                    <div class="col-md-2">
                        <div class="text-end">
                            @if ($event->file)
                                <a href="{{ $event->file }}" class="btn btn-primary" target="_blank" role="button"
                                    aria-label="Download PDF file" title="Download PDF">
                                    <i class="fa-solid fa-file-pdf" aria-hidden="true"></i>
                                </a>
                            @endif
                            <button class="btn btn-primary ms-2" aria-label="Event Date For Event" title="Event Date">
                                {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') }}
                            </button>
                        </div>
                    </div>

                </div>
                <div class="divider mt-2"></div>

                <p class="event-subheading">
                    {{ $language === 'hi' ? $event->description_hin : $event->description }}
                </p>

                <div class="row mt-2 mb-5">
                    @if ($event->image)
                        @foreach ($event->image as $image)
                            <div class="col-md-3">
                                <div class="card-event">
                                    <img src="{{ $image }}" class="card-img-event" alt="Event Image 1">
                                    {{-- <div class="card-body-event">
                                        <p class="card-text-event">
                                            Antakshari competition organized in BSIP on 24.9.2024 under Hindi Fortnight 2024
                                        </p>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach

        </div>
    </section>
@endsection

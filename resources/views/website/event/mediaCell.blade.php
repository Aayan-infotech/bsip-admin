@extends('website.layouts.app')
@push('meta-tags')
    <meta name="description"
        content="Welcome to the Birbal Sahni Institute of Palaeosciences (BSIP), India's leading research institute in palaeobotany, palaeobiology, and earth sciences, advancing the study of plant fossils and Earth's history.">
@endpush
@section('content')
    <section>
        <div class="container-fluid p-0" id="skipToContent">
            <!-- Breadcrumb -->
            <nav class="bio-breadcrumb" aria-label="Breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"
                            aria-label="मुख्य पृष्ठ पर जाएं">{{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#"
                            aria-label="{{ $language === 'hi' ? 'मीडिया सेल' : 'Media Cell' }}">{{ $language === 'hi' ? 'मीडिया सेल' : 'Media Cell' }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container py-5">
            <!-- Blog Posts -->
            <div class="row">
                <!-- Blog Post 1 -->
                @foreach ($data as $blog)
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="card blogosphere-card h-100">
                            <div class="blogosphere-img-container">
                                <a href="{{ route('frontend.blog.show', ['language' => $language, 'slug' => $blog->slug]) }}"
                                    class="blogosphere-card-link">
                                    <img src="{{ $blog->image ? $blog->image : asset('assets-new/assets/images/bsip-imgd.png') }}"
                                        class="blogosphere-card-img" alt="Tech Image" title="Media Cell Image" />
                                </a>
                            </div>
                            <div class="blogosphere-card-body">
                                <span class="blogosphere-card-date">{{ $blog->created_at->format('d/m/Y') }}</span>
                                <a href="{{ route('frontend.blog.show', ['language' => $language, 'slug' => $blog->slug]) }}"
                                    class="blogosphere-card-link">
                                    <h5 class="blogosphere-card-title">
                                        {{ $language === 'hi' ? $blog->hin_title : $blog->title }}
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>



            <!-- Pagination -->
            @if ($allBlogs->hasPages())
                <nav aria-label="Page navigation" class="my-2">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $allBlogs->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $allBlogs->previousPageUrl() }}"
                                aria-label="Previous">{{ __('Previous') }}</a>
                        </li>
                        @for ($index = 1; $index <= $allBlogs->lastPage(); $index++)
                            <li class="page-item {{ $index == $allBlogs->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $allBlogs->url($index) }}">{{ $index }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $allBlogs->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $allBlogs->nextPageUrl() }}"
                                aria-label="Next">{{ __('Next') }}</a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </section>
    <style>
        .blogosphere-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 2rem;
            border-bottom: 3px solid #004b8c;
            height: 100%;
        }

        .blogosphere-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
            cursor: pointer;
        }

        .blogosphere-img-container {
            height: 220px;
            overflow: hidden;
        }

        .blogosphere-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .blogosphere-card:hover .blogosphere-card-img {
            transform: scale(1.05);
        }

        .blogosphere-card-body {
            padding: 1.2rem;
            display: flex;
            flex-direction: column;
            height: calc(100% - 220px);
            /* Subtract image height */
        }

        .blogosphere-card-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #000000;
        }
        .blogosphere-card-body a{
            text-decoration: none;
        }

        .blogosphere-card-text {
            font-size: 1rem;
            color: #000000;
            margin-bottom: 1rem;
        }

        .blogosphere-card-date {
            font-size: 0.85rem;
            color: #000000;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .blogosphere-tag {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background-color: #f0f0f0;
            border-radius: 50px;
            font-size: 0.75rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            color: #6e8efb;
        }

        .read-more-btn {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            background-color: #004b8c;
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
            margin-top: auto;
            /* Push button to bottom */
        }

        .read-more-btn:hover {
            background-color: #003366;
            color: white;
        }

        /* Ensure columns have equal height */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .row>[class*='col-'] {
            display: flex;
            flex-direction: column;
        }
    </style>
@endsection

@extends('website.layouts.app')
@push('meta-tags')
    <meta name="description"
        content="Welcome to the Birbal Sahni Institute of Palaeosciences (BSIP), India's leading research institute in palaeobotany, palaeobiology, and earth sciences, advancing the study of plant fossils and Earth's history.">
@endpush
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
                    <li class="breadcrumb-item active">
                        <a href="#"
                            aria-label="{{ $language === 'hi' ? 'मीडिया सेल' : 'Media Cell' }}">{{ $language === 'hi' ? 'मीडिया सेल' : 'Media Cell' }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container py-2">
            <div class="row">
                <!-- Blog Content -->
                <div class="col-lg-12">

                    <article class="blog-content">
                        <div class="blog-header-content">
                            <h1 class="blog-title">
                                {{ $language === 'hi' ? $blog->hin_title : $blog->title }}
                            </h1>
                            <div class="blog-meta">
                                <div class="blog-meta-item">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>{{ $blog->created_at->format('d/m/Y') }}</span>
                                </div>

                            </div>
                        </div>
                        <img src="{{ $blog->image ? $blog->image : asset('assets-new/assets/images/bsip-imgd.png') }}"
                            alt="AI Technology" class="img-fluid " />

                        {!! $language === 'hi' ? $blog->hin_description : $blog->description !!}
                    </article>


                </div>
            </div>
        </div>
    </section>
    <style>
        :root {
            --primary-color: #004b8c;
            --secondary-color: #6e8efb;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        .blog-title {
            font-weight: 800;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .blog-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            /* margin-bottom: 1.5rem; */
        }

        .blog-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .blog-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .blog-tag {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }

        .blog-tag:hover {
            background-color: white;
            color: var(--primary-color);
        }

        .blog-content {
            background-color: rgb(247, 247, 247);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            margin-bottom: 3rem;
        }

        .blog-content img {
            width: 100%;
            max-width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 8px;
            margin: 2rem 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .blog-content blockquote {
            border-left: 4px solid var(--secondary-color);
            padding: 1rem 1.5rem;
            background-color: var(--light-color);
            font-style: italic;
            margin: 2rem 0;
        }

        .author-card {
            display: flex;
            align-items: center;
            background-color: rgb(240, 240, 240);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .author-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1.5rem;
            border: 3px solid var(--secondary-color);
        }

        .author-name {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .author-bio {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
        }

        .recent-post {
            display: flex;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        .recent-post:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .recent-post-img {
            width: 80px;
            height: 60px;
            border-radius: 5px;
            object-fit: cover;
            margin-right: 1rem;
        }

        .recent-post-title {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .recent-post-date {
            font-size: 0.75rem;
            color: #888;
        }



        @media (max-width: 991.98px) {
            .blog-header {
                padding: 3rem 0;
            }

            .blog-title {
                font-size: 2rem;
            }

            .author-card {
                flex-direction: column;
                text-align: center;
            }

            .author-img {
                margin-right: 0;
                margin-bottom: 1.5rem;
            }

        }
    </style>
@endsection

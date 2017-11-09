@extends('layouts.frontend')





@section('content')


<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{ $post->title }}</h1>
    </div>
</div>


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            {{-- <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">admin</a>
                                </div>

                            </div> --}}

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{$post->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category.single',['id'=>$post->category->id]) }}">{{ $post->category->name}}</a>
                              
                            </span>

                        </div>

                        <div class="post__content-info">
                               

                               {!! $post->body !!}
                           
                        

                           <div class="widget w-tags">
                                <div class="tags-wrap">
                                	@foreach($post->tags as $tag)
                                    <a href="{{ route('tag.single',['id'=>$tag->id]) }}" class="w-tags-item">{{$tag->tag}}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials text-center">Share:
                        <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox_jd8q"></div>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ asset($post->user->profile->avatar) }}" alt="Author">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{$post->user->name}}</h5>
                            
                        </div>
                        <p class="text">{{$post->user->profile->about}}
                        </p>
                        <div class="socials">

                            <a href="{{$post->user->profile->facebook}}" target="_blank" class="social__item">
                                <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                            </a>

                            {{-- <a href="#" class="social__item">
                                <img src="{{ asset('app/svg/twitter.svg') }}" alt="twitter">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('app/svg/google.svg') }}" alt="google">
                            </a> --}}

                            <a href="{{$post->user->profile->youtube}}" target="_blank" class="social__item">
                                <img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

                              @if($prev)
                                    <a href="{{ route('post.single', ['slug' => $prev->slug ]) }}" class="btn-next-wrap">
                                          <div class="btn-content">
                                          <div class="btn-content-title">Next Post</div>
                                          <p class="btn-content-subtitle">{{ $prev->title }}</p>
                                          </div>
                                          <svg class="btn-next">
                                          <use xlink:href="#arrow-right"></use>
                                          </svg>
                                    </a>
                              @endif

                              @if($next)
                                    <a href="{{ route('post.single', ['slug' => $next->slug ]) }}" class="btn-prev-wrap">
                                          <svg class="btn-prev">
                                          <use xlink:href="#arrow-left"></use>
                                          </svg>
                                          <div class="btn-content">
                                          <div class="btn-content-title">Previous Post</div>
                                          <p class="btn-content-subtitle">{{ $next->title }}</p>
                                          </div>
                                    </a>
                              @endif

                        </div>


                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>

                    @include('includes.disqus')
                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">

                        	@foreach($post->tags as $tag)
                                    <a href="{{ route('tag.single',['id'=>$tag->id]) }}" class="w-tags-item">{{$tag->tag}}</a>
                            @endforeach
                            
                        </div>
                    </div>
                </aside>
            </div>




            <!-- End Sidebar-->

        </main>
    </div>
</div>
<!-- form-->




@endsection()
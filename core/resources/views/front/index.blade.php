@extends('front.layout')

@section('meta-keywords', "$be->home_meta_keywords")
@section('meta-description', "$be->home_meta_description")


@section('content')
  <!--   hero area start   -->
  @if ($bs->home_version == 'static')
    @includeif('front.partials.static')
  @elseif ($bs->home_version == 'slider')
    @includeif('front.partials.slider')
  @elseif ($bs->home_version == 'video')
    @includeif('front.partials.video')
  @elseif ($bs->home_version == 'particles')
    @includeif('front.partials.particles')
  @elseif ($bs->home_version == 'water')
    @includeif('front.partials.water')
  @elseif ($bs->home_version == 'parallax')
    @includeif('front.partials.parallax')
  @endif
  <!--   hero area end    -->


  <!--    introduction area start   -->
  <div class="intro-section" @if($bs->feature_section == 0) style="margin-top: 0px;" @endif>
     <div class="container">
       @if ($bs->feature_section == 1)
       <div class="hero-features">
          <div class="row">
            @foreach ($features as $key => $feature)
                <style>
                    .sf{{$feature->id}}::after {
                        background-color: #{{$feature->color}};
                    }
                </style>
                <div class="col-md-3 col-sm-6 single-hero-feature sf{{$feature->id}}" style="background-color: #{{$feature->color}};">
                <div class="outer-container">
                    <div class="inner-container">
                        <div class="icon-wrapper">
                        <i class="{{$feature->icon}}"></i>
                        </div>
                        <h3>{{convertUtf8($feature->title)}}</h3>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
       </div>
       @endif

       @if ($bs->intro_section == 1)
       <div class="row">
          <div class="col-lg-6 {{$rtl == 1 ? 'pl-lg-0' : 'pr-lg-0'}}">
             <div class="intro-txt">
                <span class="section-title">{{convertUtf8($bs->intro_section_title)}}</span>
                <h2 class="section-summary">{{convertUtf8($bs->intro_section_text)}} </h2>
                @if (!empty($bs->intro_section_button_url) && !empty($bs->intro_section_button_text))
                <a href="{{$bs->intro_section_button_url}}" class="intro-btn" target="_blank"><span>{{convertUtf8($bs->intro_section_button_text)}}</span></a>
                @endif
             </div>
          </div>
          <div class="col-lg-6 {{$rtl == 1 ? 'pr-lg-0' : 'pl-lg-0'}} px-md-3 px-0">
             <div class="intro-bg" style="background-image: url('{{asset('assets/front/img/'.$bs->intro_bg)}}'); background-size: cover;">
                @if (!empty($bs->intro_section_video_link))
                <a id="play-video" class="video-play-button" href="{{$bs->intro_section_video_link}}">
                  <span></span>
                </a>
                @endif
             </div>
          </div>
       </div>
       @endif
     </div>
  </div>
  <!--    introduction area end   -->


  @if ($bs->service_section == 1)
  <!--   service section start   -->
  <div class="service-categories">
    <div class="container">
       <div class="row text-center">
          <div class="col-lg-6 offset-lg-3">
             <span class="section-title">{{convertUtf8($bs->service_section_title)}}</span>
             <h2 class="section-summary">{{convertUtf8($bs->service_section_subtitle)}}</h2>
          </div>
       </div>
    </div>
    <div class="container">
      <div class="row">
        @foreach ($scats as $key => $scat)
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="single-category">
              @if (!empty($scat->image))
                <div class="img-wrapper">
                    <img src="{{asset('assets/front/img/service_category_icons/'.$scat->image)}}" alt="">
                </div>
              @endif
              <div class="text">
                <h4>{{convertUtf8($scat->name)}}</h4>
                <p>{{convertUtf8($scat->short_text)}}</p>
                <a href="{{route('front.services', ['category'=>$scat->id])}}" class="readmore">{{__('Read More')}}</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <!--   service section end   -->
  @endif


  @if ($bs->approach_section == 1)
  <!--   how we do section start   -->
  <div class="approach-section">
     <div class="container">
        <div class="row">
           <div class="col-lg-6">
              <div class="approach-summary">
                 <span class="section-title">{{convertUtf8($bs->approach_title)}}</span>
                 <h2 class="section-summary">{{convertUtf8($bs->approach_subtitle)}}</h2>
                 @if (!empty($bs->approach_button_url) && !empty($bs->approach_button_text))
                 <a href="{{$bs->approach_button_url}}" class="boxed-btn" target="_blank"><span>{{convertUtf8($bs->approach_button_text)}}</span></a>
                 @endif
              </div>
           </div>
           <div class="col-lg-6">
              <ul class="approach-lists">
                 @foreach ($points as $key => $point)
                   <li class="single-approach">
                      <div class="approach-icon-wrapper"><i class="{{$point->icon}}"></i></div>
                      <div class="approach-text">
                         <h4>{{convertUtf8($point->title)}}</h4>
                         <p>{{convertUtf8($point->short_text)}}</p>
                      </div>
                   </li>
                 @endforeach
              </ul>
           </div>
        </div>
     </div>
  </div>
  <!--   how we do section end   -->
  @endif


  @if ($bs->statistics_section == 1)
  <!--    statistics section start    -->
  <div class="statistics-section @if($bs->home_version != 'parallax') statistics-bg @endif" id="statisticsSection" @if($bs->home_version == 'parallax') data-parallax="scroll" data-speed="0.2" data-image-src="{{asset('assets/front/img/statistic_bg.jpg')}}" @endif>
     <div class="statistics-container">
        <div class="container">
           <div class="row no-gutters">
             @foreach ($statistics as $key => $statistic)
               <div class="col-lg-3 col-md-6">
                  <div class="round"
                     data-value="1"
                     data-number="{{convertUtf8($statistic->quantity)}}"
                     data-size="200"
                     data-thickness="6"
                     data-fill="{
                     &quot;color&quot;: &quot;#{{$bs->base_color}}&quot;
                     }">
                     <strong></strong>
                     <h5><i class="{{$statistic->icon}}"></i> {{convertUtf8($statistic->title)}}</h5>
                  </div>
               </div>
             @endforeach
           </div>
        </div>
     </div>
     <div class="statistic-overlay"></div>
  </div>
  <!--    statistics section end    -->
  @endif


  @if ($bs->portfolio_section == 1)
  <!--    case section start   -->
  <div class="case-section">
     <div class="container">
        <div class="row text-center">
           <div class="col-lg-6 offset-lg-3">
              <span class="section-title">{{convertUtf8($bs->portfolio_section_title)}}</span>
              <h2 class="section-summary">{{convertUtf8($bs->portfolio_section_text)}}</h2>
           </div>
        </div>
     </div>
     <div class="container-fluid">
        <div class="row">
           <div class="col-md-12">
              <div class="case-carousel owl-carousel owl-theme">
                 @foreach ($portfolios as $key => $portfolio)
                   <div class="single-case single-case-bg-1" style="background-image: url('{{asset('assets/front/img/portfolios/featured/'.$portfolio->featured_image)}}');">
                      <div class="outer-container">
                         <div class="inner-container">
                            <h4>{{convertUtf8(strlen($portfolio->title)) > 36 ? convertUtf8(substr($portfolio->title, 0, 36)) . '...' : convertUtf8($portfolio->title)}}</h4>
                            @if (!empty($portfolio->service))
                            <p>{{convertUtf8($portfolio->service->title)}}</p>
                            @endif

                            <a href="{{route('front.portfoliodetails', [$portfolio->slug, $portfolio->id])}}" class="readmore-btn"><span>{{__('Read More')}}</span></a>

                         </div>
                      </div>
                   </div>
                 @endforeach
              </div>
           </div>
        </div>
     </div>
  </div>
  <!--    case section end   -->
  @endif


  @if ($bs->testimonial_section == 1)
  <!--   Testimonial section start    -->
  <div class="testimonial-section pb-115">
     <div class="container">
        <div class="row text-center">
           <div class="col-lg-6 offset-lg-3">
              <span class="section-title">{{convertUtf8($bs->testimonial_title)}}</span>
              <h2 class="section-summary">{{convertUtf8($bs->testimonial_subtitle)}}</h2>
           </div>
        </div>
        <div class="row">
           <div class="col-md-12">
              <div class="testimonial-carousel owl-carousel owl-theme">
                 @foreach ($testimonials as $key => $testimonial)
                   <div class="single-testimonial">
                      <div class="img-wrapper"><img src="{{asset('assets/front/img/testimonials/'.$testimonial->image)}}" alt=""></div>
                      <div class="client-desc">
                         <p class="comment">{{convertUtf8($testimonial->comment)}}</p>
                         <h6 class="name">{{convertUtf8($testimonial->name)}}</h6>
                         <p class="rank">{{convertUtf8($testimonial->rank)}}</p>
                      </div>
                   </div>
                 @endforeach
              </div>
           </div>
        </div>
     </div>
  </div>
  <!--   Testimonial section end    -->
  @endif


  @if ($bs->team_section == 1)
  <!--    team section start   -->
  <div class="team-section section-padding" @if($bs->home_version != 'parallax') style="background-image: url('{{asset('assets/front/img/'.$bs->team_bg)}}'); background-size:cover;" @endif @if($bs->home_version == 'parallax') data-parallax="scroll" data-speed="0.2" data-image-src="{{asset('assets/front/img/'.$bs->team_bg)}}" @endif>
     <div class="team-content">
        <div class="container">
           <div class="row text-center">
              <div class="col-lg-6 offset-lg-3">
                 <span class="section-title">{{convertUtf8($bs->team_section_title)}}</span>
                 <h2 class="section-summary">{{convertUtf8($bs->team_section_subtitle)}}</h2>
              </div>
           </div>
           <div class="row">
              <div class="team-carousel common-carousel owl-carousel owl-theme">
                @foreach ($members as $key => $member)
                 <div class="single-team-member">
                    <div class="team-img-wrapper">
                       <img src="{{asset('assets/front/img/members/'.$member->image)}}" alt="">
                       <div class="social-accounts">
                          <ul class="social-account-lists">
                             @if (!empty($member->facebook))
                               <li class="single-social-account"><a href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                             @endif
                             @if (!empty($member->twitter))
                               <li class="single-social-account"><a href="{{$member->twitter}}"><i class="fab fa-twitter"></i></a></li>
                             @endif
                             @if (!empty($member->linkedin))
                               <li class="single-social-account"><a href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                             @endif
                             @if (!empty($member->instagram))
                               <li class="single-social-account"><a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a></li>
                             @endif
                          </ul>
                       </div>
                    </div>
                    <div class="member-info">
                       <h5 class="member-name">{{convertUtf8($member->name)}}</h5>
                       <small>{{convertUtf8($member->rank)}}</small>
                    </div>
                 </div>
                @endforeach
              </div>
           </div>
        </div>
     </div>
     <div class="team-overlay"></div>
  </div>
  <!--    team section end   -->
  @endif


  @if ($be->pricing_section == 1)
  <!-- pricing begin -->
  <div class="pricing-tables">
     <div class="container">
       <div class="row text-center">
          <div class="col-lg-6 offset-lg-3">
             <span class="section-title">{{convertUtf8($be->pricing_title)}}</span>
             <h2 class="section-summary">{{convertUtf8($be->pricing_subtitle)}}</h2>
          </div>
       </div>
        <div class="pricing-carousel common-carousel owl-carousel owl-theme">
          @foreach ($packages as $key => $package)
            <div class="single-pricing-table">
               <span class="title">{{convertUtf8($package->title)}}</span>
               <div class="price">
                  <h1>{{$package->currency}}{{$package->price}}</h1>
               </div>
               <div class="features">
                  {!! convertUtf8($package->description) !!}
               </div>

               <a href="{{route('front.packageorder.index', $package->id)}}" class="pricing-btn">{{__('Place Order')}}</a>

            </div>
          @endforeach
        </div>
     </div>
  </div>
  <!-- pricing end -->
  @endif



  @if ($bs->news_section == 1)
  <!--    blog section start   -->
  <div class="blog-section section-padding">
     <div class="container">
        <div class="row text-center">
           <div class="col-lg-6 offset-lg-3">
              <span class="section-title">{{convertUtf8($bs->blog_section_title)}}</span>
              <h2 class="section-summary">{{convertUtf8($bs->blog_section_subtitle)}}</h2>
           </div>
        </div>
        <div class="blog-carousel owl-carousel owl-theme common-carousel">
           @foreach ($blogs as $key => $blog)
              <div class="single-blog">
                 <div class="blog-img-wrapper">
                    <img src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="">
                 </div>
                 <div class="blog-txt">
                    @php
                        $blogDate = \Carbon\Carbon::parse($blog->created_at)->locale("$currentLang->code");
                        $blogDate = $blogDate->translatedFormat('jS F, Y');
                    @endphp

                    <p class="date"><small>{{__('By')}} <span class="username">{{__('Admin')}}</span></small> | <small>{{$blogDate}}</small> </p>

                    <h4 class="blog-title"><a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}">{{convertUtf8(strlen($blog->title)) > 40 ? convertUtf8(substr($blog->title, 0, 40)) . '...' : convertUtf8($blog->title)}}</a></h4>


                    <p class="blog-summary">{!! convertUtf8(strlen(strip_tags($blog->content)) > 100) ? convertUtf8(substr(strip_tags($blog->content), 0, 100)) . '...' : convertUtf8(strip_tags($blog->content)) !!}</p>


                    <a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}" class="readmore-btn"><span>{{__('Read More')}}</span></a>

                 </div>
              </div>
           @endforeach
        </div>
     </div>
  </div>
  <!--    blog section end   -->
  @endif


  @if ($bs->call_to_action_section == 1)
  <!--    call to action section start    -->
  <div class="cta-section" style="background-image: url('{{asset('assets/front/img/'.$bs->cta_bg)}}')">
     <div class="container">
        <div class="cta-content">
           <div class="row">
              <div class="col-md-9 col-lg-7">
                 <h3>{{convertUtf8($bs->cta_section_text)}}</h3>
              </div>
              <div class="col-md-3 col-lg-5 contact-btn-wrapper">
                 <a href="{{$bs->cta_section_button_url}}" class="boxed-btn contact-btn"><span>{{convertUtf8($bs->cta_section_button_text)}}</span></a>
              </div>
           </div>
        </div>
     </div>
     <div class="cta-overlay"></div>
  </div>
  <!--    call to action section end    -->
  @endif


  @if ($bs->partner_section == 1)
  <!--   partner section start    -->
  <div class="partner-section">
     <div class="container top-border">
        <div class="row">
           <div class="col-md-12">
              <div class="partner-carousel owl-carousel owl-theme common-carousel">
                 @foreach ($partners as $key => $partner)
                   <a class="single-partner-item d-block" href="{{$partner->url}}" target="_blank">
                      <div class="outer-container">
                         <div class="inner-container">
                            <img src="{{asset('assets/front/img/partners/'.$partner->image)}}" alt="">
                         </div>
                      </div>
                   </a>
                 @endforeach
              </div>
           </div>
        </div>
     </div>
  </div>
  <!--   partner section end    -->
  @endif

@endsection

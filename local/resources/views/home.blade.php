@include('include.header')
@php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$url,$jdate;
$pdf = 'pdf_'.$lang;
@endphp
<style>
.ui.fluid.card {
  border:0 !important;
}
.ui.centered.container.grid {
  padding:0 !important;
}
#carousel_div {
  position: relative;
}
#carousel_div #carousel_text_div {
  position: absolute;
  bottom: 0;
  right: 0;
  padding-bottom: 2.8em;
}
</style>
  {{-- main content starts --}}
    {{-- carousel starts --}}
    <div class="ui stackable segment masthead" style="background-color:#dfdfdf;margin-top:0;">
      <div class="owl-carousel" style="">
        @if(sizeof($news)!=0)
          @foreach($news as $value)
            @if($value->$title!=null)
              <div class="item">
                <div class="ui stackable container grid" id="carousel_div">
                  <div class="sixteen wide mobile tablet ten wide computer column" id="carousel_image_div" >
                    <div class="carousel_thumbnail">
                      <img style="" src="{{asset('uploads/media/news/'.$value->image)}}" alt="">
                    </div>
                  </div>
                  <div class="sixteen wide mobile tablet six wide computer column" id="carousel_text_div" style="">
                    <blockquote style="">
                      <a href="{{url('news_details/'.$value->id)}}" class="ui header title_font news_title" id="carousel_title" style="display:block">{{$value->$title}}</a>
                      <p class="body_font " style="color:#888;font-size:14px;" dir=""><i class="icon time"></i>
                        {{$jdate->detailedDate($value->$date,$lang)}}</p>
                      <div style="font-size:17px;" class="body_font carousel_text">{{$value->$short_desc}}</div>
                      <a class="body_font" href="{{url('news_details/'.$value->id)}}" style="color:#888;font-size:14px;float:{{$indir}}">{{trans('home.read_more')}}</a>
                    </blockquote>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        @else
          <div class="item">
            <div class="ui stackable container grid" id="carousel_div">
              <div class="sixteen wide mobile tablet ten wide computer column" id="carousel_image_div">
                <div class="carousel_thumbnail">
                  <h1 class="ui header">Please Enter Data from CMS</h1>
                </div>

              </div>
              <div class="sixteen wide mobile tablet six wide computer column" id="carousel_text_div" style="position: relative;max-height: 310px !important">
              </div>
            </div>
          </div>
      @endif


      </div>
    </div>
    {{-- carousel ends --}}
    {{-- president words, articles latest news starts --}}
    <div class="ui segment" style="margin-top:0;">
      <div class="ui centered container grid" id="main_div" style="display: flex">
        <div class="sixteen wide tablet mobile four wide computer column"  id="president_word">
          <div class="ui fluid card" style="">
            <div class="content" style="border:0;!">
              <a href="{{route('words')}}" class="header title_font test" style="">{{trans('home.president_word')}}</a>
                @if (sizeof($word)!=0)
                  <div class="image" style="margin-top:21px;">
                    <img style="width:100%;" src="{{asset('uploads/word/'.$word->image_thumb)}}" alt="">
                  </div>
                  <div class="description body_font" style="text-align:justify;margin-top:10px;direction: {{$rtl}}">{{$word->$title}}</div>
                @endif
            </div>
          </div>
        </div>
        <div class="sixteen wide tablet mobile seven wide computer column" id="latest_news">
          <div class="ui fluid card" style="">
            <div class="content" >
              <a href="{{route('news')}}" class="header title_font test">{{trans('home.latest_news')}}</a>
              <div class="ui items">
                @if(sizeof($lattest_news)!=0)
                  @foreach($lattest_news as $item)
                  <?php $url =  ($item->table_name=='documents')?asset('uploads/documents_'.$lang.'/'.$item->table_id.'.pdf'):'';?>
                    @if($item->$title!=null)
                      <div class="news {{($item == $lattest_news->last())?'no_borders':''}}" style="border-bottom:1px dashed #ddd;padding-bottom:10px;">
                        <div class="ui grid" style="display:flex;margin:0 !important;">
                          <div class="sixteen wide mobile tablet eleven wide computer column" id="news_title" style="padding-top:0;">
                            <a href="{{($item->table_name=='documents')?$url:url($item->type.'_details/'.$item->table_id)}}" class="ui {{$dir}} floated small header title_font title_to_be_trimmed" dir="rtl" style="margin:0">{{$item->$title}}</a>
                            <p class="meta" style="clear: both">
                              <i class="icon clock">
                              </i>{{$jdate->detailedDate($item->$date,$lang)}}
                            </p>
                          </div>
                          <div class="sixteen wide mobile tablet five wide computer column thumbnail" id="news_image" style="">
                            <img style="float:right;" class="" src="{{($item->table_name=='documents')?asset('assets/img/pdf.png'):asset($item->image_thumb)}}" alt="">
                          </div>
                        </div>
                        <div class="description body_font short_desc_to_be_trimmed" style="clear:both;">
                          {{$item->$short_desc}}
                        </div>
                        <div class="" style="padding-bottom:15px;">
                          <a href="{{($item->table_name=='documents')?$url:url($item->type.'_details/'.$item->table_id)}}" class="meta body_font" style="float:left;">{{trans('home.read_more')}}</a>
                        </div>

                      </div>
                    @endif
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="sixteen wide tablet mobile five wide computer column" id="articles">
          <div class="ui fluid card" style="">
            <div class="content" >
              <a href="{{route('articles')}}" class="header title_font test" style="">{{trans('home.articles')}}</a>
              <div class="ui items" style="margin-top:11px;">
              @if (sizeof($articles)!=0)
                @foreach($articles as $item)

                 @if ($item->$title!=null)
                   <div class="article {{($item == $articles->last())?'no_borders':''}}" style="border-bottom:1px dashed #ddd;padding-bottom:10px;">
                     <div class="ui grid" style="display:flex;margin:0 !important;">
                       <div class="sixteen wide mobile tablet nine wide computer column" id="article_title" style="padding-top:0;">
                         <a href="{{url('article_details/'.$item->id)}}" class="ui {{$dir}} floated small header title_font title_to_be_trimmed" dir="rtl" style="margin:0">{{$item->$title}}</a>
                         <p class="meta">
                           <i class="icon clock">
                           </i>{{$jdate->detailedDate($item->$date,$lang)}}
                         </p>
                       </div>
                       <div class="sixteen wide mobile tablet seven wide computer column thumbnail" id="article_image" style="">
                         <img style="float:right;" class="" src="{{asset('uploads/media/article/'.$item->image_thumb)}}" alt="">
                       </div>
                     </div>

                   </div>

                 @endif
               @endforeach
              @endif
                {{--
                @foreach($articles as $value)
                <div class="latest_articles">
                  <a href="{{url('news_details/'.$value->id)}}" class="ui small header title_font" style="display:block;padding-right:10px;">{{$value->$title}}</a>
                  <a href="{{url('news_details/'.$value->id)}}" class="meta body_font" style="float:{{$indir}}">{{$value->$date}}</a>
                </div>
                @endforeach --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- president words, articles latest news ends --}}

    {{-- social boxes, reports, video gallery starts--}}
    <div class="ui segment" id="social_segment">
      <div class="ui centered container grid" id="second_div" style="display: flex;">
        <div class="sixteen wide tablet mobile four wide computer column" id="social_div">
          <div class="ui fluid card" style="">
            <div class="content">
              <div class="ui stackable centered grid" style="margin-top:42px;">
                <div class="row" style="margin:10px;">
                  <div class="fb-page" data-href="https://www.facebook.com/ocs.afg/"  data-width="500" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ocs.afg/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ocs.afg/">‎ریاست عمومی دفتر مقام عالی ریاست جمهوری‎</a></blockquote></div>
                </div>
                <div class="row" style="margin:10px;">
                <a class="twitter-timeline" data-width="300" data-chrome="nofooter" data-height="200" href="https://twitter.com/OCS_AFG?ref_src=twsrc%5Etfw">Tweets by OCS_AFG</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="sixteen wide tablet mobile seven wide computer column" id="documents">
          <div class="ui fluid card" style="">
            <div class="content" >
              <a href="{{route('documents')}}" class="header title_font test" style="">{{trans('home.reports_and_documents')}}</a>
              <div class="ui items" style="margin-top: 11px !important">
                @if(sizeof($documents)!=0)
                  @foreach($documents as $document)
                    @if($document->$title!=null)
                      <div class="item {{($document==$documents->last())?'no_border':''}}" style="direction:{{$rtl}};border-bottom: 1px dashed #ddd;padding-bottom: 10px;">
                        <div class="ui tiny image icon" style="width: 12%">
                          <a target="_blank" href="{{asset('uploads/documents_'.$lang.'/'.$document->$pdf)}}">
                          <img id="pdf_img" src="{{asset('assets/img/pdf.png')}}">
                          </a>
                        </div>
                        <div class="top aligned content docs" style="padding-top: 7px;">
                          <a class="ui {{$dir}} floated small header title_font" target="_blank" href="{{asset('uploads/documents_'.$lang.'/'.$document->$pdf)}}" style="">{{$document->$title}}</a>
                          <div class="meta body_font" style="clear:both;" dir="rtl">

                            <i class="icon time"></i>
                            {{$jdate->detailedDate($document->$date,$lang)}}</div>
                        </div>
                      </div>
                    @endif
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="sixteen wide tablet mobile five wide computer column" id="videos">
          <div class="ui fluid card" style="">
            <div class="content" style="border:0;!">
              <a href="{{route('videos')}}" class="header title_font test" style="">{{trans('home.videos')}}</a>
              <div class="ui stackable grid" style="margin-top:11px;">
                @if (sizeof($videos))
                  @foreach($videos as $video)
                    @if($video->$title!=null)
                      <div class="row" style="">
                        <div class="column">
                          <div class="image"><iframe width="100%"  src="https://www.youtube.com/embed/{{$video->$url}}" frameborder="0" allowfullscreen></iframe></div>
                          <a href="{{url('video_details/'.$video->id)}}" class="ui small header title_font" style="margin:0;padding:0;width:100%;">{{$video->$title}}</a>
                          <div class="meta body_font" dir="" style="">
                            <i class="icon time"></i>
                            {{$jdate->detailedDate($video->$date,$lang)}}</div>
                        </div>
                      </div>
                    @endif
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- social boxes, reports, video gallery ends--}}
   @include('include.footer')

   <script>



      $(document).ready(function(){
        var width = $(window).width();
        if(width<=450){
          $(".news_image").removeClass('thumbnail');
          $(".news_image").addClass('image');

          $(".article_image").removeClass('thumbnail');
          $(".article_image").addClass('image');
        }
      });

   </script>

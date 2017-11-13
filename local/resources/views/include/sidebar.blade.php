
<div class="sixteen wide tablet mobile five wide computer column" >
  <div class="ui fluid card" style="">
    <div class="content" style="border:0;!">
      <div class="header title_font test" style="text-align:{{$dir}};margin-bottom:11px;padding-left:0;font-size: 25px !important;">
      {{trans('home.president_word')}}
    </div>
      @if (sizeof($word->$title)!=0)
        <div class="image"><img style="width:100%;" src="{{asset('uploads/word/'.$word->image)}}" alt=""></div>
        <div class="description body_font" style="text-align:justify;margin-top:10px;padding-bottom:10px;" dir="rtl">{{$word->$title}}</div>
      @endif
    </div>
  </div>
  <div class="ui fluid card">
    <div class="content">
      <div class="header title_font test" style="text-align:{{$dir}};margin-bottom:11px;">
      {{trans('home.latest_news')}}
    </div>
      @if (sizeof($news)!=0)
        @foreach($news as $item)
          @php
          if(sizeof($item->$title)==0)
            continue;
          @endphp

          <div class="latest_articles {{($item==$news->last())?'no_border':''}}" style="padding:3px 0px;">
            <a href="{{url('news_details/'.$item->id)}}" class="ui tiny header title_font" dir="rtl" style="text-align:{{$dir}};display: block;margin-bottom:0;">{{$item->$title}}</a>
            <div class="meta body_font" style="text-align:{{$dir}};" dir="rtl">
              <i class="icon clock"></i>
              {{$jdate->detailedDate($item->$date,$lang)}}</div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
  <div class="ui fluid card" style="">
    <div class="content fb">
     <div class="fb-page" data-href="https://www.facebook.com/{{($lang=='en')?'AFG.OCS':'ocs.afg'}}/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/{{($lang=='en')?'AFG.OCS':'ocs.afg'}}/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/{{($lang=='en')?'AFG.OCS':'ocs.afg'}}/">‎ریاست عمومی دفتر مقام عالی ریاست جمهوری‎</a></blockquote></div>
    </div>
  </div>
  <div class="ui fluid card" style="">
    <div class="row" style="margin:10px;">
     <a class="twitter-timeline" data-width="300" data-chrome="nofooter" data-height="200" href="https://twitter.com/OCS_AFG?ref_src=twsrc%5Etfw">Tweets by OCS_AFG</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </div>
</div>

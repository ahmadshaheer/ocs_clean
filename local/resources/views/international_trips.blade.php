@include('include.header')
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
?>
  {{-- main content starts --}}
  <style>
  .ui.fluid.card {
    border:1px solid #ddd;
    margin-bottom:10px;
  }
  .ui.items > .item {
    border-bottom: 1px dashed #ddd;
    padding-bottom: 10px;
    direction:{{$rtl}} !important;
  }
  .ui.items {
    direction:rtl;
    float: right;
    text-align: right;
  }
  </style>
    {{-- left sidebar president word and social boxes start --}}

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        @include('include.sidebar')
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="">
            <div class="content">
              <h2 class="ui header title_font border">{{trans('menu.international_trips')}}</h2>
              <div class="ui items" style="">
                 @foreach($international as $value)
                   @php
                   if(sizeof($value->$title)==0)
                     continue;
                   @endphp
                <div class="ui item {{($value == $international->last())?'no_border':''}}">
                  <div class="other_pages_thumbnail">
                    <img src="{{asset('uploads/international/'.$value->image)}}" style="padding-left:8px;">
                  </div>
                  <div class="content">
                    <a href="{{url('international_trip_details/'.$value->id)}}" class="ui small header title_font">{{$value->$title}}</a>
                    <div class="meta">
                      <span class="" dir="">{{$jdate->detailedDate($value->$date,$lang)}}</span>
                    </div>
                    <div class=" description ">
                      <p class="body_font">{{$word->$short_desc}}</p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
             {{-- Pagination start --}}
                    <div class="ui centered grid">
                      {{$international->links()}}
                    </div>
               {{-- Pagination End --}}
          </div>
        </div>

      </div>
    </div>
    {{-- left sidebar president word and social boxes end --}}

@include('include.footer')

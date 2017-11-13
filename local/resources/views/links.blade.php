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
              <h2 class="ui header title_font border">{{trans('menu.links')}}</h2>
              <div class="ui items" style="width:100%;">
                @foreach($links as $item)
                  @php
                  if(sizeof($item->$title)==0)
                    continue;
                  @endphp
                  <div class="ui item {{($item==$links->last())?'no_border':''}}">
                    <a href="{{$item->url}}">
                      <div class="other_pages_thumbnail">
                        <img src="{{url('uploads/links/'.$item->image)}}" alt="" style="width: 100% !important">
                      </div>
                    </a>
                    <div class="content">
                      <a href="{{$item->url}}" target="_blank" class="ui header title_font">{{$item->$title}}</a>
                      <div class="description body_font">{{$item->$description}}</div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
             {{-- Pagination start --}}
                    <div class="ui centered grid">
                      {{$links->links()}}
                    </div>
               {{-- Pagination End --}}
          </div>
        </div>

      </div>
    </div>
    {{-- left sidebar president word and social boxes end --}}

@include('include.footer')

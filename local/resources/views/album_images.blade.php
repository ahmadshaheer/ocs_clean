@include('include.header')
<?php
global $lang,$dir,$indir,$rtl,$ltr,$title,$date,$short_desc,$description,$jdate;
?>
<link rel="stylesheet" href="{{asset('assets/css/lightbox.min.css')}}">
  {{-- main content starts --}}
  <style>
  .ui.fluid.card {
    border:1px solid #ddd;
    margin-bottom:10px;
  }
  .ui.card .meta>a {
    direction: {{$rtl}};
    float: {{$dir}};
  }
  .card img{
    height: 112px !important;
    border: 0;
    border-radius: 0 !important;
  }
  .card {
    border: 5px solid #cecece !important;
    border-radius:0 !important;
    box-shadow: none !important;
  }
  </style>

    <div class="ui segment">
      <div class="ui centered container grid" id="main" style="display: flex">
        @include('include.sidebar')
        {{-- page content --}}
        <div class="sixteen wide tablet mobile eleven wide computer column">
          <div class="ui fluid card" style="">
            <div class="content">
              <h2 class="ui header title_font border">{{trans('menu.image')}}</h2>
              <div class="ui three doubling stackable cards">
                @foreach($images as $image)
                <div class="card">
                  <a href="{{asset('uploads/albumImage/'.$image->image)}}" class="image example-image-link" data-lightbox="test" data-title="">
                    <img class="example-image" src="{{asset('uploads/albumImage/'.$image->image)}}">
                  </a>
                </div>
                @endforeach
                {{--
                <section>
                 <h3>A Four Image Set</h3>
                 <div>
                   <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt=""/></a>
                   <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-4.jpg" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" /></a>
                   <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-5.jpg" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-5.jpg" alt="" /></a>
                   <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-6.jpg" data-lightbox="example-set" data-title="Click anywhere outside the image or the X to the right to close."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-6.jpg" alt="" /></a>
                 </div>
               </section>

                 --}}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

@include('include.footer')
<script src="{{asset('assets/js/lightbox.min.js')}}"></script>
<script>


</script>

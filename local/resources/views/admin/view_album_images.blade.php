@include('admin.include.header')

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">Album Images</h2>
        </div>
        <div class="ui cards" style="padding-top:10px">
    @foreach($images as $image)
              <div class="card">
                <div class="image">
                  <img src="{{asset('uploads/albumImage/'.$image->image)}}">
                </div>
                
                  <p class="header">{{$image->title_en}}</p>
                
              </div>
 @endforeach
 </div>
 <div class="container">
   <a class="ui button" href="{{URL::previous()}}" style="float:right;margin-right: 22%;">
  Cancel
</a>
 </div>
</div>
</section>

@include('admin.include.footer')

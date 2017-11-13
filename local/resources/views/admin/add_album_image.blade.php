@include('admin.include.header')
<style>
    .file {
      visibility: hidden;
      position: absolute;
    }


</style>
<!--main content start-->
<section id="main-content">
<section class="wrapper">
        <div class="col-md-11">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Image to album
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="{{url('admin/album/image/'.$id.'/'.$number)}}" enctype="multipart/form-data">
                                @for($i=0; $i<$number; $i++)
                                    <div class="form-group ">
                                        <label for="title{{$i}}" class="control-label col-lg-3">Title</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title{{$i}}" maxlength="150" name="title{{$i}}" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="title_dr{{$i}}" class="control-label col-lg-3">Title Dari</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title_dr{{$i}}" maxlength="150" name="title_dr{{$i}}" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="title_pa{{$i}}" class="control-label col-lg-3">Title Pashto</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="title_pa{{$i}}" maxlength="150" name="title_pa{{$i}}" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="image{{$i}}" class="control-label col-lg-3">Image</label>
                                        <input type="file" name="image{{$i}}" class="file">
                                        <div class="input-group col-md-6 col-md-offset-3 col-xs-12" style="padding-left:15px; padding-right:14px;">
                                          <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                                          <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                          <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-folder-open"></i> Browse</button>
                                          </span>
                                        </div>
                                    </div>
                                 @endfor
                                    {{csrf_field()}}

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="{{url()->previous()}}" class="btn btn-default"  type="button">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
        </div>

</section>

@include('admin.include.footer')
<script>
    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });
    $(document).on('change', '.file', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
</script>
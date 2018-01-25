@include('admin.include.header')
<?php $session = Session::get('lang'); ?>
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
                            Add Media Directorate Description
                        </header>
                        <div class="panel-body">
                            @if($errors->any())
                              <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                                @endforeach
                              </ul>
                            @endif
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="{{route('media_directorate.store')}}" enctype="multipart/form-data">
                                @if($session=='en')
                                      <div class="form-group ">
                                        <label for="desc_en" class="control-label col-lg-3">Description English</label>
                                        <div class="col-lg-9">
                                            <textarea name="desc_en" value="{{old('desc_en')}}" class="form-control format"></textarea>
                                        </div>
                                    </div>
                                    @elseif($session=='dr')
                                     <div class="form-group ">
                                        <label for="desc_dr" class="control-label col-lg-3">Description Dari</label>
                                        <div class="col-lg-9">
<<<<<<< HEAD
                                            <textarea name="desc_dr" value="{{old('desc_dr')}}" class="form-control format"></textarea>
=======
                                            <textarea name="desc_dr rtl" class="form-control format"></textarea>
>>>>>>> 5eca33ae590378911d6ea862350fa1380a487053
                                        </div>
                                    </div>
                                    @else
                                     <div class="form-group ">
                                        <label for="desc_pa" class="control-label col-lg-3">Description Pashto</label>
                                        <div class="col-lg-9">
<<<<<<< HEAD
                                            <textarea name="desc_pa" value="{{old('desc_pa')}}" class="form-control format"></textarea>
=======
                                            <textarea name="desc_pa" class="form-control format rtl"></textarea>
>>>>>>> 5eca33ae590378911d6ea862350fa1380a487053
                                        </div>
                                    </div>
                                    @endif
                                    {{csrf_field()}}

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" onclick="go()" type="">Save</button>
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

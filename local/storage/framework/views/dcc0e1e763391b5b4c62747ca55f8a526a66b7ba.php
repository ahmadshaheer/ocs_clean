<!-- footer -->
          <div class="footer">
            <div class="wthree-copyright">
              <p>© 2017 OCS</p>
            </div>
          </div>
  <!-- / footer -->
<!--main content end-->
</section>
<script src="<?php echo e(asset('assets/admin-asset/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/semantic.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin-asset/js/persian-datepicker-0.4.5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin-asset/js/persian-date.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin-asset/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>


<script src="<?php echo e(asset('assets/admin-asset/js/scripts.js')); ?>"></script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo e(asset('assets/admin-asset/js/jquery.scrollTo.js')); ?>"></script>
<!-- morris JavaScript -->
<script type="text/javascript">
    function confirm_submit(){
        var agree = confirm('Are you sure want to delete this record');
        if(agree){
           return true;
        }
        else{
            return false;
        }
    }

    $(document).ready(function() {
       $(".date_dr").pDatepicker({
        format : "YYYY - MM - DD"
      });
    });

    $(document).ready(function() {
      $(window).keydown(function(event){
        if( (event.keyCode == 13) && (validationFunction() == false) ) {
          event.preventDefault();
          return false;
        }
      });
      $('.ui.dropdown').dropdown();
    });

    $('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;
</script>
<script src="<?php echo e(asset('assets/js/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
    <script>
    var editor_config = {
      path_absolute : "<?php echo e(URL::to('/')); ?>/",
      selector: ".format",
      menubar:true,
      height: 500,
      statusbar: false,
      plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
      ],
      fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
      toolbar: "insertfile undo redo | fontsizeselect |  styleselect | bold italic | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent | link image media | table",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
              cmsURL = cmsURL + "&type=Images";
          } else {
              cmsURL = cmsURL + "&type=Files";
          }
          tinyMCE.activeEditor.windowManager.open({
              file : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no"
          });
      }
  };
  tinymce.init(editor_config);
 //  tinymce.init({
 //  selector: '.format',
 //  height: 500,
 //  theme: 'modern',
 //  plugins: [
 //          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
 //          "searchreplace wordcount visualblocks visualchars code fullscreen",
 //          "insertdatetime media nonbreaking save table contextmenu directionality",
 //          "emoticons template paste textcolor colorpicker textpattern"
 //      ],
 //  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | table',
 //  image_advtab: true,
 //  templates: [
 //    { title: 'Test template 1', content: 'Test 1' },
 //    { title: 'Test template 2', content: 'Test 2' }
 //  ],
 //  content_css: [
 //    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
 //    '//www.tinymce.com/css/codepen.min.css'
 //  ]
 // });



    </script>
</body>
</html>
</div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<div id="footer">
        <p>Bản quyền thuộc về tungvu90@gmail.com</p>
    </div>
</div>
<!-- /#wrapper -->
<!-- Large modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">File Manager</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <iframe src="../filemanager/dialog.php?type=1&field_id=imageFile"></iframe>
    </div>
  </div>
</div> -->
<!-- Modal -->
<!-- <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">File Manager</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-content">
      <div class="modal-body">
        <iframe src="../filemanager/dialog.php?type=1&field_id=imageFile"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">File Manager</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <iframe src="../filemanager/dialog.php?type=1&field_id=imageFile" style="width: 100%;height: 500px;"></iframe>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


    <!-- jQuery -->    
    <!-- <script type="text/javascript" src="../ckeditor/ckeditor.js"></script> -->
    <!-- <script type="text/javascript" src="../ckfinder/ckfinder.js"></script> -->
    <script type="text/javascript">
      // CKEDITOR.replace('noidung');
    </script>
    <!-- <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"> -->
    <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
    <script type="text/javascript">
      // $(function () {  
      //    $("#datepicker").datepicker({         
      //        autoclose: true,         
      //        todayHighlight: true 
      //    }).datepicker('update', new Date());
      //    'use strict';
      //       var nowTemp = new Date();
      //       var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

      //       var checkin = $('#ngaydang_edit').datepicker({
      //           onRender: function (date) {
      //               return date.valueOf() < now.valueOf() ? 'disabled' : '';
      //           }
      //       }).data('datepicker');            
      // });
    </script>     
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../tinymce/tinymce.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Morris Charts JavaScript -->
    <!-- <script src="../js/plugins/morris/raphael.min.js"></script> -->
    <!-- <script src="../js/plugins/morris/morris.min.js"></script> -->
    <!-- <script src="../js/plugins/morris/morris-data.js"></script> -->

</body>

</html>
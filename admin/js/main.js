var host = window.location.href; //backend
host = host.split("admin");

tinymce.init({
    selector: "textarea",theme: "modern",width: 800,height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   filemanager_title:"Quản lý dữ liệu",
    // filemanager_crossdomain: true,
    external_filemanager_path: host[0]+"filemanager/",
    external_plugins: { "filemanager" : host[0]+"filemanager/plugin.min.js"},
  
   image_advtab: true,
 });
$(document).ready(function() {
  $('#imageFile').click(function(event) {
    $("#myModal").modal();
    // alert('asdada');
  });
});
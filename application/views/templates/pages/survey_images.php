<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('templates/common/head');?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('templates/common/navbar');?>
  <?php $this->load->view('templates/common/mainsidebar');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $pagetitle;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $pagetitle;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <h5 class="mb-2"><?php echo $pagetitle;?></h5>
        <div class="card card-success">
          <div class="card-body">
            <div class="row" id="surveyimages">

            </div>
            <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-4">
              <div class="card mb-2 bg-gradient-dark">
                <img id="testyo" class="card-img-top" src="/assets/padinet/logo/logo_gold1.png" alt="Dist Photo 1">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">set</h5>
                  <p class="card-text text-white pb-2 pt-1">desk</p>
                  <a href="#" class="text-white">test</a>
                </div>
              </div>
              <button class="btn btn-block btn-primary saveImage" id="btnSavetest">Simpan</button>'
              </div>

            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('templates/common/footer');?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php $this->load->view('templates/common/widgetscripts');?>
<script src="/assets/padinet/images.js"></script>
<script>
  $.fn.stairUp = function(options){
    var settings = $.extend({
      level:1
    },options)
    out = $(this)
    for(i=0;i<settings.level;i++){
      out = out.parent();
    }
    return out;
  }
  showImage = obj => {
    str = '<div class="col-md-12 col-lg-6 col-xl-4">'
    str+= ' <div class="card mb-2 bg-gradient-dark">'
    str+= '   <img class="card-img-top gbr" src="'+obj.img+'" alt="Dist Photo 1">'
    str+= '   <div class="card-img-overlay d-flex flex-column justify-content-end">'
    str+= '     <h5 class="card-title text-primary text-white">Survey_site_id</h5>'
    str+= '     <p class="card-text text-white pb-2 pt-1">'+obj.description+'</p>'
    str+= '     <a href="#" class="text-white survey_site_id" imageid='+obj.id+'>'+obj.survey_site_id+'</a>'
    str+= '   </div>'
    str+= ' </div>'
    str+= ' <button class="btn btn-block btn-primary saveImage">Simpan</button>'
    str+= '</div>'
    return str;
  }
  $.ajax({
    url:'/surveys/getimages',
    dataType:'json'
  })
  .done(res=>{
    console.log('Res',res)
    res.forEach(obj=>{
      console.log('ID',obj.id)
      $('#surveyimages').append(showImage(obj))
    })
  })
  .fail(err=>{
    console.log('Err',err)
  })
  $('#surveyimages').on('click','.saveImage',function(){
    img = $(this).stairUp({level:1}).find('.gbr')
    surveysite = $(this).stairUp({level:1}).find('.survey_site_id')
    surveysiteid = surveysite.text()
    imgid = surveysite.attr('imageid')
    imgsrc = img[0].src
    console.log('IMG',surveysiteid)
    $.ajax({
      url:'/surveys/save_image',
      type:'post',
      dataType:'json',
      data:{image:imgsrc,imagename:surveysiteid+'-'+imgid}
    })
    .done(res=>{
      console.log('Success save image',res)
    })
    .fail(err=>{
      console.log('Failed save image',err)
    })
  })
  $("#btnSavetest").click(function(){
    img = document.getElementById("testyo")
    console.log('IMG',img)
    $.ajax({
      url:'/surveys/save_image',
      type:'post',
      dataType:'json',
      data:{image:getBase64Image(img),imagename:'redfox'}
    })
    .done(res=>{
      console.log('Success save image',res)
    })
    .fail(err=>{
      console.log('Failed save image',err)
    })
  })
</script>
</body>
</html>

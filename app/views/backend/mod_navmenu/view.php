<?php
// error_reporting(1);
    switch(isset($_GET['act'])){
      default:
        $query = $this->db->query("SELECT * FROM t_front_menu ORDER BY position");
         
        $ref   = [];
        $items = [];

        foreach ($query->result() as $data) {

            $thisRef = &$ref[$data->id_menu];

            $thisRef['id_parent'] = $data->id_parent;
            $thisRef['nama_menu'] = $data->nama_menu;
            $thisRef['link'] = $data->link;
            $thisRef['position'] = $data->position;
            $thisRef['id_menu'] = $data->id_menu;
           if($data->id_parent == 0) {
                $items[$data->id_menu] = &$thisRef;
           } else {
                $ref[$data->id_parent]['child'][$data->id_menu] = &$thisRef;
           }

        }
        function get_menu($items,$class = 'dd-list') {

            $html = "<ol class=\"".$class."\" id=\"menu-id\">";

            foreach($items as $key=>$value) {
            if ($value['position']=='Top'){ $icon = 'down text-danger'; $ket ='Pindah ke Bottom Menu'; }else{ $icon = 'up text-success';  $ket ='Pindah ke Top Menu'; }
                $html.= '<li class="dd-item dd3-item" data-id="'.$value['id_menu'].'" >
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content"><span id="label_show'.$value['id_menu'].'">'.$value['nama_menu'].'</span> 
                                <span class="float-right">/<span id="link_show'.$value['id_menu'].'">'.$value['link'].'</span> &nbsp;&nbsp;  
                                <a title="'.$ket.'" href="?act=save_posisi&id='.$value['id_menu'].'" style="cursor:pointer"><i class="fa fa-chevron-circle-'.$icon.'"></i></a>&nbsp;&nbsp;
                                    <a class="edit-button" id="'.$value['id_menu'].'" label="'.$value['nama_menu'].'" link="'.$value['link'].'" ><i class="fa fa-edit"></i></a>
                                    <a class="del-button" id="'.$value['id_menu'].'"><i class="fa fa-trash"></i></a></span> 
                            </div>';
                if(array_key_exists('child',$value)) {
                    $html .= get_menu($value['child'],'child');
                }
                    $html .= "</li>";
            }
            $html .= "</ol>";

            return $html;

        }

?>

<div id="load"></div>
<div class="col-sm-4">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Input Menu Website</h4>
        <form id="submit-form">
          <input type="hidden" id="id">
          <div class="form-group">
            <label for="label">Nama Menu</label>
            <input class="form-control" id="label" placeholder="Nama menu" type="text" required>
          </div>
          <div class="form-group">
            <input type="radio" id="radio1" name='from' value='link' checked> Link &nbsp; 
            <input type="radio" id="radio2" name='from' value='page'> Halaman &nbsp; 
            <input type="radio" id="radio3" name='from' value='kategori'> Kategori
          </div>
          <div class="form-group">
            <tr>
              <td>
                <input class='form-control link' type="text" id="link" placeholder="http://domain.com/hal" autocomplete='off'>
                <select class='form-control page' type="text" id="page" required>
                  <option value=''>- Halaman -</option>
                  <?php 
                    $sqlh = $this->db->query("SELECT * FROM `t_hal`");
                    foreach ($sqlh->result_array() as $rowh) {
                        echo '<option value="'.$rowh['seo'].'">'.$rowh['judul'].'</option>';
                    }
                  ?>
                </select>
                <select class='form-control kategori' type="text" id="kategori" required>
                  <option value=''>- Kategori -</option>
                  <option value='menu1'>Menu</option>
                  <?php 
                    $sql = $this->db->query("SELECT * FROM `t_kat` ");
                    foreach ($sql->result_array() as $row) {
                        echo '<option value="'.$row['seo_kat'].'">'.$row['nama_kat'].'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
          </div>
          <div class="form-group">
            <tr>
              <td>
                <select class='form-control' type="text" id="level" required>
                  <option value=''>- Level Akses -</option>
                  <?php 
                    $level = $this->db->query("SELECT * FROM `t_user_level` WHERE option = 'frontend' AND aktif = 'Y'");
                    foreach ($level->result_array() as $lv) {
                        $pilih = 'selected';
                        if ($lv['nama_level']==$lv['nama_level']) {
                            echo '<option value="'.$lv['nama_level'].'" $pilih>'.$lv['nama_level'].'</option>';
                        }else{
                           echo '<option value="'.$lv['nama_level'].'">'.$lv['nama_level'].'</option>'; 
                        }
                    }
                  ?>
                </select>
                <small class="text-muted">Level <strong class="text-danger">User</strong> menu tampil disemua pengunjung</small>
              </td>
            </tr>
          </div>
          <div class="box-footer">
            <button class="btn btn-success" id="submit">Submit</button> 
            <button class="btn btn-danger" id="reset">Reset</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="col-sm-8">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Menu Website
          <span id="nestable-menu">
              <button type="button" class="btn btn-success btn-sm float-right pad-l" data-action="expand-all">Expand All</button>
              <button type="button" class="btn btn-info btn-sm float-right pad-r mr-2" data-action="collapse-all">Collapse All</button>
          </span>
        </h4>
        <div class="myadmin-dd-empty dd py-4" id="nestable" style="max-width: 100%;">
        <?php print get_menu($items); ?>
        </div>
        <input type="hidden" id="nestable-output">
        <div class="box-footer">
            <button id="save" type="button" class="btn btn-success">Simpan</button>
        </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $('.link').show();
  $('.page').hide();
  $('.kategori').hide();
  $('#radio1').change(function(){
    if(this.checked)
      $('.link').fadeIn('slow');
      $('.page').fadeOut('slow').val("");
      $('.kategori').fadeOut('slow').val("");
  });

  $('#radio2').change(function(){
    if(this.checked)
      $('.page').fadeIn('slow');
      $('.link').fadeOut('slow').val("");
      $('.kategori').fadeOut('slow').val("");
  });

  $('#radio3').change(function(){
    if(this.checked)
      $('.kategori').fadeIn('slow');
      $('.page').fadeOut('slow').val("");
      $('.link').fadeOut('slow').val("");
  });
});
$(document).ready(function()
{
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    }).on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });


});

  $(document).ready(function(){
    $("#load").hide();
    $("#submit").click(function(){
       $("#load").show();

    var label = $("#label").val();
    if(label==''){
        swal("Oops!","Nama menu wajib diisi ya..!","warning");
    }
        var dataString = { 
          label : $("#label").val(),
          link : $("#link").val(),
          page : $("#page").val(),
          kategori : $("#kategori").val(),
          level : $("#level").val(),
          id : $("#id").val()
        };

        $.ajax({
          url: "<?=base_url().'admin/ajax/nes_menu_save'?>",
          type: 'GET',
          dataType: 'json',
          data: dataString,
          cache : false,
        })
        .done(function(data) {
          if(data.type == 'add'){
             $("#menu-id").append(data.menu);
          } else if(data.type == 'edit'){
             $('#label_show'+data.id).html(data.label);
             $('#link_show'+data.id).html(data.link);
             $('#page_show'+data.id).html(data.page);
             $('#kategori_show'+data.id).html(data.kategori);
             $('#level_show'+data.id).html(data.level);
          }
          $('#label').val('');
          $('#link').val('');
          $('#page').val('');
          $('#kategori').val('');
          $('#id').val('');
          $('#level').val('');
          $("#load").hide();
        })
        .fail(function() {
          console.log("error");
          swal("Oops!","gagal memperbaharui nih sepertinya :(","error");
        });
    });

    $('.dd').on('change', function() {
        $("#load").show();
     
          var dataString = { 
              data : $("#nestable-output").val(),
            };
        $.ajax({
         url: "<?=base_url().'admin/ajax/nes_menu_update'?>",
         type: 'GET',
         dataType: 'html',
         data: dataString,
        })
        .done(function() {
          $("#load").hide();
        })
        .fail(function() {
         console.log("error");
         swal("Oops!","gagal memperbaharui nih sepertinya :(","error");
        });
    });

    $("#save").click(function(){
        $("#load").show();
     
        var dataString = { 
          data : $("#nestable-output").val(),
        };

        $.ajax({
         url: "<?=base_url().'admin/ajax/nes_menu_update'?>",
         type: 'GET',
         dataType: 'html',
         data: dataString,
        })
        .done(function() {
          $("#load").hide();
          swal("Selamat!","Data berhasil diperbaharui!","success");
        })
        .fail(function() {
         console.log("error");
         swal("Oops!","gagal memperbaharui nih sepertinya :(","error");
        });

    });

 
    $(document).on("click",".del-button",function() {
        // var x = confirm('Delete this menu?');
        var id = $(this).attr('id');
        // console.log(id);
        swal({   
            title: "Anda yakin?",   
            text: "Data yang dihapus tidak akan bisa dikembalikan!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ya, Hapus!",   
            cancelButtonText: "Batal!"
        }) 
        .then(
          function (isConfirm) {
            if (isConfirm.value) {
                $("#load").show();
                console.log(id);
                $.ajax({
                   url: "<?=base_url().'admin/ajax/nes_menu_delete'?>",
                   type: 'GET',
                   dataType: 'html',
                   data: {id: id},
                 })
                 .done(function() {
                    swal({
                      title: "Hapus!",
                      text: "Data berhasil dihapus!",
                      type: "success"
                    })
                    .then( () => {
                      $("#load").hide();
                      $("li[data-id='" + id +"']").remove();
                    });
                 })
                 .fail(function() {
                   console.log("error");
                   swal("Oops!","gagal menghapus nih sepertinya :(","error");
                 });
                  
            }else{
                swal("Data batal dihapus!","error");
            }    
        });
    });

    $(document).on("click",".edit-button",function() {
        var id = $(this).attr('id');
        var label = $(this).attr('label');
        var link = $(this).attr('link');
        var level = $(this).attr('level');
        $("#id").val(id);
        $("#label").val(label);
        $("#link").val(link);
        $("#level").val(level);
    });

    $(document).on("click","#reset",function() {
        $('#label').val('');
        $('#link').val('');
        $('#id').val('');
        $('#level').val('');
    });

  });

</script>
<?php
      break;

      case "save_posisi":
        $sql = $this->db->query("SELECT position from t_front_menu where id_menu = '".$_GET['id']."' ");
        $row = $sql->result_array();
        if ($posisi = $row['position'] == 'Bottom' ? $row['position'] : $row['position']) {
            // $posisi = 'Top';
            $sqlu = $this->db->query("UPDATE t_front_menu set position ='".$posisi."' WHERE id_menu = '".$_GET['id']."' ");
        }else if($posisi = $row['position'] == 'Top' ? $row['position'] : $row['position']){
            // $posisi = 'Bottom';
            $sqlu = $this->db->query("UPDATE t_front_menu set position ='".$posisi."' WHERE id_menu = '".$_GET['id']."' ");
        }
        
        echo "<script>document.location='".base_url()."frontend';</script>";
      break;
    }
?>
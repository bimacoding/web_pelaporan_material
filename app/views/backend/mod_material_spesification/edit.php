<style type="text/css">
    .ajax-file-upload-statusbar{
        border:none;
    }
    .ajax-file-upload-filename {
        width: 100%;
        height: auto;
        margin: 0 5px 5px 0px;
        border-bottom: 1px solid #ddd;
    }
    .ajax-file-upload{
      cursor:pointer;
    }
    .ajax-file-upload {
        width: 100%;
        box-shadow: inset 0px 1px 0px 0px #ffffff;
        background: linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
        background-color: rgba(0, 0, 0, 0);
        background-color: #ffffff;
        border-radius: 3px;
        border: 1px solid #dcdcdc;
        display: inline-block;
        cursor: pointer;
        color: #666666;
        font-family: Arial;
        font-size: 15px;
        font-size: 14px;
        padding: 3px 24px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #ffffff;
    }
    .ajax-file-upload-statusbar{
        display: inline;
    }
    .ajax-upload-dragdrop{
        padding: 3px 10px -1px 10px;
    }
    .ajax-upload-dragdrop span:first-of-type{
        float: right; margin-top: 5px;
    }
    .ajax-file-upload-preview{
        display: inline;
        float: left;
    }
    .addon-link{
    background: #f9f9f9;
    border: 1px solid #d7d7d7;
    font-size: 15px;
    color: blue;
    text-decoration: underline;
    }
  @media (max-width: 767px) {
    .ajax-upload-dragdrop{
      width:225px !important;
      border:none !important;
    }
    .ajax-upload-dragdrop span:first-of-type{
      float: right; margin-top: 5px;
      display: none;
    }
  }
</style>
<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off','name'=>'form'); echo form_open_multipart('material_spesification/ubah_material_spesification',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                
                 <div class="form-group row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pin</label>
                            <input type="hidden" name="kode" value="<?=$row['kode_material_spesification']?>">
                            <input type="text" class="form-control" name="b" id="pin" value="<?=$row['pin']?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tgl</label>
                            <input type="date" class="form-control" name="c" id="tgl" value="<?=$row['tgl']?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Item</label>
                            <input type="text" class="form-control" name="d" id="nama_item" value="<?=$row['nama_item']?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <input type="text" class="form-control" name="e" id="kategori" value="<?=$row['kategori']?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe</label>
                            <input type="text" class="form-control" name="f" id="tipe" value="<?=$row['tipe']?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Warna</label>
                            <input type="text" class="form-control" name="g" id="warna" value="<?=$row['warna']?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" name="h" id="harga" value="<?=$row['harga']?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Moq</label>
                            <input type="text" class="form-control" name="i" id="moq" value="<?=$row['moq']?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Packaging</label>
                            <input type="text" class="form-control" name="j" id="packaging" value="<?=$row['packaging']?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tr Reference</label>
                            <input type="text" class="form-control" name="k" id="tr_reference" value="<?=$row['tr_reference']?>">
                        </div>

                        

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Supplier Number</label>
                            <input type="text" class="form-control" id="supnumber" readonly="on">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Supplier</label>
                            <select class="form-control" name="a" id="dropdown">
                                <?php foreach ($supplier as $k => $s) {
                                    $pilih = 'selected';
                                    if ($row['id_supplier']==$s['id_supplier']) {
                                        echo "<option value='$s[id_supplier]' $pilih> $s[nama_supplier] </option>";
                                    }else{
                                        echo "<option value='$s[id_supplier]'> $s[nama_supplier] </option>";
                                    }
                                    
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="supalamat" readonly="on">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Person</label>
                            <input type="text" class="form-control" id="supcp0" readonly="on">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" id="supemail" readonly="on">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">CP 1</label>
                            <input type="text" class="form-control" id="supcp1" readonly="on">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">CP 2</label>
                            <input type="text" class="form-control" id="supcp2" readonly="on">
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">File</label>
                            <input type="hidden" name="f1" value="<?=$row['file']?>">
                            <input type="file" class="form-control" name="filefoto1" id="file" placeholder="Masukan file">
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group row">
                    <div class="col-md-8">
                        <h5 class="float-left text-warning">Product Spesification</h5>
                        <button type="button" id="submit" class="btn btn-primary btn-xs float-right" onclick="sendData()">Tambah</button>
                    </div>
                    <div class="col-md-4 ">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <form class="prodMenu">
                                    <td width="200">
                                        <input type="hidden" name="kode" class="form-control" value="<?=$this->uri->segment(3)?>" id="kodprod">
                                        <input type="text" name="row" class="form-control" id="rowprod" placeholder="ROW">
                                    </td>
                                    <td width="200" class="text-center">
                                        <input type="text" name="ket" class="form-control" id="ketprod" placeholder="DETIL">
                                    </td>
                                </form>
                            </tr>
                        </table>

                        <table class="table" id="tbls">
                            <thead>
                                <tr>
                                    <th>
                                        Row
                                    </th>
                                    <th class="text-center">
                                        Detil
                                    </th>
                                    <th class="text-center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="appendFeed">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">File Product Spesification</label>
                            <input type="hidden" name="f1" value="<?=$row['file_product_spesification']?>">
                            <input type="file" class="form-control" name="filefoto2" id="file_product_spesification">
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group row">
                    <div class="col-md-12">
                        <h5 class="float-left text-warning">Application Machine</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe</label>
                            <input type="text" class="form-control" name="l" id="app_tipe_mesin" value="<?=$row['app_tipe_mesin']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Detil</label>
                            <input type="text" class="form-control" name="m" id="app_detil_mesin" value="<?=$row['app_detil_mesin']?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-12">
                        <h5 class="float-left text-warning">Notes</h5>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" name="n"><?=$row['ket']?></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-12">
                        <h5 class="float-left text-warning">Detil Foto</h5>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div id='fileuploader'>Choose files</div>
                        </div>
                    </div>
                </div>
                <hr>
                
                <div class="form-group row">
                    <div class="col-md-12">
                        <h5 class="float-left text-warning">Approval</h5>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ass.man</label>
                            <select class="form-control" name="o" id="dropdownasman">
                                <?php foreach ($asman as $kasman => $sasman) {
                                    $pilihasman = "selected";
                                    if ($row['id_asman']==$asman['id_users']) {
                                        echo "<option value='$sasman[id_users]' $pilihasman> $sasman[nama] </option>";
                                    }else{
                                        echo "<option value='$sasman[id_users]'> $sasman[nama] </option>";
                                    }
                                    
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Asman</label>
                            <input type="text" class="form-control" name="p" id="email_asman" readonly="on">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Man</label>
                            <select class="form-control" name="q" id="dropdownman">
                                <?php foreach ($man as $kman => $sman) {
                                    $pilih = "selected";
                                    if ($row['id_man']==$sman['id_users']) {
                                        echo "<option value='$sman[id_users]' $pilih> $sman[nama] </option>";
                                    }else{
                                        echo "<option value='$sman[id_users]'> $sman[nama] </option>";
                                    }
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Man</label>
                            <input type="text" class="form-control" name="r" id="email_man" readonly="on">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chief</label>
                            <select class="form-control" name="s" id="dropdownchief">
                                <?php foreach ($chief as $kchief => $schief) {
                                    $pilihchief = "selected";
                                    if ($row['id_chief']==$schief['id_users']) {
                                        echo "<option value='$schief[id_users]' $pilih> $schief[nama] </option>";
                                    }else{
                                        echo "<option value='$schief[id_users]'> $schief[nama] </option>";
                                    }
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Chief</label>
                            <input type="text" class="form-control" name="t" id="email_chief" readonly="on">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
                <a href="<?=base_url().'material_spesification/indeks'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        id = $('#dropdown option:selected').val();
        $.ajax({
            url: "<?=base_url()?>admin/ajax/getSupplier/"+id,
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $("#supcp0").val(data['kontak']);
            $("#supcp1").val(data['cp1']);
            $("#supcp2").val(data['cp2']);
            $("#supalamat").val(data['alamat']);
            $("#supnumber").val(data['nomor']);
            $("#supemail").val(data['email']);
        })
        .fail(function() {
            console.log("error");
        });
        // -------------------------------------------------
        $('#dropdown').on('change',function(){
            id = $('#dropdown option:selected').val();
            $.ajax({
                url: "<?=base_url()?>admin/ajax/getSupplier/"+id,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(data) {
                $("#supcp0").val(data['kontak']);
                $("#supcp1").val(data['cp1']);
                $("#supcp2").val(data['cp2']);
                $("#supalamat").val(data['alamat']);
                $("#supnumber").val(data['nomor']);
                $("#supemail").val(data['email']);
            })
            .fail(function() {
                console.log("error");
            });
        })

        idasman = $('#dropdownasman option:selected').val();
        $.ajax({
            url: "<?=base_url()?>admin/ajax/getUsr/"+idasman,
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $("#email_asman").val(data['email']);
        })
        .fail(function() {
            console.log("error");
        });

        $('#dropdownasman').on('change',function(){
            id = $('#dropdownasman option:selected').val();
            $.ajax({
                url: "<?=base_url()?>admin/ajax/getUsr/"+id,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(data) {
                $("#email_asman").val(data['email']);
            })
            .fail(function() {
                console.log("error");
            });
        })


        idman = $('#dropdownman option:selected').val();
        $.ajax({
            url: "<?=base_url()?>admin/ajax/getUsr/"+idman,
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $("#email_man").val(data['email']);
        })
        .fail(function() {
            console.log("error");
        });

        $('#dropdownman').on('change',function(){
            id = $('#dropdownman option:selected').val();
            $.ajax({
                url: "<?=base_url()?>admin/ajax/getUsr/"+id,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(data) {
                $("#email_man").val(data['email']);
            })
            .fail(function() {
                console.log("error");
            });
        })


        idchief = $('#dropdownchief').val();
        $.ajax({
            url: "<?=base_url()?>admin/ajax/getUsr/"+idchief,
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $("#email_chief").val(data['email']);
        })
        .fail(function() {
            console.log("error");
        });

        $('#dropdownchief').on('change',function(){
            id = $('#dropdownchief option:selected').val();
            $.ajax({
                url: "<?=base_url()?>admin/ajax/getUsr/"+id,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(data) {
                $("#email_chief").val(data['email']);
            })
            .fail(function() {
                console.log("error");
            });
        })

        showall()

        
    });

    function showall() {
        var jsonRole = dataJsonRole();
        console.log(jsonRole);
        var html = '';
        jsonRole.forEach(function(index, el) {
            
            html += '<tr id="'+index.id+'">'+
                    '<td width="200">'+
                    '<span>'+index.row+'</span>'+
                    '</td>'+
                    '<td width="200" class="text-center">'+
                    '<span>'+index.ket+'</span>'+
                    '</td>'+
                    '<td>'+
                    '<center>'+
                    '<button type="button" class="btn btn-danger btn-xs" id="del'+index.id+'" idrole="'+index.id+'"><i class="fas fa-trash-alt"></i></button> '+
                    '</center>'+
                    '</td>'+
                    '</tr>';

                    $("#tbls").on("click", "#del"+index.id, function() {
                       $(this).closest("tr").remove();
                       $.post("<?=base_url()?>admin/ajax/deleteProductSpek", {id: index.id}, function(data, textStatus, xhr) {
                        console.log(data);
                       });
                    });
        });
        var bb = $("#appendFeed").html(html);
        return bb;
    }

    function dataJsonRole()
    {
        var ret_val = {};
        $.ajax({
            url: '<?=base_url()?>admin/ajax/getproductspesification',
            type: 'POST',
            data: {kode:"<?=$this->uri->segment(3)?>"},
            async: false,
            dataType: 'json'
        }).done(function (response) {
            ret_val = response;
        }).fail(function (jqXHR, textStatus, errorThrown) {
            ret_val = null;
        });
        return ret_val;
    }

    function sendData()
    {
        var data = $('form.prodMenu').serialize();
        var kodes = $("#kodprod").val();
        var rows = $("#rowprod").val();
        var kets = $("#ketprod").val();
        console.log(kodes);
        console.log(rows);
        console.log(kets);
        $.ajax({
            url: "<?=base_url().'admin/ajax/productspesificationsave'?>",
            type: 'POST',
            data: {kodes:kodes, rows:rows, kets:kets},
        })
        .done(function(dt) {
            $(window).on('load',$(showall()));
        })
        .fail(function() {
            console.log("error");
        });
        
    }
</script>
<script type="text/javascript">
$(document).ready(function()
{
$("#fileuploader").uploadFile({
url: "<?=base_url('admin/ajax/upload_foto_product')?>",
formData: {
    id: "<?=$this->uri->segment(3)?>"
},
method: "POST", // Upload Form method type POST or GET.
enctype: "multipart/form-data",
dragDrop: true,
maxFileCount:5,
multiple: true,
fileName: "uploadFile",
maxFileSize: 2000 * 1024,
allowedTypes: "gif,png,jpg,jpeg",
returnType: "json",
showDone: false,
showDelete: true,
onSuccess: function (files, response, xhr,pd) {
    // console.log(response);
},
onError: function (files, status, message,pd) {},
deleteCallback: function(data, pd) {
    for (var i = 0; i < data.length; i++) {
        $.post("<?=base_url('admin/ajax/delete_foto_product')?>", {op: "delete",name: data[i],id: "<?=$this->uri->segment(3)?>"},
        function(resp, textStatus, jqXHR) {
            // $("#status").append("<div>File Deleted</div>");  
        });

    }
    // console.log(data);
    pd.statusbar.hide();
},
dragDropStr: "<span><b>Drag &amp; Drop Files</b></span>",
abortStr: "Abort",
multiDragErrorStr: "Multiple File Drag &amp; Drop is not allowed.",
extErrorStr: "extensi file tidak diizinkan, extensi diizinkan: ",
sizeErrorStr: "ukuran file tidak diizinkan, ukuran diizinkan: ",
uploadErrorStr: "Upload is not allowed",
maxFileCountErrorStr: "Maximum gambar diupload: ",
dragdropWidth:'auto'
});
});

</script>
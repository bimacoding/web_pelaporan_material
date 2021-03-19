<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off','name'=>'form'); echo form_open_multipart('spk/ubah_spk',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                
                  <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">No SPK</label>
                    <div class="col-10">
                        <input class="form-control" type="hidden" name="id" value="<?=$row['id_spk']?>">
                        <input class="form-control" type="text" name="a" value="<?=$row['no_spk']?>" readonly="on">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Tanggal</label>
                    <div class="col-10">
                        <input class="form-control" type="date" name="b" value="<?=$row['tgl']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Tanggal Terima</label>
                    <div class="col-10">
                        <input class="form-control" type="date" name="c" value="<?=$row['tgl_terima']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Source</label>
                    <div class="col-10">
                      <select class="form-control" name="d">
                            <option value="0">-- Pilih --</option>
                            <?php foreach ($source as $q => $sc) {
                                $pilih = "selected";
                                if ($sc['id_source']==$row['id_source']) {
                                    echo "<option value='$sc[id_source]' $pilih> $sc[kode_source] </option>";
                                }else{
                                    echo "<option value='$sc[id_source]'> $sc[kode_source] </option>";
                                }
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Kode Item</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="e" value="<?=$row['kode_item']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nama Item</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="f" value="<?=$row['nama_item']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Harga / Biaya</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="g" value="<?=$row['harga']?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Supplier</label>
                    <div class="col-10">
                      <select class="form-control" name="h">
                            <option value="0">-- Pilih --</option>
                            <?php foreach ($supplier as $k => $s) {
                                $pilih = "selected";
                                if ($s['id_supplier']==$row['id_supplier']) {
                                    echo "<option value='$s[id_supplier]' $pilih> $s[nama_supplier] </option>";
                                }else{
                                    echo "<option value='$s[id_supplier]'> $s[nama_supplier] </option>";
                                }
                                
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Kontak</label>
                    <div class="col-10">
                        <input class="form-control" type="text" readonly="on" id="kontak">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Kota</label>
                    <div class="col-10">
                        <input class="form-control" type="text" readonly="on" id="kota">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Proses</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="i" value="<?=$row['proses']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Sub Proses</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="j" value="<?=$row['sub_proses']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">CASE</label>
                    <div class="col-10">
                        <select class="form-control" name="k">
                            <option value="<?=$row['case']?>"> <?=$row['case']?> </option>
                            <option value="NEW"> NEW </option>
                            <option value="REPLACEMENT"> REPLACEMENT </option>
                            <option value="TEHCNIQUE"> TEHCNIQUE </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">PIN</label>
                    <div class="col-10">
                      <select class="form-control" name="l">
                            <option value="<?=$row['pin']?>"> <?=$row['pin']?> </option>
                            <option value="YES"> YES </option>
                            <option value="NO"> NO </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">PIC</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="m" value="<?=$row['pic']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Est.Consumtion</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="n" value="<?=$row['est_consumtion']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Est.Rencana Pemakaian</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="o" value="<?=$row['est_rencana_pemakaian']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Prioritas</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="p" value="<?=$row['prioritas']?>">
                    </div>
                </div>
                <hr>
                <!-- doc tipe -->
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Document</label>
                    <div class="col-10">
                      <select class="form-control" name="w">
                            <option value="<?=$row['doc_option']?>"> <?=$row['doc_option']?> </option>
                            <option value="Sample"> Sample </option>
                            <option value="MSDS"> MSDS </option>
                            <option value="Test Report"> Test Report </option>
                            <option value="Quotation"> Quotation </option>
                            <option value="SVLK"> SVLK </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2"></div>
                    <div class="col-7">
                        <input class="form-control" type="text" name="x" value="<?=$row['tipe']?>">                       
                    </div>
                    <div class="col-3">
                        <select class="form-control" name="y">
                            <option value="<?=$row['tipe_option']?>"> <?=$row['tipe_option']?> </option>
                            <option value="">  </option>
                            <option value="">  </option>
                            <option value="">  </option>
                            <option value="">  </option>
                        </select>                      
                    </div>
                </div>
                <hr>
                <!-- end -->

                <!-- background  section -->
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Background Text</label>
                    <div class="col-10">
                        <textarea class="form-control" name="u"><?=$row['ket_backgroun']?></textarea>                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Background File</label>
                    <div class="col-10">
                        <input class="form-control" type="file" name="filefoto1">                       
                        <input class="form-control" type="hidden" name="f1" value="<?=$row['file_background']?>">                       
                    </div>
                </div>
                <!-- end -->
                <hr>
                <!-- objective  section -->
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Objective Text</label>
                    <div class="col-10">
                        <textarea class="form-control" name="v"><?=$row['ket_objective']?></textarea>                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Objective File</label>
                    <div class="col-10">
                        <input class="form-control" type="file" name="filefoto2">                       
                        <input class="form-control" type="hidden" name="f2" value="<?=$row['file_objective']?>">                       
                    </div>
                </div>
                <!-- end -->

                <hr>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Visual</label>
                    <div class="col-10">
                        <textarea class="form-control" name="q"><?=$row['visual']?></textarea>                     
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Aplication</label>
                    <div class="col-10">
                        <textarea class="form-control" name="r"><?=$row['aplikasi']?></textarea>                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Testing</label>
                    <div class="col-10">
                        <textarea class="form-control" name="s"><?=$row['testing']?></textarea>                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Notes</label>
                    <div class="col-10">
                        <textarea class="form-control" name="t"><?=$row['ket']?></textarea>                       
                    </div>
                </div>


                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
                <a href="<?=base_url().'spk/indeks'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        id = $('#dropdown').val();
        $.ajax({
            url: "<?=base_url()?>admin/ajax/getSupplier/"+id,
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $("#kontak").val(data['kontak']);
            $("#kota").val(data['kota']);
        })
        .fail(function() {
            console.log("error");
        });

        $('#dropdown').on('change',function(){
            id = $('#dropdown option:selected').val();
            $.ajax({
                url: "<?=base_url()?>admin/ajax/getSupplier/"+id,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(data) {
                $("#kontak").val(data['kontak']);
                $("#kota").val(data['kota']);
            })
            .fail(function() {
                console.log("error");
            });
        })
        
    });
</script>
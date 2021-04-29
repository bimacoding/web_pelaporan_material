<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            <h5 class="card-subtitle">Pastikan setiap form terisi dengan benar.</h5>

            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off','name'=>'form'); echo form_open_multipart('spk/tambah_spk',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">No SPK</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="a" value="<?=$this->mylibrary->kdauto('t_spk','id_spk',date('Ym'))?>" readonly="on">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Tanggal</label>
                    <div class="col-10">
                        <input class="form-control" type="date" name="b">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Tanggal Terima</label>
                    <div class="col-10">
                        <input class="form-control" type="date" name="c">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Source</label>
                    <div class="col-10">
                      <select class="form-control" name="d">
                            <option value="0">-- Pilih --</option>
                            <?php foreach ($source as $q => $sc) {
                                echo "<option value='$c[id_source]'> $sc[kode_source] </option>";
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Kode Item</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="e" placeholder="kode item">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nama Item</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="f" placeholder="nama item">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Harga / Biaya</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="g" placeholder="Biaya">                       
                    </div>
                </div>


                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Supplier</label>
                    <div class="col-10">
                      <select class="form-control" name="h" id="dropdown">
                            <option value="0">-- Pilih --</option>
                            <?php foreach ($supplier as $k => $s) {
                                echo "<option value='$s[id_supplier]'> $s[nama_supplier] </option>";
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
                        <input class="form-control" type="text" name="i" placeholder="proses">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Sub Proses</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="j" placeholder="sub proses">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">CASE</label>
                    <div class="col-10">
                        <select class="form-control" name="k">
                            <option value="NEW"> NEW </option>
                            <option value="REPLACEMENT"> REPLACEMENT </option>
                            <option value="TEHCNIQUE"> TEHCNIQUE </option>
                        </select>
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">PIN</label>
                    <div class="col-10">
                      <select class="form-control" name="l">
                            <option value="YES"> YES </option>
                            <option value="NO"> NO </option>
                        </select>
                    </div>
                </div> -->

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">PIC</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="m" placeholder="PIC">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Est.Consumtion</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="n" placeholder="Est.Consumtion">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Est.Rencana Pemakaian</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="o" placeholder="Est.Rencana Pemakaian">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Prioritas</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="p" placeholder="Prioritas">                       
                    </div>
                </div>
                <hr>
                <!-- doc tipe -->
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Document</label>
                    <div class="col-10">
                      <select class="form-control" name="w">
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
                        <input class="form-control" type="text" name="x" placeholder="Type sample size here">                       
                    </div>
                    <div class="col-3">
                        <select class="form-control" name="y">
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
                        <textarea class="form-control" name="u"></textarea>                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Background File</label>
                    <div class="col-10">
                        <input class="form-control" type="file" name="filefoto1">                       
                    </div>
                </div>
                <!-- end -->
                <hr>
                <!-- objective  section -->
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Objective Text</label>
                    <div class="col-10">
                        <textarea class="summernote" name="v"></textarea>                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Objective File</label>
                    <div class="col-10">
                        <input class="form-control" type="file" name="filefoto2">                       
                    </div>
                </div>
                <!-- end -->

                <hr>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Visual</label>
                    <div class="col-10">
                        <textarea class="form-control" name="q"></textarea>                     
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Aplikasi</label>
                    <div class="col-10">
                        <textarea class="form-control" name="r"></textarea>                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Testing</label>
                    <div class="col-10">
                        <textarea class="form-control" name="s"></textarea>                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Notes</label>
                    <div class="col-10">
                        <textarea class="form-control" name="t"></textarea>                       
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
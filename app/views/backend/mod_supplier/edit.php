<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off','name'=>'form'); echo form_open_multipart('supplier/ubah_supplier',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nama Supplier</label>
                    <div class="col-10">
                        <input class="form-control" type="hidden" name="id" value="<?=$row['nama_supplier']?>">                       
                        <input class="form-control" type="text" name="a" value="<?=$row['nama_supplier']?>">                       
                    </div>
                </div>


                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Alamat Supplier</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="b" value="<?=$row['alamat_supplier']?>">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">CP Supplier</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="c" value="<?=$row['cp_supplier']?>">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">No.HP Supplier</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="d" value="<?=$row['nohp_supplier']?>">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Kota Supplier</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="e" value="<?=$row['kota_supplier']?>">                       
                    </div>
                </div>


                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Telp Supplier</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="f" value="<?=$row['tlp_supplier']?>">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">FAX Supplier</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="g" value="<?=$row['fax_supplier']?>">                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Email Supplier</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="h" value="<?=$row['email_supplier']?>">                       
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
                <a href="<?=base_url().'supplier/indeks'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>
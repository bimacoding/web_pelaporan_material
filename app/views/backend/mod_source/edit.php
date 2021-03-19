<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off','name'=>'form'); echo form_open_multipart('source/ubah_source',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Seo</label>
                    <div class="col-10">
                        <input type="hidden" name="id" value="<?=$row['id_source']?>">
                        <input class="form-control" type="text" name="a" value="<?=$row['kode_source']?>">
                    </div>
                </div>


                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
                <a href="<?=base_url().'source/indeks'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>
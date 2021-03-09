<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off','name'=>'form'); echo form_open_multipart('kategori/ubah_kategori',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                
                        

                       

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Seo</label>
                    <div class="col-10">
                        <input type="hidden" name="id" value="<?=$row['id_kat']?>">
                        <input class="form-control" type="text" name="a" value="<?=$row['seo_kat']?>">
                      
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Judul</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="b" value="<?=$row['judul_kat']?>">
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Jenis Kategori</label>
                    <div class="col-10">
                     <select class="form-control" name="c">
                            <option value="<?=$row['jenis']?>"><?=$row['jenis']?></option>
                            <option value="artikel"> Artikel </option>
                            <option value="produk"> Produk </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Publish</label>
                    <div class="col-10">
                        <select class="form-control" name="d">
                            <option value="<?=$row['publish_kat']?>"><?=$row['publish_kat']?></option>
                            <option value="N"> N </option>
                            <option value="Y"> Y </option>
                        </select>
                        <small class="text-muted"> Default No / N</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
                <a href="<?=base_url().'kategori/indeks'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>
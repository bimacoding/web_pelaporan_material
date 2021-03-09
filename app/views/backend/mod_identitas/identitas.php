        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?=$title?></h4>

                  <?php 
                  $get = $this->uri->segment(4);
                  $logo = $this->db->query("SELECT logo FROM t_identitas WHERE id_identitas = 1 ORDER BY id_identitas LIMIT 1")->row_array();
                  echo "<center><img src='".base_url()."/assets/images/$logo[logo]' width='100' class='img-thumbnail'></center>";
                  ?>


                  
                  <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
                  echo form_open_multipart('siteman/add_logo',$attributes); ?>
                    <hr>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="file" class="form-control" name="logo" id="logos">
                        <small class="text-dark">upload logo dengan pixel (square) cth: 200px x 200px, format hanya boleh .png max size 1 Mb</small>
                      </div>
                    </div>

                    <hr>
                    <div class='box-footer'>
                        <button type='submit' name='submit' class='btn btn-info' id="tombol">Simpan</button>
                    </div>
                  <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?=$title?></h4>
                <!-- /.card-header -->
               
                  <?php 
                  $get = $this->uri->segment(4);
                  if ($get=='berhasil') {
                    echo "<div class='alert alert-success alert-dismissible'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                              <strong>Berhasil !</strong> Data Berhasil diproses..
                          </div>";
                  }elseif($get=='gagal'){
                    echo "<div class='alert alert-danger alert-dismissible'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                              <strong>Gagal !</strong> Data Gagal diproses..
                          </div>";
                  }
                  ?>
                  <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
                  echo form_open_multipart('siteman/identitaswebsite',$attributes); ?>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Website</label>
                      <div class="col-sm-10">
                        <input type="hidden" name="id" value="<?=$row['id_identitas']?>">
                        <input type="text" name="a" class="form-control" value="<?=$row['nama_website']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="b"  value="<?=$row['email']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Author</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="author"  value="<?=$row['author']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat"  value="<?=$row['alamat']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Url</label>
                      <div class="col-sm-10">
                        <input type="text" name="c" class="form-control" value="<?=$row['url']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No.Telp</label>
                      <div class="col-sm-10">
                        <input type="text" name="d" class="form-control" value="<?=$row['no_telp']?>">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Meta Deskripsi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="e" value="<?=$row['meta_deskripsi']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Meta Keyword</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="f" value="<?=$row['meta_keyword']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Favicon Saat ini</label>
                      <div class="col-sm-10">
                        <img src="<?php echo base_url().'assets/images/'.$row['favicon']?>" width="50">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Favicon</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="g">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tentang Pemilik</label>
                      <div class="col-sm-10">
                        <textarea class="summernote" name="tentang"><?=$row['tentang']?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Instagram</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="ig" value="<?=$row['instagram']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Facebook</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="fb" value="<?=$row['facebook']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Twitter</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tw" value="<?=$row['twitter']?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Maps</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="h" value="<?=$row['maps']?>">
                      </div>
                    </div>

                    <hr>
                    <div class='box-footer'>
                        <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                        <a href='<?=base_url('siteman/identitaswebsite');?>'><button type='button' class='btn btn-default float-right'>Cancel</button></a>
                    </div>
                <!-- /.card-body -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <?php echo form_close(); ?>
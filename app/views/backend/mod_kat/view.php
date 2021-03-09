<div class="col-sm-12">
    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }else if($this->session->flashdata('error')){  ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
     <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?>
                <a href="<?=base_url('kategori/tambah_kategori')?>" class="btn btn-info btn-xs float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
            </h4>
            <h6 class="card-subtitle">Semua data kategori</h6>
        
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>   
                            <th>Seo</th>
                            <th>Judul</th>
                            <td>Jenis Kategori</td>
                            <th>Publish</th>
                            <th style="width: 50px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($record as $row) {
                        ?>
                            <tr>
                                <td><center><?=$no?></center></td>
                                <td><?=$row['seo_kat']?></td>
                                <td><?=$row['judul_kat']?></td>
                                <td><?=$row['jenis']?></td>
                                <td><?=$row['publish_kat']?></td>
                                <td>
                                    <center>
                                        <a href="<?=base_url().'kategori/ubah_kategori/'.$row['id_kat'];?>" class="badge badge-success">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#0" class="badge badge-danger" data-code="<?=$row['id_kat']?>" data-doc="kat" id="delete<?=$no?>" onclick="confirms(this.id)">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        <?php
                            $no++;    # code...
                            }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
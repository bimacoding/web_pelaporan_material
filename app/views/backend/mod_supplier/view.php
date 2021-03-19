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
                <a href="<?=base_url('supplier/tambah_supplier')?>" class="btn btn-info btn-xs float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
            </h4>
            <h6 class="card-subtitle">Semua data supplier</h6>
        
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>   
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No.Telpon</th>
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
                                <td><?=$row['nama_supplier']?></td>
                                <td><?=$row['alamat_supplier']?></td>
                                <td><?=$row['email_supplier']?></td>
                                <td><?=$row['nohp_supplier']?></td>
                                <td>
                                    <center>
                                        <a href="<?=base_url().'supplier/ubah_supplier/'.$row['id_supplier'];?>" class="badge badge-success">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#0" class="badge badge-danger" data-code="<?=$row['id_supplier']?>" data-doc="supplier" id="delete<?=$no?>" onclick="confirms(this.id)">
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
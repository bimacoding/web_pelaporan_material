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
                <a href="<?=base_url('spk/tambah_spk')?>" class="btn btn-info btn-xs float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
            </h4>
            <h6 class="card-subtitle">Semua data spk</h6>
        
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>   
                            <th>No.SPK</th>
                            <th>Date</th>
                            <th>Recieve Date</th>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($record as $row) {
                        ?>
                            <tr>
                                <td><center><?=$no?></center></td>
                                <td><?=$row['no_spk']?></td>
                                <td><?=$row['tgl']?></td>
                                <td><?=$row['tgl_terima']?></td>
                                <td><?=$row['kode_item']?></td>
                                <td><?=$row['nama_item']?></td>
                                <td><?=$row['harga']?></td>
                                <td>
                                    <center>
                                        <a href="<?=base_url().'spk/cetak/'.$row['id_spk'];?>" target="_blank" class="badge badge-primary">
                                            <i class="far fa-file"></i> Cetak
                                        </a>
                                        <?php if($this->session->userdata('level')!=2){ ?>
                                            <a href="<?=base_url().'spk/ubah_spk/'.$row['id_spk'];?>" class="badge badge-success">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="#0" class="badge badge-danger" data-code="<?=$row['id_spk']?>" data-doc="spk" id="delete<?=$no?>" onclick="confirms(this.id)">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        <?php } ?>
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
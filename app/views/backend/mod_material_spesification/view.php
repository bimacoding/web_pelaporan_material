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
                <a href="<?=base_url('material_spesification/')?>" class="btn btn-info btn-xs float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
            </h4>
            <h6 class="card-subtitle">Semua data material spesification</h6>
        
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>   
                            <th>Date</th>
                            <th>PIN</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Supplier</th>
                            <th>Price</th>
                            <th>Status</th>
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
                                <td><?=$row['tgl']?></td>
                                <td><?=$row['pin']?></td>
                                <td><?=$row['nama_item']?></td>
                                <td><?=$row['tipe']?></td>
                                <td><?=$row['nama_supplier']?></td>
                                <td><?=$row['harga']?></td>
                                <td>
                                    <?php if($row['approval_asman']==1){ echo "ASS.MAN"; }?><br>
                                    <?php if($row['approval_man']==1){ echo "MANAGER"; }?><br>
                                    <?php if($row['approval_chief']==1){ echo "CHIEF"; }?><br>
                                </td>
                                <td>
                                    <center>
                                        <a href="<?=base_url().'material_spesification/ubah_material_spesification/'.$row['kode_material_spesification'];?>" class="badge badge-success">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#0" class="badge badge-danger" data-code="<?=$row['kode_material_spesification']?>" data-doc="material_spesification" id="delete<?=$no?>" onclick="confirmsmaterialdelete(this.id)">
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
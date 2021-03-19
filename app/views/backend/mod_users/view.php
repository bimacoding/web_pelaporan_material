<div class="col-md-12">
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
            <h4 class="card-title">User
                <a href="<?=base_url('users/tambah_users')?>" class="btn btn-info btn-xs float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
            </h4>
            <h6 class="card-subtitle">Semua data users</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>
                            <th><center>Foto</center></th>
                            <th>No. Peg</th>
                            <th>Nama User</th>
                            <th>Level</th>
                            <th style="width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($record as $row) {
                        ?>
                            <tr>
                                <td><center><?=$no?></center></td>
                                <td><center><img src="<?=base_url().'assets/uploads/users/'.$row['foto']?>" class="img-circle img-responsive img-thumbnail" width="50"></center></td>
                                <td><?=$row['nopeg']?></td>
                                <td><?=$row['nama']?></td>
                                <td><?=lvl($row['id_level'])?></td>
                                <td>
                                    <center>
                                        <a href="<?=base_url().'users/ubah_users/'.$row['id_users'];?>" class="badge badge-success">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="badge badge-danger" links="<?=base_url().'users/hapus_users/'.$row['id_users'];?>" id="confirm<?=$no?>" onclick="confirms(this.id)">
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
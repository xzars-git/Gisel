      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php
            if(!empty($tugas)) { ?>
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">list</i>
                        </div>
                        <h4 class="card-title">Daftar Tugas</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table">
                                <thead>
                                    <tr>
                                        <th>id_tugas</th>
                                        <th>nama_tugas</th>
                                        <th>ketentuan</th>
                                        <th>hari_ke</th>
                                        <th>kategori</th>
                                        <th>jenis_tugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        try {
                                            foreach($tugas as $data) {
                                                echo "<tr>
                                                    <td>".$data['id_tugas']."</td>
                                                    <td>".$data['nama_tugas']."</td>
                                                    <td><pre>".$data['ketentuan']."</pre></td>
                                                    <td>".$data['hari_ke']."</td>
                                                    <td>".$data['kategori']."</td>
                                                    <td>".$data['jenis_tugas']."</td>
                                                  </tr>";
                                            }
                                        } catch (\Exception $e) {
                                            print_r($e->getMessage());
                                        }
                                    ?>
                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                </div>
            <?php } ?>
          </div>
        </div>
      </div>

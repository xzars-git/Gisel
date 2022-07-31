      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">leaderboard</i>
                    </div>
                    <h4 class="card-title">Leaderboard Uji Coba</h4>
                  </div>
                  <div class="card-body ">
                    <?php if(!empty($result)) { ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama Lengkap</th>
                                    <th>Last Date</th>
                                    <th>Total Coba</th>
                                    <th>Cek Sektor</th>
                                    <th>Cek Tugas1</th>
                                    <th>Cek Tugas2</th>
                                    <th>Sektor Success</th>
                                    <th>Sektor Wrong</th>
                                    <th>Sektor Error</th>
                                    <th>Tugas1 Success</th>
                                    <th>Tugas1 Wrong</th>
                                    <th>Tugas1 Error</th>
                                    <th>Tugas2 Success</th>
                                    <th>Tugas2 Wrong</th>
                                    <th>Tugas2 Error</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    try {
                                        foreach($result as $data) {
                                            echo "<tr>
                                                <td>".$data['nim']."</td>
                                                <td>".$data['nama_lengkap']."</td>
                                                <td>".$data['lastDate']."</td>
                                                <td>".$data['totalCoba']."</td>
                                                <td>".$data['cekS']."</td>
                                                <td>".$data['cekT1']."</td>
                                                <td>".$data['cekT2']."</td>
                                                <td>".$data['sSuccess']."</td>
                                                <td>".$data['sWrong']."</td>
                                                <td>".$data['sError']."</td>
                                                <td>".$data['t1Success']."</td>
                                                <td>".$data['t1Wrong']."</td>
                                                <td>".$data['t1Error']."</td>
                                                <td>".$data['t2Success']."</td>
                                                <td>".$data['t2Wrong']."</td>
                                                <td>".$data['t2Error']."</td>
                                            </tr>";
                                        }
                                    } catch (\Exception $e) {
                                        print_r($e->getMessage());
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>

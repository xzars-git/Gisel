      <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">calculate</i>
                      </div>
                      <p class="card-category">Total Percobaan</p>
                      <h3 class="card-title"><?= $progress['total'] ?></h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">check</i>
                      </div>
                      <p class="card-category">Percobaan Sukses</p>
                      <h3 class="card-title"><?= $progress['SuccessCount'] ?></h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">warning</i>
                      </div>
                      <p class="card-category">Percobaan Salah</p>
                      <h3 class="card-title"><?= $progress['WrongCount'] ?></h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">error_outline</i>
                      </div>
                      <p class="card-category">Percobaan Error</p>
                      <h3 class="card-title"><?= $progress['ErrorCount'] ?></h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          <?php $session = \Config\Services::session();
              echo $session->getFlashdata('msg'); ?>
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">manage_search</i>
                    </div>
                    <h4 class="card-title">Temukan Data</h4>
                  </div>
                  <div class="card-body">
                      <form action="sektor" method="post">
                        <div class="form-group label-floating">
                            <label for="sql" class="control-label">Masukkan Query SQL..</label>
                            <input type="text" id="sql" name="sql" class="form-control" required>
                        </div>
                        <div class="form-group label-floating">
                            <label for="id_sektor" class="control-label">id = <?= $_SESSION['idSektor']; ?></label>
                        </div>
                        <input type="submit" class="btn btn-round btn-success" value="Submit">
                      </form>
                  </div>
                </div>
            </div>
            <?php
            if(!empty($sektor)) { ?>
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">list</i>
                        </div>
                        <h4 class="card-title">Hasil Query</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>nama_sektor</th>
                                        <th>link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        try {
                                            foreach($sektor as $data) {
                                                echo "<tr>
                                                    <td>".$data[0]."</td>
                                                    <td>".$data[1]."</td>
                                                    <td><a href='".$data[2]."'>".$data[2]."</a></td>
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

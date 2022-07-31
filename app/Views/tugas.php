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
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">contact_support</i>
                    </div>
                    <h4 class="card-title">Panduan Mengerjakan</h4>
                  </div>
                  <div class="card-body ">
                    <p>Nama kolom yang ditampilkan tidak lagi didefinisikan sesuai dengan yang ada pada penjelasan di Menu Dashboard, melainkan sudah dilakukan penyesuaian agar mudah dibaca.</p>
                    <pre>Kolom id_tugas ditampilkan menjadi id
Kolom nama_tugas ditampilkan menjadi tugas
Kolom ketentuan ditampilkan menjadi ket</pre>
                    <p>Sehingga tidak dapat hanya dengan query: <pre>select * from tugas;</pre>Untuk dapat menampilkan data berdasarkan nama kolom di atas, gunakan sintax alias. Tabel yang ditampilkan akan seperti berikut:</p>
                    <table class="table" border='1'>
                        <thead>
                            <tr>
                                <th width='33%'>id</th>
                                <th width='33%'>tugas</th>
                                <th width='33%'>ket</th>
                            </tr>
                        </thead>
                    </table>
                    <p>Selain itu, tidak lagi ditampilkan kolom hari_ke dan jenis_tugas, sehingga kalian tidak dapat mengetahui tugas tersebut untuk hari ke berapa dan untuk individu atau kelompok. Kalian dapat menggunakan kondisi berdasarkan hari_ke dan juga jenis_tugas untuk menyeleksinya.</p>
                </div>
            </div>
          </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">manage_search</i>
                    </div>
                    <h4 class="card-title">Temukan Data</h4>
                  </div>
                  <div class="card-body">
                      <form action="tugas" method="post">
                        <div class="form-group label-floating">
                            <label for="sql" class="control-label">Masukkan Query SQL..</label>
                            <input type="text" id="sql" name="sql" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-round btn-success" value="Submit">
                      </form>
                  </div>
                </div>
            </div>
            <?php
            if(!empty($tugas)) { ?>
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
                                        <th>id_tugas</th>
                                        <th>tugas</th>
                                        <th>ket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        try {
                                            foreach($tugas as $data) {
                                                echo "<tr>
                                                    <td>".$data[0]."</td>
                                                    <td>".$data[1]."</td>
                                                    <td><pre>".$data[2]."</pre></td>
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

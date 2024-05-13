                  <div class="mb-3">
                    <label for="uspass" class="form-label text-info"><b>Enter current User Password :</b></label>
                    <input type="Password" id="uspass" name="uspasscheck" class="form-control" required >
                  </div>
                    <?php
                    if(isset($_POST['usname'])){
                        $curpassindp = $rowss['pass'];
                        $curpass = md5($_POST['uspasscheck']);
                          if ($curpassindp == $curpass) 
                          { ?>

                            <div class="mb-3">
                              <label for="np" class="form-label text-info"><b>Enter New User Password :</b></label>
                              <input type="Password" id="np" name="newpass" class="form-control" required >
                            </div>
                            <div class="mb-3">
                              <label for="cnp" class="form-label text-info"><b>Enter New User Password :</b></label>
                              <input type="Password" id="cnp" name="cnewpass" class="form-control" required >
                            </div>
                            <?php
                                $nps = $_POST['newpass'];
                                $cnps = $_POST['cnewpass'];
                                    if($nps == $cnps)
                                    {?>

                                      

                                  <?php  } 

                                  else {
                                    echo "Please enter correct password";
                                  }
                              
                          }
                          else
                          {
                            echo "Please enter correct current password";
                          }
                    }
                    ?>
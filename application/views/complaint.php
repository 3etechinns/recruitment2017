<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'views/header.php'); 
?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">History</h4>

                </div>
            </div>
            <?php if (!empty($message)): ?>
             <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $message?>
                    </div>
                </div>
            </div>
            <?php endif ?>
           
            <div class="row">
                <div class="col-md-12">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                          Log History
                                <div class="pull-right" >
							                                    <div class="dropdown">
							  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
							    <span class="glyphicon glyphicon-cog"></span>
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							    <li role="presentation"><a role="menuitem" tabindex="-1" href="complaint">Refresh</a></li>
							  </ul>
							</div>
							                                </div>
                            </div>
                            <div class="panel-body">
                                 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Issue Code</th>
                                            <th>Issue Severity</th>
                                            <th>Time</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($history as $key => $value): ?>
                                        <?php $i = 1;?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?= $value['name']?></td>
                                            <td><?= $value['description']?></td>
                                            <td><?= $value['code']?></td>
                                            <td><?= $value['severity']?></td>
                                            <td><?= date('D M Y',$value['time'])?></td>
                                            <td>
                                              <center><?= $value['progress'].'%'?></center>
                                               <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?= $value['progress']?>" aria-valuemin="0" aria-valuemax="100" style="width:  <?= $value['progress'].'%'?>">
                                                    </div>                         
                                                </div>
                                              </td>
                                            <td><?= ($value['status'] == 1)? 'Completed' : 'Pending' ?></td>
                                        </tr>
                                        <?php $i++;?>
                                      <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                               
                            </div>
                           
                        </div>
                    </div>
                    <hr />
                   
                </div>
           

                 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                </div>
                             <form action="complaint/add" method="post">	                                	
	                               <div class="modal-body">
	                                  <div class="form-group">
									    <label for="name">Product name</label>
									    <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required="required" />
									  </div>
									  <div class="form-group">
									    <label for="description">Description</label>
									    <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" required="required" /></textarea>
									  </div>
                                      <div class="form-group">
                                          <label for="severity">Severity</label>
                                          <select name="severity" id="severity" class="form-control">
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                          </select>
                                      </div>     
	                                </div>
	                            	<div class="modal-footer">
    	                            <button type="submit" class="btn btn-primary">Save</button>
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                            	</div>
                                </form>
                       		</div>
                        </div>
                    </div>

                     <div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                </div>
                                <form action="auth/login" method="post">	                                	
	                               <div class="modal-body">
	                                  <div class="form-group">
									    <label for="identity">Email address</label>
									    <input type="email" class="form-control" id="identity" name="identity" placeholder="Enter email" />
									  </div>
									  <div class="form-group">
									    <label for="password">Password</label>
									    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
									  </div>     
	                                </div>
	                            	<div class="modal-footer">
    	                            <button type="submit" class="btn btn-primary">Login</button>
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                            	</div>
                                </form>
                       		</div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; <?= date('Y')?> | By : Kweku Arko Mensah
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>

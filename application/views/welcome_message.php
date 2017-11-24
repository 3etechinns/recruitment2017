<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'views/header.php'); 
?>

    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>

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
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-venus dashboard-div-icon" ></i>
                        <h2><?= $total?></h2>
                         <h5>Total Issues Logged</h5>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-edit dashboard-div-icon" ></i>
                        <h2><?= $pending?></h2>
                         <h5>Pending Issues </h5>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-cogs dashboard-div-icon" ></i>
                        <h2><?= $complete?></h2>
                         <h5>Resolved Issues</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="fa fa-bell-o dashboard-div-icon" ></i>
                        <h2><?= $unresolve?></h2>
                        <!-- <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
  </div>
                           
</div> -->
                         <h5>Un-resolved Issues </h5>
                    </div>
                </div>

            </div>
           
            <div class="row">
                <div class="col-md-12">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Active  Notice Panel 
                                <div class="pull-right" >
							                                    <div class="dropdown">
							  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
							    <span class="glyphicon glyphicon-cog"></span>
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a></li>
							  </ul>
							</div>
							                                </div>
                            </div>
                            <div class="panel-body">
                               
                                <ul >
                                   
                                     <li>
                                            <a href="#">
                                     <span class="glyphicon glyphicon-align-left text-success" ></span> 
                                                  Lorem ipsum dolor sit amet ipsum dolor sit amet
                                                 <span class="label label-warning" > Just now </span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-info-sign text-danger" ></span>  
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-info" > 2 min chat</span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span>  
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-success" >GO ! </span>
                                            </a>
                                    </li>
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-edit  text-danger" ></span>  
                                          Lorem ipsum dolor sit amet ipsum dolor sit amet
                                          <span class="label label-success" >Let's have it </span>
                                            </a>
                                    </li>
                                   </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-repeat"></i> Just A Small Footer Button</a>
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
                                            <h4 class="modal-title" id="myModalLabel">Complaint</h4>
                                </div>
                             <form action="complaint/add" method="post">	                                	
	                               <div class="modal-body">
	                                  <div class="form-group">
									    <label for="name">Product name</label>
									    <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required="required" minlength="8" />
									  </div>
									  <div class="form-group">
                      <label for="description">Description</label>
                      <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" required="required" minlength="10" /></textarea>
                    </div>
                    <div class="form-group">
									    <label for="email">Email</label>
									    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required" />
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
                                            <h4 class="modal-title" id="myModalLabel">Sign in as Developer</h4>
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

<?php include "header.php";?>
<?php
if (empty($_SESSION['userId'])) {
    echo '<script type="text/javascript">window.location.replace("login.php");</script>';
    // header('Location: login.php');
}
?>

<body>
<?php include "mainnav.php";?>

	<div id="container">
	<?php include "sidenav.php";?>

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.php">Dashboard</a>
						</li>
						<li class="current">
							<a href="#" title="">User Profile</a>
						</li>
					</ul>

					<ul class="crumb-buttons">
						<li><a href="charts.html" title=""><i class="icon-signal"></i><span>Statistics</span></a></li>
						<li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="icon-tasks"></i><span>Users <strong>(+3)</strong></span><i class="icon-angle-down left-padding"></i></a>
							<ul class="dropdown-menu pull-right">
							<li><a href="form_components.html" title=""><i class="icon-plus"></i>Add new User</a></li>
							<li><a href="tables_dynamic.html" title=""><i class="icon-reorder"></i>Overview</a></li>
							</ul>
						</li>
						<li class="range"><a href="#">
							<i class="icon-calendar"></i>
							<span></span>
							<i class="icon-angle-down"></i>
						</a></li>
					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>User Profile</h3>
						<span>Howdy, John!</span>
					</div>

					<!-- Page Stats -->
					<ul class="page-stats">
						<li>
							<div class="summary">
								<span>New orders</span>
								<h3>17,561</h3>
							</div>
							<div id="sparkline-bar" class="graph sparkline hidden-xs">20,15,8,50,20,40,20,30,20,15,30,20,25,20</div>
							<!-- Use instead of sparkline e.g. this:
							<div class="graph circular-chart" data-percent="73">73%</div>
							-->
						</li>
						<li>
							<div class="summary">
								<span>My balance</span>
								<h3>$21,561.21</h3>
							</div>
							<div id="sparkline-bar2" class="graph sparkline hidden-xs">20,15,8,50,20,40,20,30,20,15,30,20,25,20</div>
						</li>
					</ul>
					<!-- /Page Stats -->
				</div>
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Inline Tabs ===-->
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_overview" data-toggle="tab">Overview</a></li>
								<li><a href="#tab_edit_account" data-toggle="tab">Edit Account</a></li>
							</ul>
							<div class="tab-content row">
								<!--=== Overview ===-->
								<div class="tab-pane active" id="tab_overview">
									<div class="col-md-3">
										<div class="list-group">
											<li class="list-group-item no-padding">
												<img src="assets/img/demo/avatar-large.jpg" alt="">
											</li>
											<a href="javascript:void(0);" class="list-group-item">Projects</a>
											<a href="javascript:void(0);" class="list-group-item">Messages</a>
											<a href="javascript:void(0);" class="list-group-item"><span class="badge">3</span>Friends</a>
											<a href="javascript:void(0);" class="list-group-item">Settings</a>
										</div>
									</div>

									<div class="col-md-9">
										<div class="row profile-info">
											<div class="col-md-7">
												<!-- <div class="alert alert-info">You will receive all future updates for free!</div> -->
												<h1><?php echo $_SESSION['user_details']['displayname']; ?></h1>

												<dl class="dl-horizontal">
													<dt>Description lists</dt>
													<dd>A description list is perfect for defining terms.</dd>
													<dt>Euismod</dt>
													<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
													<dd>Donec id elit non mi porta gravida at eget metus.</dd>
													<dt>Malesuada porta</dt>
													<dd>Etiam porta sem malesuada magna mollis euismod.</dd>
													<dt>Felis euismod semper eget lacinia</dt>
													<dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
												</dl>

												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.</p>
											</div>
											<div class="col-md-5">
												<div class="widget">
													<div class="widget-header">
														<h4><i class="icon-reorder"></i> Sales</h4>
													</div>
													<div class="widget-content">
														<div id="chart_filled_blue" class="chart"></div>
													</div>
												</div>
											</div>
										</div> <!-- /.row -->

										<div class="row">
											<div class="col-md-12">
												<div class="widget">
													<div class="widget-content">
														<table class="table table-hover table-striped">
															<thead>
																<tr>
																	<th>#</th>
																	<th>First Name</th>
																	<th>Last Name</th>
																	<th class="hidden-xs">Username</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>1</td>
																	<td>Joey</td>
																	<td>Greyson</td>
																	<td class="hidden-xs">joey123</td>
																	<td><span class="label label-success">Approved</span></td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>Wolf</td>
																	<td>Bud</td>
																	<td class="hidden-xs">wolfy</td>
																	<td><span class="label label-info">Pending</span></td>
																</tr>
																<tr>
																	<td>3</td>
																	<td>Darin</td>
																	<td>Alec</td>
																	<td class="hidden-xs">alec82</td>
																	<td><span class="label label-warning">Suspended</span></td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>Andrea</td>
																	<td>Brenden</td>
																	<td class="hidden-xs">andry</td>
																	<td><span class="label label-danger">Blocked</span></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<!-- /Striped Table -->
										</div> <!-- /.row -->
									</div> <!-- /.col-md-9 -->
								</div>
								<!-- /Overview -->

								<!--=== Edit Account ===-->
								<div class="tab-pane" id="tab_edit_account">
									<form action="php_action/changePassword.php" method="post" id="changePasswordForm" class="form-horizontal">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
													<h4>General Information</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Display name:</label>
																<div class="col-md-8"><input type="text" name="disply_name" class="form-control" 
																value="<?php echo $_SESSION['user_details']['displayname'] ?>"></div>
															</div>
														</div>

														<!-- <div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Gender:</label>
																<div class="col-md-8">
																	<select class="form-control">
																		<option value="male" selected="selected">Male</option>
																		<option value="female">Female</option>
																	</select>
																</div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Age:</label>
																<div class="col-md-8"><input type="text" name="regular" class="form-control input-width-small" value="28"></div>
															</div>
														</div> -->
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->
										</div> <!-- /.col-md-12 -->

										<div class="col-md-12 form-vertical no-margin">
											<div class="widget">
												<div class="widget-header">
													<h4>Settings</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-4 col-lg-2">
															<strong class="subtitle padding-top-10px">Permanent username</strong>
															<p class="text-muted">Username for login</p>
														</div>

														<div class="col-md-8 col-lg-10">
															<div class="form-group">
																<label class="control-label padding-top-10px">Username:</label>
																<input type="text" name="username" class="form-control" 
																value="<?php echo $_SESSION['user_details']['username'] ?>" disabled="disabled">
															</div>
														</div>
													</div> <!-- /.row -->
													<div class="row">
														<div class="col-md-4 col-lg-2">
															<strong class="subtitle">Change password</strong>
															<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
														</div>

														<div class="col-md-8 col-lg-10">
															<div class="form-group">
																<label class="control-label">Old password:</label>
																<input type="password" name="old_password" class="form-control" placeholder="Leave empty for no password-change">
															</div>

															<div class="form-group">
																<label class="control-label">New password:</label>
																<input type="password" name="new_password" class="form-control" placeholder="Leave empty for no password-change">
															</div>

															<div class="form-group">
																<label class="control-label">Repeat new password:</label>
																<input type="password" name="new_password_repeat" class="form-control" placeholder="Leave empty for no password-change">
															</div>
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->

											<div class="form-actions">
												<input type="submit" value="Update Account" class="btn btn-primary pull-right">
											</div>
										</div> <!-- /.col-md-12 -->
									</form>
								</div>
								<!-- /Edit Account -->
							</div> <!-- /.tab-content -->
						</div>
						<!--END TABS-->
					</div>
				</div> <!-- /.row -->
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>

</body>
</html>
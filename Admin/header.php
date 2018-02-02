<header class="header">
				<div class="logo-container">
					<a href="index.php" class="logo">
						<img src="assets/images/logo-default.png" height="35" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
					<?php 
				      $user_name=$_SESSION["systemadmin"]; 
				      $sql="SELECT * from billing_user where user_name='$user_name'";
				      $result=mysql_query($sql);
				      while(@$row = mysql_fetch_assoc($result))
				        {
				    ?>
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="index.php" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="assets/images/logo.png" class="img-circle" data-lock-picture="assets/images/logo.png" />
							</figure>
							<div class="profile-info" data-lock-name="<?php echo $row["user_name"]; ?>" data-lock-email="<?php echo $row["e_mail"]; ?>">
								<span class="name"><?php echo $row["first_name"];?></span>
								<span class="role"><?php echo $row["user_address"];?></span>
							</div>
							
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<!-- <li>
									<a role="menuitem" tabindex="-1" href="profile.php"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="password.php"><i class="fa fa-lock"></i> Change Password</a>
								</li> -->
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
					<?php } ?>
				</div>
				<!-- end: search & user box -->
			</header>
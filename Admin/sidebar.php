<aside id="sidebar-left" class="sidebar-left">
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<?php  

                                    	$user_name=$_SESSION["systemadmin"]; 
	                                    $sql = mysql_query("SELECT * FROM billing_user_access WHERE user_name='$user_name'") or die(mysql_error());
	                                              
	                                    while($row = mysql_fetch_object($sql))
	                                    {
                                	?>
                                	 <?php
	                                    if($row->dashboard_menu)
	                                        {?>
									<li class="nav-active">
										<a href="index.php">
											<i class="fa fa-tachometer" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<?php }
	                                    else
	                                        {
	                                        }
	                                ?>
	                                <?php
	                                    if($row->control_pannel_menu)
	                                        {?>
									<li class="">
										<a href="control.php">
											<i class="fa fa-cogs"" aria-hidden="true"></i>
											<span>Control Pannel</span>
										</a>
									</li>
									<?php }
	                                    else
	                                        {
	                                        }
	                                ?>
	                                <?php
	                                    if($row->branch_control_menu)
	                                        {?>
									<li class="">
										<a href="../Admin/branch.php">
											<i class="fa fa-sitemap"" aria-hidden="true"></i>
											<span>Branch Control</span>
										</a>
									</li>
									<?php }
	                                    else
	                                        {
	                                        }
	                                ?>
	                                 <?php
	                                    if($row->suppliers_menu)
	                                        {?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-truck" aria-hidden="true"></i>
											<span>Supplier's Account</span>
										</a>
										<ul class="nav nav-children">
											<?php
                                                if($row->suppliers_create_purchase)
                                                    {?>
                                            <li><a href="create_purchase.php">Create Purchase</a></li>
                                            	<?php }
			                                    else
			                                        {
			                                        }
			                                ?>
			                                <?php
                                                if($row->suppliers_create_purchase_return)
                                                    {?>
                                            <li><a href="create_purchase_return.php">Create Purchase Return</a></li>
                                            <?php }
                                                else
                                                    {
                                                    }
                                            ?>
                                            <?php
                                                if($row->suppliers_purchase_transaction)
                                                    {?>
                                            <li><a href="purchase_transaction.php">Purchase Transaction</a></li>
                                            <?php }
                                                else
                                                    {
                                                    }
                                            ?>
                                            <?php
                                                if($row->suppliers_purchase_payment)
                                                    {?>
                                            <li><a href="purchase_payment.php">Purchase Payment</a></li>
                                            <?php }
                                                else
                                                    {
                                                    }
                                            ?>
                                            <?php
                                                if($row->suppliers_enter_opening_balance)
                                                    {?>
                                            <li><a href="enter_opening_vendor_bal.php">Enter Opening Balance</a></li>
                                            <?php }
                                                else
                                                    {
                                                    }
                                            ?>
										</ul>
									</li>
									<?php }
	                                    else
	                                        {
	                                        }
                                	?>
                                	<?php
                                        if($row->bank_menu)
                                           {?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-bank" aria-hidden="true"></i>
											<span>Banking Transaction</span>
										</a>
										<ul class="nav nav-children">
											<?php
                                                if($row->bank_cash_deposit)
                                                    {?>
											<li><a href="cash_deposite.php">Cash Deposite</a></li>
											<?php }
                                                else
                                                    {
                                                    }
                                            ?>
                                            <?php
                                                if($row->bank_cash_withdrawn)
                                                    {?>
											<li><a href="withdrawn.php">Cash Withdrawn</a></li>
											<?php }
		                                        else
		                                            {
		                                            }
                                    		?>
                                    		<?php
                                                if($row->bank_bank_balance)
                                                    {?>
											<li><a href="bank_balance.php">Bank Balance</a></li>
											<?php }
		                                        else
		                                            {
		                                            }
                                    		?>
										</ul>
									</li>
									<?php }
                                        else
                                            {
                                            }
                                    ?>
                                    <?php
                                        if($row->stock_menu)
                                           {?>
										<li class="nav-parent">
											<a>
												<i class="fa fa-compass" <i class="fa fa-list-alt" aria-hidden="true"></i>
												<span>Stock Management</span>
											</a>
											<ul class="nav nav-children">
												<?php
                                                	if($row->stock_check_stock)
                                                    {?>
													<li>
														<a href="check_stock.php">
															 Check Stock
														</a>
													</li>
												<?php }
			                                        else
			                                            {
			                                            }
                                    			?>
                                    			<?php
                                                	if($row->stock_check_out_to_branch)
                                                    {?>
													<li>
														<a href="check_out_to_branch.php">
															 Check Out To Branch
														</a>
													</li>
												<?php }
			                                        else
			                                            {
			                                            }
                                    			?>
											</ul>
										</li>
									<?php }
		                                else
		                                    {
		                                    }
                                   	?>
								<?php } ?>
								</ul>

							</nav>
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
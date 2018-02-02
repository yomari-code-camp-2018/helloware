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
                    <li class="nav-active">
                        <a href="index.php">
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php
                    $user_name=$_SESSION["systemadmin"];
                    $sql = mysql_query("SELECT * FROM billing_user_access WHERE user_name='$user_name'") or die(mysql_error());
                    
                    while($row = mysql_fetch_object($sql))
                    {
                    ?>
                    <?php
                    if($row->bank_menu)
                    {?>
                    <li  class="nav-parent">
                        <a>
                            <i class="fa fa-bank" aria-hidden="true"></i>
                            <span>Banking Transaction</span>
                        </a>
                        <ul class="nav nav-children">
                            <?php
                            if($row->bank_cash_deposite)
                            {?>
                            <li><a href="cash_deposite.php"><span class="icon-baby2"></span> Cash Deposite</a></li>
                            <?php }
                                    else
                                    {
                                    }
                            ?>
                            <?php
                            if($row->bank_cash_deposite)
                            {?>
                            <li><a href="cheque_issue.php"><span class="icon-baby2"></span>Cheque issue</a></li>
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
                        </ul>
                    </li>
                    <?php }
                    else
                    {
                    }
                    ?>
                    <?php
                    if($row->stock_management_menu)
                    {?>
                    <li  class="nav-parent">
                        <a>
                            <i class="fa fa-compass" aria-hidden="true"></i>
                            <span>Stock Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <?php
                            if($row->stock_check)
                            {?>
                            <li><a href="check_stock.php"><span class="icon-baby2"></span>Check Stock</a></li>
                            <?php }
                                        else
                                        {
                                        }
                            ?>
                            <?php
                            if($row->stock_check)
                            {?>
                            <li><a href="product.php"><span class="icon-baby2"></span>Product Management</a></li>
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
                    if($row->report_menu)
                    {?>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-pie-chart" aria-hidden="true"></i>
                            <span>Report</span>
                        </a>
                        <ul class="nav nav-children">
                            <?php
                            if($row->report_today)
                            {?>
                            <li>
                                <a href="todays_report.php">
                                    Today's Report
                                </a>
                            </li>
                            <?php }
                            else
                            {
                            }
                            ?>
                            <?php
                            if($row->report_today)
                            {?>
                            <li>
                                <a href="overall_report.php">
                                    Overall Report
                                </a>
                            </li>
                            <?php }
                            else
                            {
                            }
                            ?>
                            <?php
                            if($row->report_today)
                            {?>
                            <li>
                                <a href="todays_report_emp.php">
                                    Employee Report
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
                    <?php
                    if($row->suppliers_menu)
                    {?>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-group" aria-hidden="true"></i>
                            <span>Member Card</span>
                        </a>
                        <ul class="nav nav-children">
                            <?php
                            if($row->suppliers_create_purchase)
                            {?>
                            <li><a href="membership_add.php">Add Member</a></li>
                            <?php }
                            else
                            {
                            }
                            ?>
                            <?php
                            if($row->suppliers_create_purchase_return)
                            {?>
                            <li><a href="member_ship.php">Search Member</a></li>
                            <?php }
                            else
                            {
                            }
                            ?>
                            <?php
                            if($row->suppliers_create_purchase_return)
                            {?>
                            <li><a href="member_ship_below_thirty.php">About To Expire</a></li>
                            <?php }
                            else
                            {
                            }
                            ?>
                            <?php
                            if($row->suppliers_create_purchase_return)
                            {?>
                            <li><a href="membership_expired.php">Expired List</a></li>
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
                </ul>
                <?php } ?>
            </nav>
            <hr class="separator" />
        </div>
        
    </div>
    
</aside>
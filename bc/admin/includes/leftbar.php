	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
			<?php	if($_SESSION['post']=="admin"){?>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			
<li><a href="manage-brands.php"><i class="fa fa-files-o"></i> Brands</a>
</li>
<?php }
if($_SESSION['post']=="admin"){?>
<li><a href="#"><i class="fa fa-sitemap"></i> Camera</a>
					<ul>
						<li><a href="post-acamera.php">Post a camera</a></li>
						<li><a href="manage-Camera.php">Manage Camera</a></li>
					</ul>
				</li>
				<?php }
if($_SESSION['post']=="camOwner"){?>
<li><a href="manage-Camera.php"><i class="fa fa-sitemap"></i>Manage Camera</a><?php
}
				if($_SESSION['post']=="admin"){ ?>
				<li><a href="manage-bookings.php"><i class="fa fa-users"></i> Manage Booking</a></li>

				<li><a href="testimonials.php"><i class="fa fa-table"></i> Manage Testimonials</a></li>
				<li><a href="manage-conactusquery.php"><i class="fa fa-desktop""></i> Manage Conatctus Query</a></li>
			<li><a href="manage-pages.php"><i class="fa fa-files-o"></i> Manage Pages</a></li>
			<li><a href="update-contactinfo.php"><i class="fa fa-files-o"></i> Update Contact Info</a></li>
			<li><a href="#"><i class="fa fa-sitemap"></i> Users</a>
            					<ul>
            					<li><a href="reg-users.php">Reg Customer</a></li>
            						<li><a href="add-users.php">Add Users</a></li>
            						<li><a href="view-users.php">View Users</a></li>
            					</ul>
            				</li>
<?php } if($_SESSION['post']=="admin" || $_SESSION['post']=="delivery"){?>
<li><a href="delivery.php"><i class="fa fa-files-o"></i> Delivery Info</a></li>
<?php }?>
			<li><a href="#"><i class="fa fa-sitemap"></i> Account</a>
            					<ul>
            						<li><a href="change-password.php">Change Password</a></li>
                                     <li><a href="logout.php">Logout</a></li>
            					</ul>
            				</li>
            				</ul>
		</nav>
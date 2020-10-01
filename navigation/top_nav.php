<div class="topnav">
		<div class="username">
			<!-- <?php date_default_timezone_set("Asia/Kuala_Lumpur");
			echo "<span class='top_datetime'>".date('d-m-Y')."</span>";?> -->
			<a id="username" href="#" onclick="dropdown('username')"><img id="usrPic" src="../resources/images/profile-top-bar-01.png" class="user-top-nav"></img> 
				<!-- <?php
					$result = select_user($userId);

					while($row = mysqli_fetch_array($result))
					{
						echo $row['name']; 
					}
				?> -->
			</a>

			<div class="d-down">
				<div class="dropdown-username">
					<ul>
						<li><a class="profile" name="profile" href="changepw.php">Change Password</a></li>
						<li><a class="profile" name="profile" href="profile.php">Edit Profile</a></li>	
						<li><a class="lgout" name="lgout" href="logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>

			
		</div>

		<script src="../dependencies/scripts/profile.js"></script>
</div>
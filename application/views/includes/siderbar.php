<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="<?php echo SURL.'Login';?>">
					<img src="uploads/logo.png"" width="120" alt="" />
				</a>
			</div>
			
						<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
									
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		
		
				
		
				
		<ul id="main-menu" class="">

			<?php 
				
				  $user_status = $this->db->query("select user_status from users where '".$this->session->userdata('distributor')."'")->row()->user_status;

				 		$query = $this->db->query("select * from main_menu");
				


				foreach ($query->result() as $key => $value) { 

					if($this->router->fetch_class() == $value->pagename){
						$activepage =  "opened active";
					}else{
						$activepage = "";
					}
                   
                    if($this->session->userdata("moderator")){
                        
                        if($value->pagename=="Management" || $value->pagename=="Logout" || $value->pagename=="Dashboard"){
                            
                        }else{
                            continue;
                        }
                        
                    }


			?>	
				<li class="<?php echo $activepage; ?>"> 
				<?php 	if($this->session->userdata("moderator")){ ?>
					<a href="<?php if($value->pagename == "Dashboard"){echo base_url("ModeratorDashboard");}else{}?>">
						<i class="<?php echo $value->icon; ?>"></i>
						<span><?php echo $value->pagename;?></span>
					</a>
				<?php }else{?>
				
				    <a href="<?php if($value->pagename == "Dashboard"){echo base_url("Dashboard");}else{}?>">
						<i class="<?php echo $value->icon; ?>"></i>
						<span><?php echo $value->pagename;?></span>
					</a>
				<?php 
				}
				?>

					<?php
					$activepage=""; 
						$query = $this->db->query("select * from submenu where parentid='".$value->id."'");
						if($query->num_rows() > 0){
							foreach ($query->result() as $key => $value) { 	
                                
                                
                                
								if($this->router->fetch_class() == $value->subpagename){
									$activepage =  "active";
								}else{
									$activepage = "";
								}
								
								

								if($user->user_status == "Employee"){
									$hide = 0;	
									$con['conditions'] = array("u_id"=>$this->session->userdata['distributor'],"page_id"=>$value->id);
									$page_access = $this->common->count_record("user_rights",$con);
									if($page_access > 0){
										$hide = 1;
									}	

								}else{
									$hide = 1;
								}
								
								if($this->session->userdata("moderator")){
                                   
                                    if($value->pageurl=="Jobsadmin" || $value->pageurl=="Messagereports"){
                                         $hide = 1;	
                                    }else{ 
                                        continue;
                                    }
                                    
                                }
                                
								
								if($hide == 1){
					?>	

					<ul>
						<li class="<?php echo $activepage; ?>">
							<a href="<?php echo $value->pageurl;?> ">
								<span><?php echo $value->subpagename; ?></span>
							</a>
						</li>				
						
					</ul>

				    <?php }}} ?>
					
				</li>

			<?php } ?>
			
	
			
		
			<li>
				<a href="<?php echo SURL;?>Logout">
					<i class="entypo-chart-bar"></i>
					<span>Logout</span>
				</a>
			</li>
		</ul>
				
	</div>	
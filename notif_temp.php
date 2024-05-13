<?php if ($_SESSION['username']=='sekda'){?>
<div class="logo-container">
					<a href="" class="logo">
						
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<div>
					
				<span class="separator"></span>
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Ngijorejo
								<?php
								   $q3="select * from suket_ektp where username='ngijorejo' and bc='1'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='ngijorejo' and bc='1'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where kelahiran.username='ngijorejo' and bc='1'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='ngijorejo' and bc='1'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='ngijorejo' and bc='1'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="kematian_masuk.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="kelahiran_masuk.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Masuk</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="pin_masuk.php?id=<?php echo $xx['id_datang']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar</a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="pin_keluar.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Kalidadap
								<?php
								   $q3="select * from suket_ektp where username='kalidadap' and bc='1'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='kalidadap' and bc='1'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where kelahiran.username='kalidadap' and bc='1'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='kalidadap' and bc='1'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='kalidadap' and bc='1'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="kematian_masuk.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="kelahiran_masuk.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Masuk</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="pin_masuk.php?id=<?php echo $xx['id_datang']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar</a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="pin_keluar.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Jatirejo
								<?php
								   $q3="select *from suket_ektp where username='jatirejo' and bc='1'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='jatirejo' and bc='1'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='jatirejo' and bc='1'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='jatirejo' and bc='1'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='jatirejo' and bc='1'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="kematian_masuk.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="kelahiran_masuk.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Masuk</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="pin_masuk.php?id=<?php echo $xx['id_datang']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar</a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="pin_keluar.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								
							</ul>
						</div>
					</div>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Gatak
								<?php
								   $q3="select * from suket_ektp where username='gatak' and bc='1'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='gatak' and bc='1'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='gatak' and bc='1'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='gatak' and bc='1'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='gatak' and bc='1'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="kematian_masuk.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" ><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="kelahiran_masuk.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1"><i class="fa fa-edit"></i>Permohonan Surat Pindah Masuk</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="pin_masuk.php?id=<?php echo $xx['id_datang']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href=""><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar</a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="pin_keluar.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Gari
								<?php
								   $q3="select * from suket_ektp where username='gari' and bc='1'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='gari' and bc='1'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='gari' and bc='1'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='gari' and bc='1'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='gari' and bc='1'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="kematian_masuk.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="kelahiran_masuk.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Masuk</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="pin_masuk.php?id=<?php echo $xx['id_datang']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar</a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="pin_keluar.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li>
							</ul>
						</div>
					</div>
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Gelung
								<?php
								   $q3="select * from suket_ektp where username='gelung' and bc='1'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='gelung' and bc='1'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='gelung' and bc='1'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='gelung' and bc='1'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='gelung' and bc='1'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="kematian_masuk.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="kelahiran_masuk.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Masuk</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="pin_masuk.php?id=<?php echo $xx['id_datang']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar</a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="pin_keluar.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li>
							</ul>
						</div>
					</div>
						<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Tegalrejo
								<?php
								   $q3="select * from suket_ektp where username='tegalrejo' and bc='1'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='tegalrejo' and bc='1'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where kelahiran.username='tegalrejo' and bc='1'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='tegalrejo' and bc='1'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='tegalrejo' and bc='1'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="kematian_masuk.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="kelahiran_masuk.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Masuk</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="pin_masuk.php?id=<?php echo $xx['id_datang']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar</a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="pin_keluar.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Ngelorejo
								<?php
								   $q3="select * from suket_ektp where username='ngelorejo' and bc='1'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='ngelorejo' and bc='1'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='ngelorejo' and bc='1'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='ngelorejo' and bc='1'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='ngelorejo' and bc='1'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="kematian_masuk.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="kelahiran_masuk.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Masuk</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="pin_masuk.php?id=<?php echo $xx['id_datang']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar</a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="pin_keluar.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
						<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Gondangrejo
								<?php
								   $q3="select * from suket_ektp where username='gondangrejo' and bc='1'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='gondangrejo' and bc='1'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='gondangrejo' and bc='1'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='gondangrejo'and bc='1'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='gondangrejo'and bc='1'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan E-KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="ektp_masuk.php?id=<?php echo $r['id_ektp']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="kematian_masuk.php?id=<?php echo $rr['id_kematian']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="kelahiran_masuk.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Masuk</a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="pin_masuk.php?id=<?php echo $xx['id_datang']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar</a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="pin_keluar.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span>
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span class="message">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									</a>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							
							</figure>
							
							<a href="logout.php" >
								Logout
								
								
							</a>
			
							
						</a>
			
						
					</div>
					</div>
<?php } ?>
<?php if ($_SESSION['username']=='ngijorejo'){?>
<div class="logo-container">
					<a  class="logo">
						<img src="img/gg.png" height="40" width="200">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<div class="header-right">
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Pemberitahuan
								<?php
								    $q3="select * from suket_ektp where username='ngijorejo' and bc='2'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='ngijorejo' and bc='2'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='ngijorejo' and bc='2'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='ngijorejo' and bc='2'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='ngijorejo' and bc='2'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="not_ktp.php?id=<?php echo $r['id_ektp']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                    </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="not_kematian.php?id=<?php echo $rr['id_kematian']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="not_kelahiran.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Datang </a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="not_pin_dt.php?id=<?php echo $xx['id_datang']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                           <span style="color:red">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar </a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="not_pin_kl.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
					</div>
<?php } ?>
<?php if ($_SESSION['username']=='kalidadap'){?>
<div class="logo-container">
					<a  class="logo">
						<img src="img/gg.png" height="40" width="200">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<div class="header-right">
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Pemberitahuan
								<?php
								    $q3="select * from suket_ektp where username='kalidadap' and bc='2'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='kalidadap' and bc='2'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where kelahiran.username='kalidadap' and bc='2'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='kalidadap' and bc='2'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='kalidadap' and bc='2'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="not_ktp.php?id=<?php echo $r['id_ektp']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                    </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="not_kematian.php?id=<?php echo $rr['id_kematian']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="not_kelahiran.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Datang </a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="not_pin_dt.php?id=<?php echo $xx['id_datang']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar </a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="not_pin_kl.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
					</div>
<?php } ?>
<?php if ($_SESSION['username']=='jatirejo'){?>
<div class="logo-container">
					<a  class="logo">
						<img src="img/gg.png" height="40" width="200">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<div class="header-right">
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Pemberitahuan
								<?php
								    $q3="select * from suket_ektp where username='jatirejo' and bc='2'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='jatirejo' and bc='2'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='jatirejo' and bc='2'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='jatirejo' and bc='2'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='jatirejo' and bc='2'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="not_ktp.php?id=<?php echo $r['id_ektp']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                    </span>
                                           <span style="color:red">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="not_kematian.php?id=<?php echo $rr['id_kematian']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                           <span style="color:red">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="not_kelahiran.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Datang </a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="not_pin_dt.php?id=<?php echo $xx['id_datang']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar </a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="not_pin_kl.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
					</div>
<?php } ?>
<?php if ($_SESSION['username']=='gatak'){?>
<div class="logo-container">
					<a  class="logo">
						<img src="img/gg.png" height="40" width="200">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<div class="header-right">
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Pemberitahuan
								<?php
								    $q3="select * from suket_ektp where username='gatak' and bc='2'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='gatak' and bc='2'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where kelahiran.username='gatak' and bc='2'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='gatak' and bc='2'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='gatak' and bc='2'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="not_ktp.php?id=<?php echo $r['id_ektp']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                    </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="not_kematian.php?id=<?php echo $rr['id_kematian']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="not_kelahiran.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Datang </a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="not_pin_dt.php?id=<?php echo $xx['id_datang']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar </a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="not_pin_kl.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
					</div>
<?php } ?>
<?php if ($_SESSION['username']=='gari'){?>
<div class="logo-container">
					<a  class="logo">
						<img src="img/gg.png" height="40" width="200">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<div class="header-right">
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Pemberitahuan
								<?php
								    $q3="select * from suket_ektp where username='gari' and bc='2'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='gari' and bc='2'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='gari' and bc='2'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='gari' and bc='2'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='gari' and bc='2'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="not_ktp.php?id=<?php echo $r['id_ektp']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                    </span >
                                            <span style="color:red">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
											 <span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="not_kematian.php?id=<?php echo $rr['id_kematian']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
											<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="not_kelahiran.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Datang </a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="not_pin_dt.php?id=<?php echo $xx['id_datang']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
											<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar </a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="not_pin_kl.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
					</div>
<?php } ?>
<?php if ($_SESSION['username']=='gelung'){?>
<div class="logo-container">
					<a  class="logo">
						<img src="img/gg.png" height="40" width="200">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<div class="header-right">
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Pemberitahuan
								<?php
								    $q3="select * from suket_ektp where username='gelung' and bc='2'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='gelung' and bc='2'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='gelung' and bc='2'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='gelung' and bc='2'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='gelung' and bc='2'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="not_ktp.php?id=<?php echo $r['id_ektp']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                    </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="not_kematian.php?id=<?php echo $rr['id_kematian']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                           <span style="color:red">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="not_kelahiran.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                           <span style="color:red">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Datang </a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="not_pin_dt.php?id=<?php echo $xx['id_datang']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                           <span style="color:red">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar </a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="not_pin_kl.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
					</div>
<?php } ?>
<?php if ($_SESSION['username']=='tegalrejo'){?>
<div class="logo-container">
					<a  class="logo">
						<img src="img/gg.png" height="40" width="200">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<div class="header-right">
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Pemberitahuan
								<?php
								    $q3="select * from suket_ektp where username='tegalrejo' and bc='2'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='tegalrejo' and bc='2'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='tegalrejo' and bc='2'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='tegalrejo' and bc='2'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='tegalrejo' and bc='2'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="not_ktp.php?id=<?php echo $r['id_ektp']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                    </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="not_kematian.php?id=<?php echo $rr['id_kematian']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="not_kelahiran.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Datang </a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="not_pin_dt.php?id=<?php echo $xx['id_datang']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar </a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="not_pin_kl.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
					</div>
<?php } ?>
<?php if ($_SESSION['username']=='ngelorejo'){?>
<div class="logo-container">
					<a  class="logo">
						<img src="img/gg.png" height="40" width="200">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<div class="header-right">
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Pemberitahuan
								<?php
								    $q3="select * from suket_ektp where username='ngelorejo' and bc='2'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='ngelorejo' and bc='2'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='ngelorejo' and bc='2'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='ngelorejo' and bc='2'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='ngelorejo' and bc='2'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="not_ktp.php?id=<?php echo $r['id_ektp']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                    </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="not_kematian.php?id=<?php echo $rr['id_kematian']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="not_kelahiran.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Datang </a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="not_pin_dt.php?id=<?php echo $xx['id_datang']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar </a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="not_pin_kl.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
					</div>
<?php } ?>
<?php if ($_SESSION['username']=='gondangrejo'){?>
<div class="logo-container">
					<a  class="logo">
						<img src="img/gg.png" height="40" width="200">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<div class="header-right">
<div id="userbox" class="userbox">
						
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-bell"></i> 
							
							</figure>
							
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								&nbsp;Pemberitahuan
								<?php
								    $q3="select * from suket_ektp where username='gondangrejo' and bc='2'";
									$results1 = mysqli_query($connect,$q3) or die("Error: ".mysqli_error($connect));
									$row4=mysqli_num_rows($results1);
									
									$q="select * from kematian where username='gondangrejo' and bc='2'";
									$results = mysqli_query($connect,$q) or die("Error: ".mysqli_error($connect));
									$row=mysqli_num_rows($results);
									
									$x1="select * from kelahiran where username='gondangrejo' and bc='2'";
									$y1 = mysqli_query($connect,$x1) or die("Error: ".mysqli_error($connect));
									$z1=mysqli_num_rows($y1);
									
									$n1="select * from pindah_datang where username='gondangrejo' and bc='2'";
									$i1 = mysqli_query($connect,$n1) or die("Error: ".mysqli_error($connect));
									$k1=mysqli_num_rows($i1);
									
									$n2="select * from pindah_keluar where username='gondangrejo' and bc='2'";
									$i2 = mysqli_query($connect,$n2) or die("Error: ".mysqli_error($connect));
									$k2=mysqli_num_rows($i2);
									
									$r=$row4+$row+$z1+$k1+$k2;
                                    ?>
								<span class="badge"><?php echo $r; ?></span>
								
							</a>
			
							
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan KTP</a>
									<?php 
									 while ($r=mysqli_fetch_array($results1)){
									?>
									<a href="not_ktp.php?id=<?php echo $r['id_ektp']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($r["tanggal_permohonan"]));?></span>
                                    </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $r['id_ektp']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kematian</a>
									<?php 
									 while ($rr=mysqli_fetch_array($results)){
									?>
									<a href="not_kematian.php?id=<?php echo $rr['id_kematian']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($rr["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $rr['id_kematian']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Kelahiran</a>
									<?php 
									 while ($zx=mysqli_fetch_array($y1)){
									?>
									<a href="not_kelahiran.php?id=<?php echo $zx['id_kelahiran']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($zx["tanggal_lapor"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $zx['id_kelahiran']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Datang </a>
									<?php 
									 while ($xx=mysqli_fetch_array($i1)){
									?>
									<a href="not_pin_dt.php?id=<?php echo $xx['id_datang']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx["tgl_datang"]));?></span>
                                            </span>
                                            <span style="color:red">
                                            No.Surat : <?php echo $xx['id_datang']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
								<li>
									<a role="menuitem" tabindex="-1" href="profil1.php"><i class="fa fa-edit"></i>Permohonan Surat Pindah Keluar </a>
									<?php 
									 while ($xx2=mysqli_fetch_array($i2)){
									?>
									<a href="not_pin_kl.php?id=<?php echo $xx2['id_keluar']; ?>">
									<span style="color:red">
                                       
                                            <span>Tanggal : <?php echo date('d-m-Y',strtotime($xx2["tanggal_lapor"]));?></span>
                                            </span>
                                           <span style="color:red">
                                            No.Surat : <?php echo $xx2['id_keluar']; ?>                                       
											</span>
										
									<span style="color:red">
                                            Permohonan Divalidasi                                      
											</span>
									<center>
									<button class="btn btn-primary">OK</button>
									</a></center>
									<?php
									}
									?>
								</li><hr>
							</ul>
						</div>
					</div>
					<?Php	
			$sql1 ="SELECT * FROM warga where warga.nik='$_SESSION[username]'";
			$results1 = mysqli_query($connect,$sql1) or die("Error: ".mysqli_error($connect));
			$r1 = mysqli_fetch_array($results1);
				?>	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="img/lg.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $r1['nama_warga'];?></span>
								<span class="role"><?php echo $_SESSION['username'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
					
			
							</ul>
						</div>
					</div>
				</div>
<?php } ?>
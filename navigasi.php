<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
								<h5 style="color:white"><center>PELAYANAN ADMINISTRASI</center></h5>
									<li class="nav-active">
									<?php if ($_SESSION['username']=='gari'){?>
										<a href="gari.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='tegalrejo'){?>
										<a href="tegalrejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='jatirejo'){?>
										<a href="jatirejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngelorejo'){?>
										<a href="ngelorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngijorejo'){?>
										<a href="ngijorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='kalidadap'){?>
										<a href="ngijorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='gatak'){?>
										<a href="ngijorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='gelung'){?>
										<a href="ngijorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='gondangrejo'){?>
										<a href="ngijorejo.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
										<?php if ($_SESSION['username']=='sekda'){?>
										<a href="desa.php" style="color:white">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Beranda</span>
										</a>
										<?php } ?>
									</li>
									<?php if ($_SESSION['username']=='sekda'){?>
									<li class="nav-parent" style="color:white">
										<a style="color:white">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Master Data</span>
										</a>	
										<ul class="nav nav-children">
										
										
											<li>
												<a href="tabel_warga.php" style="color:white">
													<i class="fa fa-users" aria-hidden="true"></i> Data Warga
												</a>
											</li>
											
											<li>
												<a href="tabel_pegawai.php" style="color:white">
													<i class="fa fa-users" aria-hidden="true"></i> Data Pegawai
												</a>
											</li>
											
											<li>
												<a href="tabel_kk.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Data Kartu Keluarga
												</a>
											</li>
										</ul>	
										
									</li>
									<?php } ?>
									
									
									<li class="nav-parent" style="color:white">
										<a style="color:white">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Pelayanan</span>
										</a>	
										<ul class="nav nav-children">
										<?php if ($_SESSION['username']=='ngijorejo'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='kalidadap'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='jatirejo'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gatak'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gari'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gelung'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='tegalrejo'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngelorejo'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gondangrejo'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='sekda'){?>
										<li>
												<a href="tb_surat.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Surat Pengantar
												</a>
											</li>
										<?php } ?>
										
										<?php if ($_SESSION['username']=='ngijorejo'){?>
										<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='kalidadap'){?>
										<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='jatirejo'){?>
										<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gatak'){?>
										<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gari'){?>
										<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gelung'){?>
										<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='tegalrejo'){?>
										<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngelorejo'){?>
										<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gondangrejo'){?>
										<li>
												<a href="form_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='sekda'){?>
										<li>
												<a href="tb_kelahiran.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Kelahiran
												</a>
											</li>
										<?php } ?>
										
										<?php if ($_SESSION['username']=='ngijorejo'){?>
										<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='kalidadap'){?>
										<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='jatirejo'){?>
										<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gatak'){?>
										<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gari'){?>
										<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gelung'){?>
										<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='tegalrejo'){?>
										<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngelorejo'){?>
										<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gondangrejo'){?>
										<li>
												<a href="form_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='sekda'){?>
										<li>
												<a href="tb_kematian.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i> Pelayanan Kematian
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngijorejo'){?>
										<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='kalidadap'){?>
										<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='jatirejo'){?>
										<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gatak'){?>
										<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gari'){?>
										<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gelung'){?>
										<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='tegalrejo'){?>
										<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngelorejo'){?>
										<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gondangrejo'){?>
										<li>
												<a href="form_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='sekda'){?>
										<li>
												<a href="tb_ktp.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan KTP
												</a>
											</li>
										<?php } ?>
									<?php if ($_SESSION['username']=='ngijorejo'){?>
										<li>
												<a href="form_perm_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="form_perm_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='kalidadap'){?>
										<li>
												<a href="form_perm_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="form_perm_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='jatirejo'){?>
										<li>
												<a href="form_perm_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="form_perm_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gatak'){?>
										<li>
												<a href="form_perm_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="form_perm_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gari'){?>
										<li>
												<a href="form_perm_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="form_perm_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
											<li>
												<a href="form_dokumen_kependudukan.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Dokumen Kependudukan
												</a>
											</li>
<li>
												<a href="form_elemen.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Perubahan Element Kependudukan
												</a>
											</li>
											<li>
												<a href="form_daftar_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Daftar Perpindahan Penduduk
												</a>
											</li>
											<li>
												<a href="form_biodata_keluarga.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Biodata Keluarga
												</a>
											</li>
											<li>
												<a href="form_p_sipil.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pencatatan Sipil
												</a>
											</li>

										<?php } ?>
										<?php if ($_SESSION['username']=='gelung'){?>
										<li>
												<a href="form_perm_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="form_perm_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='tegalrejo'){?>
										<li>
												<a href="form_perm_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="form_perm_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='ngelorejo'){?>
										<li>
												<a href="form_perm_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="form_perm_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='gondangrejo'){?>
										<li>
												<a href="form_perm_pindah.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="form_perm_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
										<?php } ?>
										<?php if ($_SESSION['username']=='sekda'){?>
										<li>
												<a href="tb_pindah_keluar.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Keluar
												</a>
											</li>
											<li>
												<a href="tb_pindah_datang.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Pelayanan Pindah Datang
												</a>
											</li>
											<li>
												<a href="tb_peristiwa.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Dokumen Kependudukan
												</a>
											</li>
											<li>
												<a href="tb_peristiwa.php" style="color:white">
													<i class="fa fa-folder" aria-hidden="true"></i>  Biodata Keluarga
												</a>
											</li>
										<?php } ?>
										</ul>	
									</li>
									<?php if ($_SESSION['username']=='sekda'){?>
										<li class="" style="color:white">
										<a href="range_waktu.php" style="color:white">
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Buku Register</span>
										</a>
										
									</li>
										<?php } else { ?>
										
										
									</li>
										<?php } ?>
										
									
				<ul>
				</nav>
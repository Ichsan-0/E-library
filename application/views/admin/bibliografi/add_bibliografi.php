<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
	<?php echo $header; ?>
				<!-- END: Left Aside -->
				
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									<?php echo $title;?>
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="#" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
												Datatables
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
												Base
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
												Local Data
											</span>
										</a>
									</li>
								</ul>
							</div>
							<div>
								<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
									<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
										<i class="la la-plus m--hide"></i>
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="m-dropdown__wrapper">
										<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
										<div class="m-dropdown__inner">
											<div class="m-dropdown__body">
												<div class="m-dropdown__content">
													<ul class="m-nav">
														<li class="m-nav__section m-nav__section--first m--hide">
															<span class="m-nav__section-text">
																Quick Actions
															</span>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-share"></i>
																<span class="m-nav__link-text">
																	Activity
																</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-chat-1"></i>
																<span class="m-nav__link-text">
																	Messages
																</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-info"></i>
																<span class="m-nav__link-text">
																	FAQ
																</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																<span class="m-nav__link-text">
																	Support
																</span>
															</a>
														</li>
														<li class="m-nav__separator m-nav__separator--fit"></li>
														<li class="m-nav__item">
															<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
																Submit
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
							<div class="m-content">
								<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Data Bibliografi Baru
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right">
										<div class="m-portlet__body">
											
										<div class="form-group m-form__group row">
											<label for="example-text-input" class="col-2 col-form-label">
												Judul* :
											</label>
											<div class="col-10">
												<input class="form-control m-input" type="text" id="judul">
											</div>
										</div>

										<div class="form-group m-form__group row">
											<label for="example-search-input" class="col-2 col-form-label">
												Pilih Pengarang:
											</label>
											
											
											<div class="col-4">
												<select class="form-control m-select2" id="id_pengarang" name="id_pengarang" multiple="multiple">
													<?php
													 $jenis_pengarang = array(1 => "Nama Orang", 2 => "Badan Organisasi", 3 => "Konferensi");
													 // Mengelompokkan pengarang berdasarkan jenis_pengarang
													 foreach ($jenis_pengarang as $jenis => $jenis_nama) {
														 $pengarang_dalam_jenis = array_filter($pengarang, function ($p) use ($jenis) {
															 return $p->jenis == $jenis;
														 });
														 if (!empty($pengarang_dalam_jenis)) {
															 echo '<optgroup label="' . $jenis_nama . '">';
															 foreach ($pengarang_dalam_jenis as $p) {
																 echo '<option value="' . $p->id . '">' . $p->nama_pengarang . '</option>';
															 }
															 echo '</optgroup>';
														 }
													 }
													 ?>
												</select>
												<div class="col-md-0 mt-2"> <!-- Tambahkan class "mt-2" di sini -->
												<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addPengarang">
														<span>
															Pengarang Baru
														</span>
												</a>
												<a href="<?php echo base_url('admin/master/Pengarang'); ?>" class="btn btn-success btn-sm">
														<span>
															Master Pengarang
														</span>
												</a>
												</div>
											</div>
											<label for="example-search-input" class="col-1 col-form-label">
												Level:
											</label>
											<div class="col-3">
												<select class="form-control m-select2" id="id_level" name="id_level">
													<option value="0">-- Pilih Level --</option>
													<?php foreach ($level as $l): ?>
														<option value="<?php echo $l->id; ?>"><?php echo $l->level; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="col-md-1">
												<button id="applyButton" class="btn btn-primary">Terapkan</button>
											</div>
										</div>
										
										<div class="form-group m-form__group row" >
											<label class="col-2 col-form-label">
												Pengarang :
											</label>
											<div class="col-10">
											<div style="max-height: 200px; overflow-y: auto;">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>Nama Pengarang</th>
															<th>Level</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody id="selectedAuthorsTable">
														<!-- Data hasil akan ditampilkan di sini -->
													</tbody>
												</table>
											</div>
											</div>
										</div>

										<div class="form-group m-form__group row">
											<label class="col-2 col-form-label">
												Pernyataan :
											</label>
											<div class="col-10">
												<input class="form-control m-input" type="text" id="pernyataan">
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-url-input" class="col-2 col-form-label">
												edisi : 
											</label>
											<div class="col-10">
												<input class="form-control m-input" type="text" id="edisi">
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Spesifik :
											</label>
											<div class="col-10">
												<input class="form-control m-input" type="text" id="spesifik">
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-password-input" class="col-2 col-form-label">
												Kode Eksemplar :
											</label>
											<div data-toggle="m-popover" data-placement="left" data-content="Kode Eksemplar dari Bibliografi" data-original-title="Kode Eksemplar" class="col-5">
												<select class="form-control m-select2" id="id_kode_eksemplar" name="id_kode_eksemplar">
													<option value="0">-- Pilih Kode --</option>
													<?php foreach ($kode as $k): ?>
														<option value="<?php echo $k->id; ?>"><?php echo $k->pola; ?></option>
													<?php endforeach; ?>
												</select>
												<div class="col-md-0 mt-2"> <!-- Tambahkan class "mt-2" di sini -->
												<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addKode">
														<span>
															Eksemplar Baru
														</span>
												</a>
												<a href="<?php echo base_url('admin/peralatan/Kode_eksemplar'); ?>" class="btn btn-success btn-sm">
														<span>
															Master Eksemplar
														</span>
												</a>
												</div>
											</div>
											<div class="col-2">
												<input data-toggle="m-popover" placeholder="Total item" data-placement="left" title="" data-content="Total Item Kode Eksemplar" data-original-title="Total Item(s)" class="form-control m-input" type="number" id="total_item">
											</div>
											
											<div class="col-md-0 mt-0">
												<button id="applyButton3" class="btn btn-success">Pilihan</button>
												<button id="applyButton2" class="btn btn-primary">Terapkan</button>
											</div>
										</div>
										<div class="form-group m-form__group row" >
											<label class="col-2 col-form-label">
												Data Koleksi :
											</label>
											<div class="col-10">
											<div style="max-height: 200px; overflow-y: auto; overflow-x: hidden;">
											<table class="table table-bordered">
													<thead>
														<tr>
															<th>Kode</th>
															<th>Lokasi</th>
															<th>Status</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody id="tableBody">
														<!-- Data hasil akan ditampilkan di sini -->
													</tbody>
												</table>
											</div>
											</div>
										</div>
										
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												GMD :
											</label>
											<div class="col-4">
												<select class="form-control m-select2" id="id_gmd" name="id_gmd">
													<option value="0">-- Pilih GMD --</option>
													<?php foreach ($gmd as $g): ?>
														<option value="<?php echo $g->id; ?>"><?php echo $g->nama_gmd; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<label for="example-tel-input" class="col-2 col-form-label">
												Tipe Isi :
											</label>
											<div class="col-4">
												<select class="form-control m-select2" id="id_tipe_isi" name="id_tipe_isi">
													<option value="0">-- Pilih Tipe Isi --</option>
													<?php foreach ($isi as $i): ?>
														<option value="<?php echo $i->id; ?>"><?php echo $i->nama_tipe; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Tipe Media :
											</label>
											<div class="col-4">
												<select class="form-control m-select2" id="id_tipe_media" name="id_tipe_media">
													<option value="0">-- Pilih Tipe Media --</option>
													<?php foreach ($media as $m): ?>
														<option value="<?php echo $m->id; ?>"><?php echo $m->nama_media; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<label for="example-tel-input" class="col-2 col-form-label">
												Tipe Pembawa :
											</label>
											<div class="col-4">
												<select class="form-control m-select2" id="id_tipe_pembawa" name="id_tipe_pembawa">
													<option value="0">-- Pilih Tipe Pembawa --</option>
													<?php foreach ($pembw as $p): ?>
														<option value="<?php echo $p->id; ?>"><?php echo $p->nama_tipe; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Kala Terbit :
											</label>
											<div class="col-4">
												<select class="form-control m-select2" id="id_kala_terbit" name="id_kala_terbit">
													<option value="0">-- Pilih Kala Terbit --</option>
													<?php foreach ($kala as $k): ?>
														<option value="<?php echo $k->id; ?>"><?php echo $k->kala_terbit; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<label for="example-tel-input" class="col-2 col-form-label">
												Tahun Terbit:
											</label>
											<div class="col-4">
											<input class="form-control m-input" type="number" id="tahun_terbit">
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Tempat Terbit :
											</label>
											<div class="col-4">
												<select class="form-control m-select2" id="id_tempat" name="id_tempat">
													<option value="0">-- Pilih tempat Terbit --</option>
													<?php foreach ($tmpt as $t): ?>
														<option value="<?php echo $t->id; ?>"><?php echo $t->nama_tempat; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<label for="example-tel-input" class="col-2 col-form-label">
												Deskripsi Fisik:
											</label>
											<div class="col-4">
											<input class="form-control m-input" type="text" id="deskripsi_fisik">
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Judul Seri :
											</label>
											<div class="col-10">
												<input class="form-control m-input" type="text" id="judul_seri">
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Klasifikasi :
											</label>
											<div class="col-4">
												<input class="form-control m-input" type="text" id="klasifikasi">
											</div>
											<label for="example-tel-input" class="col-2 col-form-label">
												No. Panggil :
											</label>
											<div class="col-4">
												<input class="form-control m-input" type="text" id="no_panggil">
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Subyek :
											</label>
											<div class="col-4">
												<select class="form-control m-select2" id="id_subyek" name="id_subyek">
													<option value="0">-- Pilih Subyek --</option>
													<?php foreach ($sub as $s): ?>
														<option value="<?php echo $s->id; ?>"><?php echo $s->subyek; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<label for="example-tel-input" class="col-2 col-form-label">
												Level Subyek :
											</label>
											<div class="col-4">
											<select class="form-control" id="id_subyek" name="id_subyek">
													<option value="1">Primary</option>
													<option value="2">Additional</option>
												</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Bahasa :
											</label>
											<div class="col-4">
											<select class="form-control m-select2" id="id_bahasa" name="id_bahasa">
													<option value="0">-- Pilih Bahasa --</option>
													<?php foreach ($bahasa as $b): ?>
														<option value="<?php echo $b->id; ?>"><?php echo $b->nama_bahasa; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<label for="example-tel-input" class="col-2 col-form-label">
												Abstrak/catatan :
											</label>
											<div class="col-4">
												<input class="form-control m-input" type="text" id="no_panggil">
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Gambar Sampul :
											</label>
											<div class="col-4">
												<div class="m-dropzone dropzone" action="inc/api/dropzone/upload.php" id="m-dropzone-cover">
												<div class="m-dropzone__msg dz-message needsclick">
													<h3 class="m-dropzone__msg-title">
													Drop image files here or click to upload.
													</h3>
												</div>
												<button type="button" class="btn btn-danger btn-sm" id="reset-dropzone-cover" style="display: none;">Reset</button>
												</div>
											</div>

											<label for="example-tel-input" class="col-2 col-form-label">
												Lampiran :
											</label>
											<div class="col-4">
												<div class="m-dropzone dropzone" action="inc/api/dropzone/upload.php" id="m-dropzone-attachment">
												<div class="m-dropzone__msg dz-message needsclick">
													<h3 class="m-dropzone__msg-title">
													Drop PDF files here or click to upload.
													</h3>
												</div>
												<button type="button" class="btn btn-danger btn-sm" id="reset-dropzone-attachment" style="display: none;">Reset</button>
												</div>
											</div>
										</div>
										
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Biblio Terkait :
											</label>
											<div class="col-4">
											<select class="form-control m-select2" id="id_biblio" name="id_biblio">
													<option value="0">-- Pilih Relasi --</option>
													<?php foreach ($relasi as $r): ?>
														<option value="<?php echo $r->id; ?>"><?php echo $r->judul; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="col-6">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>Judul</th>
															<th>Tahun Terbit</th>
														</tr>
													</thead>
													<tbody id="">
														<!-- Data hasil akan ditampilkan di sini -->
													</tbody>
												</table>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
													Tampilan OPAC :
											</label>
											<div class="m-radio-list">
												<div class="col-4">
													<label class="m-radio">
														<input type="radio" name="opac_hide">
															Tampilkan
														<span></span>
													</label>
													<label class="m-radio">
														<input type="radio" name="opac_hide">
															Sembunyikan
														<span></span>
													</label>										
												</div>
											</div>
											<label for="example-tel-input" class="col-4 col-form-label">
													Promosi Beranda:
											</label>
											<div class="m-radio-list">
												<div class="col-4">
													<label class="m-radio">
														<input type="radio" name="promoted">
															Promosikan
														<span></span>
													</label>
													<label class="m-radio">
														<input type="radio" name="promoted">
															Jangan Promosikan
														<span></span>
													</label>										
												</div>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-tel-input" class="col-2 col-form-label">
												Label :
											</label>
											<div class="col-3">
												<div class="input-group">
													<span class="input-group-addon">
														<?php
															$gambar_path = base_url('images/labels/label-new1.png');
														?>
														<img src="<?= $gambar_path ?>" alt="Icon" style="width: 16px; height: 16px;">
													</span>
													<input type="text" class="form-control m-input" placeholder="New TitleURL ">
												</div>
											</div>
											<div class="col-3">
												<div class="input-group">
													<span class="input-group-addon">
														<?php
															$gambar_path = base_url('images/labels/label-favorite.png');
														?>
														<img src="<?= $gambar_path ?>" alt="Icon" style="width: 16px; height: 16px;">
													</span>
													<input type="text" class="form-control m-input" placeholder="Favorite TitleURL ">
												</div>
											</div>
											<div class="col-3">
												<div class="input-group">
													<span class="input-group-addon">
														<?php
															$gambar_path = base_url('images/labels/label-multimedia1.png');
														?>
														<img src="<?= $gambar_path ?>" alt="Icon" style="width: 18px; height: 16px;">
													</span>
													<input type="text" class="form-control m-input" placeholder="Multimedia TitleURL">
												</div>
											</div>
										</div>
									</div>
									<div class="m-portlet__foot m-portlet__foot--fit">
										<div class="m-form__actions">
											<div class="row">
												<div class="col-2"></div>
												<div class="col-10">
													<button type="reset" id="btnAddBiblio" class="btn btn-success">
														Submit
													</button>
													<button type="reset" class="btn btn-secondary" onclick="window.history.back();">
														Cancel
													</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<!--end::Portlet-->
						</div>
					</div>
				</div>	
				<!--end::Portlet-->
				</div>
			</div>
			
		</div>
    </div>
</div>
<!-- ... -->
<div class="modal fade" id="addPengarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengarang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_pengarang" class="form-control-label">Nama Pengarang</label>
                    <input type="text" class="form-control" id="nama" name="nama_pengarang">
                </div>
                <div class="form-group">
                    <label for="tahun_lahir" class="form-control-label">Tahun Lahir</label>
                    <input class="form-control" id="tahun" name="tahun_lahir"></input>
                </div>
                <div class="form-group">
                    <label for="jenis_kepengarangan" class="form-control-label">Jenis Kepengarangan</label>
                    <select class="form-control m-input" id="jenis" name="jenis_kepengarangan">
                        <option value="1">Nama Orang</option>
                        <option value="2">Badan Organisasi</option>
                        <option value="3">Konferensi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="daftar_terkendali" class="form-control-label">Daftar Terkendali</label>
                    <input class="form-control" id="daftar" name="daftar_terkendali"></input>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddPengarang">Tambah data</button>
            </div>
        </div>
    </div>
</div>

<script>
// Memperbaiki skrip untuk menangani penambahan data pengarang dengan validasi
$("#btnAddPengarang").click(function (event) {
    event.preventDefault();
    var nama_pengarang = $("#nama").val().trim();
    var tahun_lahir = $("#tahun").val().trim();
    var jenis_kepengarangan = $("#jenis").val();
    var daftar_terkendali = $("#daftar").val().trim();

    // Validasi input
    if (nama_pengarang === "") {
        alert("Nama pengarang harus diisi.");
        return;
    }
    if (tahun_lahir === "") {
        alert("Tahun lahir harus diisi.");
        return;
    }
    if (!tahun_lahir.match(/^[0-9]{4}$/)) {
        alert("Tahun lahir harus berupa empat digit angka.");
        return;
    }
    if (daftar_terkendali === "") {
        alert("Daftar terkendali harus diisi.");
        return;
    }

    // Melakukan request AJAX jika validasi berhasil
    $.ajax({
        url: "<?php echo base_url('admin/bibliografi/bibliografi/save_pengarang'); ?>",
        type: "POST",
        data: {
            nama_pengarang: nama_pengarang,
            tahun_lahir: tahun_lahir,
            jenis_kepengarangan: jenis_kepengarangan,
            daftar_terkendali: daftar_terkendali
        },
        dataType: "json",
        success: function(response) {
            if (response.status === 'success') {
                alert("Data berhasil disimpan!");
                $('#addPengarang').modal('hide');
                // Refresh halaman atau update UI jika diperlukan
            } else {
                alert("Gagal menyimpan data: " + response.message);
            }
        },
        error: function(xhr, status, error) {
            alert("Terjadi kesalahan saat menyimpan data.");
        }
    });
});
</script>

<div class="modal fade" id="addKode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kode Eksemplar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="form-group">
                    <label class="form-control-label">Prefiks</label>
                    <input type="text" class="form-control" id="pre" name="prefiks">
                </div>
				<div class="form-group">
                    <label class="form-control-label">Sufiks</label>
                    <input class="form-control" id="suf" name="sufiks"></input>
                </div>
				<div class="form-group">
                    <label class="form-control-label">Panjang Nomer Seri</label>
                    <input type="number" class="form-control" id="panj" name="panjang"></input>
                </div>
				<div class="form-group">
                    <label class="form-control-label">Preview:</label>
					<div class="alert alert-primary" role="alert">
						<strong id="pol" name="pola"></strong>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddStatus">Tambah data</button>
            </div>
        </div>
    </div>
</div>
			<!-- end:: Body -->
<!-- begin::Footer -->
	<?php echo $footer; ?>



<script>

document.addEventListener("DOMContentLoaded", function() {
    const prefiksInput = document.getElementById("pre");
    const sufiksInput = document.getElementById("suf");
    const panjangInput = document.getElementById("panj");
	const previewStrongWithId = document.getElementById("pol"); // Mengambil tag strong dalam elemen alert

    prefiksInput.addEventListener("input", updatePreview);
    sufiksInput.addEventListener("input", updatePreview);
    panjangInput.addEventListener("input", updatePreview);

    function updatePreview() {
        const prefiks = prefiksInput.value;
        const sufiks = sufiksInput.value;
        const panjang = parseInt(panjangInput.value);
        
        let nomor_seri = prefiks + "0" .repeat(panjang) + sufiks;
        
        // Update the content of the <strong> tag within the alert element
		previewStrongWithId.textContent = nomor_seri;
    }
});

	// Inisialisasi Dropzone
	var dropzoneCover = new Dropzone("#m-dropzone-cover", {
    // Opsi tambahan untuk zona pelepasan file cover
    acceptedFiles: "image/*", // Hanya izinkan file gambar
    /* tambahkan opsi sesuai kebutuhan */
  });

  dropzoneCover.on("addedfile", function(file) {
    // Tampilkan tombol reset
    document.getElementById("reset-dropzone-cover").style.display = "inline-block";
  });

  document.getElementById("reset-dropzone-cover").addEventListener("click", function() {
    dropzoneCover.removeAllFiles(true);
    this.style.display = "none";
  });

  var dropzoneAttachment = new Dropzone("#m-dropzone-attachment", {
    // Opsi tambahan untuk zona pelepasan file lampiran
    acceptedFiles: ".pdf", // Hanya izinkan file PDF
    /* tambahkan opsi sesuai kebutuhan */
  });

  dropzoneAttachment.on("addedfile", function(file) {
    // Tampilkan tombol reset
    document.getElementById("reset-dropzone-attachment").style.display = "inline-block";
  });

  document.getElementById("reset-dropzone-attachment").addEventListener("click", function() {
    dropzoneAttachment.removeAllFiles(true);
    this.style.display = "none";
  });

   $(document).ready(function () {
	['#id_pengarang', '#id_level', '#id_kode_eksemplar', '#id_tipe_koleksi', '#id_gmd', '#id_tipe_isi', '#id_tipe_media','#id_kala_terbit','#id_tipe_pembawa','#id_tempat','#id_subyek','#id_bahasa','#id_biblio'].forEach(function (element) {
    var placeholderText = $(element).attr('multiple') ? "Dapat dipilih lebih dari 1" : "Pilih";
    $(element).select2({ placeholder: placeholderText });
	});


		$("#btnAddStatus").click(function (event) { // Add 'event' parameter here
        event.preventDefault(); // Prevent the default form submission
		var prefiks = $("#pre").val();
		var sufiks = $("#suf").val();
		var panjang = $("#panj").val();
		var pola = $("#pol").text();

            $.ajax({
                url: "<?php echo base_url('admin/peralatan/Kode_eksemplar/addKode'); ?>",
                type: "POST",
                data: {
					prefiks : prefiks,
					sufiks : sufiks,
					panjang : panjang,
					pola : pola
                },
                dataType: "json",
                success: function (response) {
                    if (response.status === 'success') {
                        // Clear form fields
                        $("#pre").val("");
						$("#suf").val("");
						$("#panj").val("");
						$("#pol").val("");
                        // Close the modal
                        $("#addModal").modal('hide');
                        // Display success message (you can customize this)
						alert(response.message);
						location.reload();
                    } else {
                        // Display error message (you can customize this)
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert("Terjadi kesalahan saat menghubungi server.");
                }
            });
        });
	
		$("#btnAddBiblio").click(function (event) { // Add 'event' parameter here
        event.preventDefault(); // Prevent the default form submission
		var judul = $("#judul").val();
		var edisi = $("#edisi").val();
		var pernyataan = $("#pernyataan").val();
		var spesifik = $("#spesifik").val();
            $.ajax({
                url: "<?php echo base_url('admin/bibliografi/Bibliografi/addBibliografi'); ?>",
                type: "POST",
                data: {
                    judul : judul,
					edisi : edisi,
					pernyataan : pernyataan,
					spesifik : spesifik
                },
                dataType: "json",
                success: function (response) {
                    if (response.status === 'success') {
                        // Clear form fields
                        $("#judul").val("");
						$("#edisi").val("");
						$("#pernyataan").val("");
						$("#spesifik").val("");
                        // Display success message (you can customize this)
						alert(response.message);
						window.location.href = "<?php echo base_url('admin/bibliografi/Bibliografi/'); ?>";
                    } else {
                        // Display error message (you can customize this)
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert("Terjadi kesalahan saat menghubungi server.");
                }
            });
        });
		$("#collectionTable").hide();

// Event handler for the "Terapkan" button
$("#applyButton2").click(function(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get values from the selected options
  var selectedPola = $("#id_kode_eksemplar option:selected").text();
  var totalItem = $("#total_item").val();

  // Clear the existing table content
  $("#tableBody").empty();

  // Find the position of the last occurrence of '0' in the selectedPola
  var zeroPosition = selectedPola.lastIndexOf('0');

  // Calculate the number of digits needed for totalItem
  var numDigits = Math.max(Math.floor(Math.log10(totalItem)) + 1, 1);

  // Append new rows based on the selected values
  for (var i = 1; i <= totalItem; i++) {
    // Format the current number with leading zeros
    var formattedNumber = String(i).padStart(numDigits, '0');

    // Replace the '0' at the found position with the formatted number
    var modifiedPola = selectedPola.substring(0, zeroPosition - numDigits + 1) +
                       formattedNumber +
                       selectedPola.substring(zeroPosition + 1);

    // Adjust this part based on your actual data structure
    var row = "<tr>" +
      "<td>" + modifiedPola + "</td>" +
      "<td>Nama_lokasi </td>" +
	  "<td>Nama_Status </td>" +
      "<td>" +
      "<div class='row'>" +
      "  <div class='col-3'><button class='btn btn-primary btn-sm editButtonPola'>Edit</button></div>" +
      "  <div class='col-md-1'><button class='btn btn-danger btn-sm deleteButton'>Delete</button></div>" +
      "</div>" +
      "</td>" +
      "</tr>";

    // Append the row to the table body
    $("#tableBody").append(row);
  }

  // Show the table
  $("#collectionTable").show();
});


		
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var applyButton = document.getElementById("applyButton");
    var selectedAuthorsTable = document.getElementById("selectedAuthorsTable");

    applyButton.addEventListener("click", function(event) {
        event.preventDefault();

        var selectElement = document.getElementById("id_pengarang");
        var levelElement = document.getElementById("id_level");
        var selectedAuthors = [];

        for (var i = 0; i < selectElement.options.length; i++) {
            if (selectElement.options[i].selected) {
                var authorName = selectElement.options[i].text;
                var levelValue = levelElement.options[levelElement.selectedIndex].text;
                selectedAuthors.push({
                    name: authorName,
                    level: levelValue
                });
            }
        }

        for (var i = 0; i < selectedAuthors.length; i++) {
            var author = selectedAuthors[i];
            var newRow = selectedAuthorsTable.insertRow(selectedAuthorsTable.rows.length);

            var cell1 = newRow.insertCell(0);
            cell1.innerHTML = author.name;

            var cell2 = newRow.insertCell(1);
            cell2.innerHTML = author.level;

            var cell3 = newRow.insertCell(2);
            cell3.innerHTML = '<button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button>';
        }
    });
});

function deleteRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

</script>

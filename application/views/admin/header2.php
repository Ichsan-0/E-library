<!-- begin::Head -->
<head>
		<meta charset="utf-8" />
		<title>
			<?php echo $title;?>
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="<?php echo base_url(); ?>assets/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="<?php echo base_url(); ?>assets/metronic/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/metronic/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/metronic/assets/demo/default/media/img/logo/favicon.ico" />
		
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="<?php echo base_url(); ?>admin/home/" class="m-brand__logo-wrapper">
										<img alt="" src="<?php echo base_url(); ?>assets/metronic/assets/demo/default/media/img/logo/logo_web_perpus.png"/>
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block 
					 ">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
						
						<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							
							<!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="
	m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" 
	data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch" data-search-type="dropdown">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<i class="flaticon-search-1"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner ">
													<div class="m-dropdown__header">
														<form  class="m-list-search__form">
															<div class="m-list-search__form-wrapper">
																<span class="m-list-search__form-input-wrapper">
																	<input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Search...">
																</span>
																<span class="m-list-search__form-icon-close" id="m_quicksearch_close">
																	<i class="la la-remove"></i>
																</span>
															</div>
														</form>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
															<div class="m-dropdown__content"></div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
											<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-music-2"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															9 New
														</span>
														<span class="m-dropdown__header-subtitle">
															User Notifications
														</span>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
																		Alerts
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
																		Events
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
																		Logs
																	</a>
																</li>
															</ul>
															<div class="tab-content">
																<div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																					<span class="m-list-timeline__text">
																						12 new users registered
																					</span>
																					<span class="m-list-timeline__time">
																						Just now
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						System shutdown
																						<span class="m-badge m-badge--success m-badge--wide">
																							pending
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						14 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						New invoice received
																					</span>
																					<span class="m-list-timeline__time">
																						20 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						DB overloaded 80%
																						<span class="m-badge m-badge--info m-badge--wide">
																							settled
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						1 hr
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						System error -
																						<a href="#" class="m-link">
																							Check
																						</a>
																					</span>
																					<span class="m-list-timeline__time">
																						2 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item m-list-timeline__item--read">
																					<span class="m-list-timeline__badge"></span>
																					<span href="" class="m-list-timeline__text">
																						New order received
																						<span class="m-badge m-badge--danger m-badge--wide">
																							urgent
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						7 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item m-list-timeline__item--read">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						Production server down
																					</span>
																					<span class="m-list-timeline__time">
																						3 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						Production server up
																					</span>
																					<span class="m-list-timeline__time">
																						5 hrs
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
																	<div class="m-scrollable" m-scrollabledata-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">
																						New order received
																					</a>
																					<span class="m-list-timeline__time">
																						Just now
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
																					<a href="" class="m-list-timeline__text">
																						New invoice received
																					</a>
																					<span class="m-list-timeline__time">
																						20 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">
																						Production server up
																					</a>
																					<span class="m-list-timeline__time">
																						5 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">
																						New order received
																					</a>
																					<span class="m-list-timeline__time">
																						7 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">
																						System shutdown
																					</a>
																					<span class="m-list-timeline__time">
																						11 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">
																						Production server down
																					</a>
																					<span class="m-list-timeline__time">
																						3 hrs
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
																	<div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
																		<div class="m-stack__item m-stack__item--center m-stack__item--middle">
																			<span class="">
																				All caught up!
																				<br>
																				No new logs.
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-share"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															Quick Actions
														</span>
														<span class="m-dropdown__header-subtitle">
															Shortcuts
														</span>
													</div>
													<div class="m-dropdown__body m-dropdown__body--paddingless">
														<div class="m-dropdown__content">
															<div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
																<div class="m-nav-grid m-nav-grid--skin-light">
																	<div class="m-nav-grid__row">
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-file"></i>
																			<span class="m-nav-grid__text">
																				Generate Report
																			</span>
																		</a>
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-time"></i>
																			<span class="m-nav-grid__text">
																				Add New Event
																			</span>
																		</a>
																	</div>
																	<div class="m-nav-grid__row">
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-folder"></i>
																			<span class="m-nav-grid__text">
																				Create New Task
																			</span>
																		</a>
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-clipboard"></i>
																			<span class="m-nav-grid__text">
																				Completed Tasks
																			</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="<?php echo base_url(); ?>assets/metronic/assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
												<span class="m-topbar__username m--hide">
													Nick
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<img src="<?php echo base_url(); ?>assets/metronic/assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	Mark Andre
																</span>
																<a href="" class="m-card-user__email m--font-weight-300 m-link">
																	mark.andre@gmail.com
																</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					My Profile
																				</span>
																				<span class="m-nav__link-badge">
																					<span class="m-badge m-badge--success">
																						2
																					</span>
																				</span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-share"></i>
																		<span class="m-nav__link-text">
																			Activity
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-chat-1"></i>
																		<span class="m-nav__link-text">
																			Messages
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-info"></i>
																		<span class="m-nav__link-text">
																			FAQ
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																		<span class="m-nav__link-text">
																			Support
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="<?php echo base_url(); ?>web/logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																		Logout
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li id="m_quick_sidebar_toggle" class="m-nav__item">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<i class="flaticon-grid-menu"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->		
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
	<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		data-menu-vertical="true"
		 data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
		>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  <?php if ($this->uri->uri_string() === 'admin/home') { echo 'm-menu__item--active'; } ?>" aria-haspopup="true" >
								<a  href="<?php echo base_url(); ?>admin/home/" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
											<span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span>
										</span>
									</span>
								</a>
							</li>
							
							
							<?php $current_uri = $this->uri->uri_string();
							$allowed_bibli = array('admin/bibliografi/Bibliografi','admin/bibliografi/Bibliografi/add_biblio');?>
							<li class="m-menu__item m-menu__item--submenu <?php if (in_array($current_uri, $allowed_bibli)) { echo "m-menu__item--active m-menu__item--expanded m-menu__item--open"; } ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-multimedia-1"></i>
									<span class="m-menu__link-text">
										Bibliografi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu" style="display : <?php if (in_array($current_uri, $allowed_bibli)) { echo "block"; } else { echo "none"; }  ?>">
									<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
										<li class="m-menu__item <?php if ($current_uri == 'admin/bibliografi/Bibliografi' || $current_uri == 'admin/bibliografi/Bibliografi/add_biblio' ) { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
											<a  href="<?php echo base_url(); ?>admin/bibliografi/Bibliografi" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar bibiliografi
												</span>
											</a>
										</li>		
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/fontawesome.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Eksemplar
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/lineawesome.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Eksemplar Keluar
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/socicons.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pencetakan Label
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/socicons.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Cetak Barkode Eksemplar
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/socicons.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Cetak Katalog
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">
										Sirkulasi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<a  href="#" class="m-menu__link ">
												<span class="m-menu__link-text">
													Mulai Transaksi
												</span>
											</a>
										</li>
										
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/buttons/group.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Pengunjung
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/buttons/group.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Mulai Transaksi
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/buttons/dropdown.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pengembalian Kilat
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/buttons/dropdown.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Aturan Peminjaman
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/buttons/dropdown.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Sejarah Peminjaman
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/buttons/dropdown.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Keterlambatan
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/buttons/dropdown.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Reservasi
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							
							<?php $allowed_team = array('admin/TipeAnggota');?>
							<li class="m-menu__item m-menu__item--submenu <?php if (in_array($this->uri->uri_string(), $allowed_team)) { echo "m-menu__item--expanded m-menu__item--open"; } ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-users"></i>
									<span class="m-menu__link-text">
										Keanggotaan
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu" style="display : <?php if (in_array($this->uri->uri_string(), $allowed_team)) { echo "block"; } else { echo "none"; }  ?>">
									<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
										<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/TipeAnggota') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
											<a  href="<?php echo base_url(); ?>admin/TipeAnggota" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Tipe Anggota
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/portlets/base.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Anggota
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/portlets/advanced.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Anggota Kedarluawarsa
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php 
								$allowed_master = array('admin/master/Gmd', 'admin/master/TipeIsi', 'admin/master/TipeMedia', 'admin/master/TipePembawa','admin/master/Penerbit','admin/master/Agen','admin/master/Pengarang','admin/master/Subyek','admin/master/Lokasi'); 
								$allowed_reference = array('admin/referensi/Tempat','admin/referensi/Tempat','admin/referensi/Status','admin/referensi/Tipe_koleksi','admin/referensi/Bahasa_dokumen','admin/referensi/Label','admin/referensi/Kala_terbit'); 
		  						$allowed_alat	= array('admin/peralatan/Pengarang_mubazir','admin/peralatan/Subyek_mubazir','admin/peralatan/Penerbit_mubazir','admin/peralatan/Tempat_mubazir','admin/peralatan/Kode_eksemplar');
							?>
							<li class="m-menu__item m-menu__item--submenu <?php if (in_array($this->uri->uri_string(), $allowed_master) || in_array($this->uri->uri_string(), $allowed_reference) || in_array($this->uri->uri_string(), $allowed_alat)) { echo "m-menu__item--expanded m-menu__item--open"; } ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										Data Master
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu" style="display : <?php if (in_array($this->uri->uri_string(), $allowed_master)) { echo "block"; } else { echo "none"; }  ?>">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										
										<li class="m-menu__item  m-menu__item--submenu <?php if (in_array($this->uri->uri_string(), $allowed_master)) { echo "m-menu__item--expanded m-menu__item--open"; } ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Terkendali
												</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											
											<div class="m-menu__submenu" style="display : <?php if (in_array($this->uri->uri_string(), $allowed_master)) { echo "block"; } else { echo "none"; }  ?>">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/master/Gmd') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/master/Gmd" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																GMD
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/master/TipeIsi') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/master/TipeIsi" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Tipe Isi
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/master/TipeMedia') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/master/TipeMedia" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Tipe Media
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/master/TipePembawa') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/master/TipePembawa" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Tipe Pembawa
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/master/Penerbit') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/master/Penerbit" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Penerbit
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/master/Agen') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/master/Agen" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Agen
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/master/Pengarang') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/master/Pengarang" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pengarang
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/master/Subyek') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/master/Subyek" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Subyek
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/master/Lokasi') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/master/Lokasi" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Lokasi & Rak
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										
										<li class="m-menu__item  m-menu__item--submenu <?php if (in_array($this->uri->uri_string(), $allowed_reference)) { echo "m-menu__item--expanded m-menu__item--open"; } ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Referensi
												</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu" style="display : <?php if (in_array($this->uri->uri_string(), $allowed_reference)) { echo "block"; } else { echo "none"; }  ?>">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/referensi/Tempat') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/referensi/Tempat" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Tempat
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/referensi/Status') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/referensi/Status" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Status Eksemplar
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/referensi/Tipe_koleksi') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/referensi/Tipe_koleksi" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Tipe Koleksi
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/referensi/Bahasa_dokumen') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/referensi/Bahasa_dokumen" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Bahasa Dokumen
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/referensi/Label') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/referensi/Label" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Label
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/referensi/Kala_terbit') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/referensi/Kala_terbit" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Kala Terbit
															</span>
														</a>
													</li>												
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu <?php if (in_array($this->uri->uri_string(), $allowed_alat)) { echo "m-menu__item--expanded m-menu__item--open"; } ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Peralatan
												</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu" style="display : <?php if (in_array($this->uri->uri_string(), $allowed_alat)) { echo "block"; } else { echo "none"; }  ?>">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/peralatan/Kode_eksemplar') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/peralatan/Kode_eksemplar" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Kode Eksemplar
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/peralatan/Pengarang_mubazir') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/peralatan/Pengarang_mubazir" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pengarang Mubazir
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/peralatan/Subyek_mubazir') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/peralatan/Subyek_mubazir" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Subyek Mubazir
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/peralatan/Penerbit_mubazir') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/peralatan/Penerbit_mubazir" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Penerbit Mubazir
															</span>
														</a>
													</li>
													<li class="m-menu__item <?php if ($this->uri->uri_string() == 'admin/peralatan/Tempat_mubazir') { echo " m-menu__item--active"; } ?> " aria-haspopup="true" >
														<a  href="<?php echo base_url(); ?>admin/peralatan/Tempat_mubazir" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Tempat Mubazir
															</span>
														</a>
													</li>
																								
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-3"></i>
									<span class="m-menu__link-text">
										Sistem
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/flaticon.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Konten
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/fontawesome.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Modul
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/lineawesome.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pustakawan & Pengguna
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/socicons.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kelompok Pengguna
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/socicons.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Setelan Hari Libur
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/socicons.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pembuat Barkode
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/icons/socicons.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Catatan Sistem
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-1"></i>
									<span class="m-menu__link-text">
										Laporan
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<a  href="#" class="m-menu__link ">
												<span class="m-menu__link-text">
													Portlets
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/portlets/base.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Statistik Koleksi
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/portlets/advanced.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Laporan Peminjaman 
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/portlets/creative.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Laporan Anggota
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/portlets/tabbed.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Rekapitulasi
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/portlets/draggable.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Judul
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/portlets/tools.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Judul Eksemplar
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="components/portlets/tools.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Statistik Penggunaan Koleksi
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
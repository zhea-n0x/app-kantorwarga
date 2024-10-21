<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('/login', 'Home::login', ['filter' => 'CekLogin']);
$routes->add('/logout', 'Auth::logout');
//konfig rw {
//route halaman konfig rw
$routes->add('/config_rw', 'Konfigurasi::config_rw');
$routes->add('/config_rw2', 'Konfigurasi::config_rw2');
//route proses konfig
$routes->add('/config_rw/pendataan_rt','ProsesKonfigurasi::kode_rt');
$routes->add('/config_rw/pendataan_rw','ProsesKonfigurasi::konfig_rw');
$routes->add('/config_rw/data_pribadirw','ProsesKonfigurasi::konfig_profil');
$routes->add('/konfigurasi/config_profil','Konfigurasi::config_profil');
//end konfig rw}

//konfig rt{
//route halaman konfig rt
$routes->add('/config_rt/verifikasi_kode', 'Konfigurasi::verif_kode');
$routes->add('/config_rt/konfigurasi_rt', 'Konfigurasi::pengurus_rt');
//route proses konfig
$routes->add('/config_rt/verifikasi','ProsesKonfigurasi::verifikasi');
$routes->add('/config_rt/pendataan_rt','ProsesKonfigurasi::konfig_rt');
$routes->add('/config_rt/data_pribadirt','ProsesKonfigurasi::konfig_profil');
//end konfig rt}

//konfig warga{
//route halaman konfig warga
$routes->add('/config_warga/verifikasi_kode','Konfigurasi::verifikasi_warga');
$routes->add('/config_warga/daftar','Konfigurasi::config_profil');
//route proses konfig
$routes->add('/config_warga/verifikasi', 'ProsesKonfigurasi::verifikasi_warga');
$routes->add('/config_warga/data_pribadiwarga','ProsesKonfigurasi::konfig_profil');
//end konfig warga}

//halaman dashboard && login required
$routes->group('dashboardrw', ['filter' => 'RWOnly'], function ($routes) {

	$routes->add('/','DashboardRW::index');
	$routes->add('data_warga','DashboardRW::data_warga');
	$routes->add('data_rt','DashboardRW::data_rt');
	$routes->add('informasi_wilayah','DashboardRW::data_wilayah');
	$routes->add('pengajuan_surat','DashboardRW::pengajuan_surat');
	
});
//dashboard rt
$routes->group('dashboardrt', ['filter' => 'RTOnly'], function ($routes) {
	
	$routes->add('/','DashboardRT::index');
	$routes->add('data_warga','DashboardRT::data_warga');
	$routes->add('informasi_wilayah','DashboardRT::data_wilayah');
	$routes->add('pengajuan_surat','DashboardRT::pengajuan_surat');

	
});
//dashboard warga
$routes->group('dashboardwarga', ['filter' => 'WargaOnly'], function ($routes) {
	
	$routes->add('/', 'DashboardWarga::index');
	$routes->add('informasi_wilayah','DashboardWarga::data_wilayah');
	$routes->add('pengajuan_surat','DashboardWarga::surat_pengantar');
	$routes->post('pengajuan_surat/proses_surat/generate','FlowdataWarga::generate_surat');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

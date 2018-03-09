<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // Config
    $config['center'] = 'Kuala Lumpur, Malaysia';
    $config['zoom'] = '16'; // auto
    $config['map_height'] = '100vh';
    // $config['map_width'] = '500px';    
    $config['scrollwheel'] = true;
    $config['geocodeCaching'] = true;    
    GMaps::initialize($config);

    // Marker
    $marker['position'] = 'Kuala Lumpur, Malaysia';
    $marker['infowindow_content'] = 'Kuala Lumpur';
    $marker['draggable'] = true;
    $marker['animation'] = 'drop';
    // $marker['icon'] = 'url';   
    GMaps::add_marker($marker);

    $marker['position'] = 'Masjid Negara, Malaysia';
    $marker['infowindow_content'] = 'Masjid Negara';     
    $marker['onclick'] = 'alert("You just clicked me!!")';
    GMaps::add_marker($marker);
    
    $map = GMaps::create_map();
    return view('welcome')->with('map', $map);
});


Route::get('/directions', function () {

    // Config
    $config['center'] = 'Kuala Lumpur, Malaysia';
    $config['zoom'] = '16';
    $config['map_height'] = '100vh';
    $config['scrollwheel'] = true;
    $config['geocodeCaching'] = true;   

    $config['directions'] = true;
    $config['directionsStart'] = 'Kuala Lumpur, Malaysia';
    $config['directionsEnd'] = 'Masjid Negara, Malaysia';
    $config['directionsDivID'] = 'directionsDiv';

    GMaps::initialize($config);
    
    $map = GMaps::create_map();
    return view('welcome')->with('map', $map);
});

Route::get('/streetview', function () {

    // Config
    $config['center'] = 'Masjid Besi, Malaysia';
    $config['map_type'] = 'STREET';
    $config['streetViewPovHeading'] = 90;
    $config['map_height'] = '100vh';
    $config['geocodeCaching'] = true;   

    GMaps::initialize($config);
    
    $map = GMaps::create_map();
    return view('welcome')->with('map', $map);
});
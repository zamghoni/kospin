<?php
if(!function_exists('active_link')) {
  function activate_menu($controller) {
    // Getting CI class instance.
    $CI = get_instance();
    // mendapatkan class active
    $class = $CI->router->fetch_class();
    return ($class == $controller) ? 'mm-active' : '';
  }

  function activate_menufe($controller) {
    // Getting CI class instance.
    $CI = get_instance();
    // mendapatkan class active
    $class = $CI->router->fetch_method();
    return ($class == $controller) ? 'mm-show' : '';
  }
}


function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}
?>

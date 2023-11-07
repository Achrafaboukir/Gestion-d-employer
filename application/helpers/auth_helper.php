<?php
// application/helpers/auth_helper.php
function is_logged_in() {
    $CI =& get_instance();
    return $CI->session->userdata('logged_in');
}

function is_admin() {
    $CI =& get_instance();
    return $CI->session->userdata('role') === 'admin';
}

function access_only_for_admins() {
    $CI =& get_instance();
    if ($CI->session->userdata('role') !== 'admin') {
        redirect('employee/index');
    }
}

?>
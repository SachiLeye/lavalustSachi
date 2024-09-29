<?php
if (!function_exists('set_flash_alert')) {
    function set_flash_alert($alert, $message)
    {
        $LAVA =& lava_instance();
        $LAVA->session->set_flashdata(array('alert' => $alert, 'message' => $message));
    }
}

if (!function_exists('flash_alert')) {
    function flash_alert()
    {
        $LAVA =& lava_instance();
        if ($LAVA->session->flashdata('alert') != NULL) {
            echo '
            <div class="alert alert-' . $LAVA->session->flashdata('alert') .'" role="alert" style="display: flex; justify-content: space-between; align-items: center;">
                <span>' . $LAVA->session->flashdata('message') . '</span>
                <i class="fa-solid fa-x" onclick="$(this).parent().fadeTo(500, 0).slideUp(500);" style="cursor: pointer;"></i>
            </div>
            <script>
                setTimeout(() => {
                    $(".alert").fadeTo(500, 0).slideUp(500);
                }, 5000);
            </script>';
        }
    }
}


?>
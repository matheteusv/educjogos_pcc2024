<?php

if (isset($sucesso_msg)) {
    foreach ($sucesso_msg as $sucesso_msg) {
        echo '<script>swal("' . $sucesso_msg . '", "", "success")</script>';
    }
}
if (isset($error_msg)) {
    foreach ($error_msg as $error_msg) {
        echo '<script>swal("' . $error_msg . '", "", "error")</script>';
    }
}
if (isset($info_msg)) {
    foreach ($info_msg as $info_msg) {
        echo '<script>swal("' . $info_msg . '", "", "info")</script>';
    }
}
if (isset($aviso_msg)) {
    foreach ($aviso_msg as $aviso_msg) {
        echo '<script>swal("' . $aviso_msg . '", "", "warning")</script>';
    }
}

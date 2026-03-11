<?php ob_start(); ?>
<link rel="stylesheet" href="/include/components/toast/ToastStyle.css">
<div id="toast-container" class="toast-container" aria-live="polite" aria-atomic="true"></div>
<?php return ob_get_clean(); ?>

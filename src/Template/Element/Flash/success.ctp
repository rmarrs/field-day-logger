<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id="flash" class="callout success" onclick="this.classList.add('hidden')"><?= $message ?></div>

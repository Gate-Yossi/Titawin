<?php
    tideways_xhprof_enable();

    phpinfo();

    $data = tideways_xhprof_disable();
    $filename = '/tmp/xhprof/' . intval(microtime(true)) . mt_rand(1, 10000) . '.xhprof';
    echo $data;
    echo $filename;
    var_dump(file_put_contents($filename, serialize($data)));

?>

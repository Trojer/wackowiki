<?php

$dh = new DelphiHightlighter();
echo '<!--notypo-->';
echo '<pre class="code">';
echo $dh->analyse_code($text);
echo "</pre>";
echo '<!--/notypo-->';
unset($dh);

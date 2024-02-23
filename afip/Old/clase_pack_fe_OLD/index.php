<?php
/* Esto producirá un error. Fíjese en el html
 * que se muestra antes que la llamada a header() */
header('Location: ./test/index.html');
exit;
?>
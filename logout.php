<?php

setcookie('logedin', '', time() - 1);

header('location: index.html');

exit;
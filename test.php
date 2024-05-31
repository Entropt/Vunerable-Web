<?php
$base = 'YToyOntzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjEwOiJ1c2VyX3Rva2VuIjtzOjE2OiJhZmY3ZDMxMDVlYTUzM2ZhIjt9';

$new = unserialize(base64_decode($base));

echo $new['username'];
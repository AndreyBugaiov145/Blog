<?php

return array(
    'registration/index' => 'registration/index',
    'registration/checkEmail'=> 'registration/checkEmail',
    'registration' => 'registration/register',
    'authorization' => 'registration/authorization',
    'catalog/tag/([0-9]+)' => 'catalog/tag/$1',
    'catalog/([0-9]+)' => 'catalog/one/$1',
    'catalog' => 'catalog/index',
    '' => 'catalog/index',
);

?>
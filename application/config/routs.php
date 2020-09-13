<?php

return array(
    'registration/index' => 'registration/index',
    'registration/checkEmail'=> 'registration/checkEmail',
    'registration' => 'registration/register',
    'authorization' => 'registration/authorization',
    'logout' => 'registration/logout',
    'catalog/updatePublication/([0-9]+)' => 'catalog/updatePublication/$1',
    'catalog/saveChanges/([0-9]+)' => 'catalog/saveChanges/$1',
    'catalog/delete/([0-9]+)' => 'catalog/delete/$1',
    'catalog/user/([0-9]+)/page-([0-9]+)' => 'catalog/user/$1/$2',
    'catalog/user/([0-9]+)' => 'catalog/user/$1',
    'catalog/tag/([0-9]+)/page-([0-9]+)' => 'catalog/tag/$1/$2',
    'catalog/tag/([0-9]+)' => 'catalog/tag/$1',
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog/([0-9]+)' => 'catalog/one/$1',
    'catalog/create' => 'catalog/create',
    'catalog/save' => 'catalog/save',
    'catalog' => 'catalog/index',
    '' => 'catalog/start',
);

?>
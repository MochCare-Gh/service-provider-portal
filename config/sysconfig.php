<?php

return [
    'roles'=>['delete'=>true],
    'permissions'=>['delete'=>true],
    'users'=>['delete'=>true],
    'registration'=>env('REGISTRATION',true),
    'crudbuilder'=>env('CRUDBUILDER',true),
    'filemanager'=>env('FILEMANAGER',true),
    'direction'=>env('DIRECTION','ltr'),
    'language'=>env('locale','en'),
    'theme'=>env('theme','gentelella'),
    ];
?>

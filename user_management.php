<?php

return [
    'model' => \App\Models\User::class,
    'columns' => ['id', 'email', 'created_at'],
    'primary_key' => 'id',
    'table' => 'users',
    'roles' => ['admin', 'user'],
];

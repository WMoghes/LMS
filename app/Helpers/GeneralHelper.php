<?php

function CheckVariableIfNullOrEmptyRedirectTo($var, $routeName, $message = 'You should enter valid id')
{
    if (is_null($var) || empty($var)) {
        return route($routeName)->withStatus($message);
    }
}

function CheckVariables($variables)
{
    return isset($variables) ? $variables : null;
}

function getRole($id)
{
    $roles = [
        1 => 'Admin',
        2 => 'User',
        3 => 'Supervisor'
    ];
    return $roles[$id];
}

function getBlocked($id)
{
    return $id == 1 ? 'Blocked' : 'Not Blocked';
}

function getDefaultImage()
{
    return url('uploads/default-image.png');
}

function getImage($imageName)
{
    return url('uploads/images') . '/' . $imageName;
}
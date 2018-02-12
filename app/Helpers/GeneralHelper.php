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
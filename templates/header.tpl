<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$smarty.const.TITLE}&mdash;{$smarty.const.SUBTITLE}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{$smarty.const.CSS_DIR}/main.css">
</head>
<body class="Site">
<header class="Site-header">
    <div class="Header Header--small">
        <div class="Header-titles">
            <h1 class="Header-title">{$smarty.const.ICON}{$smarty.const.TITLE}</h1>
            <p class="Header-subtitle">{$smarty.const.SUBTITLE}</p>
        </div>
        {if isset($smarty.session.ISLOGGEDIN)}
        <div class="Header-logout">
            You are logged in as  {$smarty.session.username} <a href="{$smarty.const.LOGOUT}" class="Button u-spaceLM">Logout</a>
        </div>
        {/if}
    </div>
</header>
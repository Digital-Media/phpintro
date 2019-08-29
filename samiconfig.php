<?php

use Sami\Parser\Filter\TrueFilter;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name("*.php")
    ->exclude("tests")
    ->in("src");

$sami = new Sami($iterator, [
    "title" => "NormForm-Skeleton API",
    "build_dir" => __DIR__ . "/docs/",
    "cache_dir" => __DIR__ . "/cache/",
    "remote_repository" => new GitHubRemoteRepository("Digital-Media/normform-skeleton", __DIR__),
    "default_opened_level" => 2
]);

// Also include private properties and methods
$sami["filter"] = function () {
    return new TrueFilter();
};

return $sami;

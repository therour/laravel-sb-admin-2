<?php

namespace Therour\SbAdmin2\Providers\Directives;

class RequirePlugin
{
    public function __invoke($expression)
    {
        return '<?php if (isset($sbPluginsLoaded) && isset($sbAssets)):
$__env->startPush(\'js-plugin\');
if (! Arr::get($sbPluginsLoaded, '.$expression.'.\'.js\')):
    Arr::set($sbPluginsLoaded, '.$expression.'.\'.js\', true);
foreach (\Illuminate\Support\Arr::get($sbAssets, '.$expression.'.\'.js\', []) as $jsAsset): ?>
<script src="<?php echo $jsAsset ?>"></script>
<?php endforeach; endif;
$__env->stopPush();
$__env->startPush(\'css-plugin\');
if (! Arr::get($sbPluginsLoaded, '.$expression.'.\'.css\')):
    Arr::set($sbPluginsLoaded, '.$expression.'.\'.css\', true);
foreach (\Illuminate\Support\Arr::get($sbAssets, '.$expression.'.\'.css\', []) as $cssAsset): ?>
<link href="<?php echo $cssAsset ?>" rel="stylesheet">
<?php endforeach; endif;
$__env->stopPush();
endif; ?>';
    }
}
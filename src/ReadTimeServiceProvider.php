<?php

namespace Vdhicts\ReadTime;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ReadTimeServiceProvider extends PackageServiceProvider
{
    public function bootingPackage()
    {
        Blade::directive('readTime', function ($expression) {
            $arguments = explode(',', $expression);
            $content = $arguments[0];
            $wordsPerMinute = count($arguments) > 1
                ? (int) trim($arguments[1])
                : null;

            return "<?php echo read_time($content, $wordsPerMinute); ?>";
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('read-time')
            ->hasConfigFile('read-time');
    }
}

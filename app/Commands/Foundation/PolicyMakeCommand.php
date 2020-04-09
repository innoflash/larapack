<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\PolicyMakeCommand as LaravelPolicyMake;
use Illuminate\Support\Str;

class PolicyMakeCommand extends LaravelPolicyMake
{
   use PackageDetail;

   protected function replaceModel($stub, $model)
   {
       $model = str_replace('/', '\\', $model);

       $namespaceModel = $this->namespaceFromComposer().$model;

       if (Str::startsWith($model, '\\')) {
           $stub = str_replace('NamespacedDummyModel', trim($model, '\\'), $stub);
       } else {
           $stub = str_replace('NamespacedDummyModel', $namespaceModel, $stub);
       }

       $stub = str_replace(
           "use {$namespaceModel};\nuse {$namespaceModel};", "use {$namespaceModel};", $stub
       );

       $model = class_basename(trim($model, '\\'));

       $dummyUser = class_basename($this->userProviderModel());

       $dummyModel = Str::camel($model) === 'user' ? 'model' : $model;

       $stub = str_replace('DocDummyModel', Str::snake($dummyModel, ' '), $stub);

       $stub = str_replace('DummyModel', $model, $stub);

       $stub = str_replace('dummyModel', Str::camel($dummyModel), $stub);

       $stub = str_replace('DummyUser', $dummyUser ?? 'User', $stub);

       return str_replace('DocDummyPluralModel', Str::snake(Str::pluralStudly($dummyModel), ' '), $stub);
   }

   public function handle()
   {
      parent::handle();
      $this->info('Check to see if your policy has the right user. '.PHP_EOL.'Do not forget to register your policy!');
   }
}

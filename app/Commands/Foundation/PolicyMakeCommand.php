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

       if (Str::startsWith($model, '\\')) {
           $namespacedModel = trim($model, '\\');
       } else {
           $namespacedModel = $this->namespaceFromComposer().$model;
       }

       $model = class_basename(trim($model, '\\'));

       $dummyUser = class_basename($this->userProviderModel());

       $dummyModel = Str::camel($model) === 'user' ? 'model' : $model;

       $replace = [
           'NamespacedDummyModel' => $namespacedModel,
           '{{ namespacedModel }}' => $namespacedModel,
           '{{namespacedModel}}' => $namespacedModel,
           'DummyModel' => $model,
           '{{ model }}' => $model,
           '{{model}}' => $model,
           'dummyModel' => Str::camel($dummyModel),
           '{{ modelVariable }}' => Str::camel($dummyModel),
           '{{modelVariable}}' => Str::camel($dummyModel),
           'DummyUser' => $dummyUser,
           '{{ user }}' => $dummyUser,
           '{{user}}' => $dummyUser,
       ];

       $stub = str_replace(
           array_keys($replace), array_values($replace), $stub
       );

       return str_replace(
           "use {$namespacedModel};\nuse {$namespacedModel};", "use {$namespacedModel};", $stub
       );
   }

   public function handle()
   {
      parent::handle();
      $this->info('Check to see if your policy has the right user. '.PHP_EOL.'Do not forget to register your policy!');
   }
}

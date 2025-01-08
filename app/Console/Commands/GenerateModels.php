<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Générer automatiquement des modèles à partir des fichiers de migration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = database_path('migrations');
    $files = File::allFiles($path);

    foreach ($files as $file) {
        $content = File::get($file);
        if (preg_match('/Schema::create\(\'(.+?)\'/', $content, $matches)) {
            $tableName = $matches[1]; // Obtenir le nom de la table
            $modelName = Str::singular(ucfirst(Str::camel($tableName))); // Convertir le nom de la table en nom de modèle singulier

            if (!class_exists($modelName)) {
                $this->call('make:model', ['name' => $modelName]);
                $this->info("Modèle créé : {$modelName}");
            } else {
                $this->info("Le modèle {$modelName} existe déjà.");
            }
        }
    }
}
}
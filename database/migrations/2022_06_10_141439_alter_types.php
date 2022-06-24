<?php

use App\Models\Image;
use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('image_hashs')->truncate();
        Image::query()->delete();        
        Type::query()->delete();
        Schema::table('types', function (Blueprint $table) {
            $table->string('slug')->unique();
            $table->dropForeign('types_name_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->unique('name');
        });
    }
};

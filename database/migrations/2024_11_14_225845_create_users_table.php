<?php 
 
    use Illuminate\Database\Migrations\Migration; 
    use Illuminate\Database\Schema\Blueprint; 
    use Illuminate\Support\Facades\Schema; 
 
    class CreateUsersTable extends Migration 
    {
         /** 
         * Jalankan migrasi. 
         * 
         * @return void 
         */ 
        public function up() 
        { 
            Schema::create('users', function (Blueprint $table) { 
                $table->id(); // Primary key ID auto-increment 
                $table->string('name'); // Nama user 
                $table->string('email')->unique(); // Email unik 
                $table->timestamp('email_verified_at')->nullable(); // Waktu 
                $table->string('password'); // Password yang terenkripsi 
                $table->rememberToken(); // Token untuk fitur "remember me" 
                $table->timestamps(); // created_at dan updated_at otomatis 
            }); 
        } 
 
        /** 
         * Balikkan migrasi. 
         * 
         * @return void 
         */ 
        public function down() 
        { 
            Schema::dropIfExists('users'); 
        } 
    }
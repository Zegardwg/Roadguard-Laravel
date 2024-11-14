<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [ 
            '/api/posts', //untuk bagian ini sesuaikan dengan routes masing masing 
            '/api/pengguna', //untuk bagian ini sesuaikan dengan routes masing masing 
            '/api/admin', //untuk bagian ini sesuaikan dengan routes masing masing 
            '/api/superadmin', //untuk bagian ini sesuaikan dengan routes masing masing 
            '/api/pemantau', //untuk bagian ini sesuaikan dengan routes masing masing 
            
            '/api/posts/{id}' , // untuk bagian ini ditambahkan karena kita membuat routes baru
            '/api/admin/{id}' , // untuk bagian ini ditambahkan karena kita membuat routes baru
            '/api/superadmin/{id}' , // untuk bagian ini ditambahkan karena kita membuat routes baru
            '/api/pemantau/{id}' , // untuk bagian ini ditambahkan karena kita membuat routes baru

            '/api/posts/*', // Semua URL yang berhubungan dengan posts dikecualikan dari CSRF
            '/api/admin/*', // Semua URL yang berhubungan dengan posts dikecualikan dari CSRF
            '/api/superadmin/*', // Semua URL yang berhubungan dengan posts dikecualikan dari CSRF
            '/api/pemantau/*', // Semua URL yang berhubungan dengan posts dikecualikan dari CSRF

            '/api/posts/*', // Semua URL yang berhubungan dengan posts dikecualikan dari CSRF
            '/api/admin/*', // Semua URL yang berhubungan dengan posts dikecualikan dari CSRF
            '/api/superadmin/*', // Semua URL yang berhubungan dengan posts dikecualikan dari CSRF
            '/api/pemantau/*', // Semua URL yang berhubungan dengan posts dikecualikan dari CSRF
        ]); 
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

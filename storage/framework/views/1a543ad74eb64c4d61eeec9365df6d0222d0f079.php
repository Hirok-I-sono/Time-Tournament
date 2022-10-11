<!-- 常に上側に表示 -->
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>TIME or TOURNAMENT RESULT</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('stylesheet'); ?>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <h2>TIME or TOURNAMENT RESULT</h2>
                </a>
            
         
            <?php if(Auth::check()): ?>
                <span class="my-navbar-item"><?php echo e(Auth::user()->name); ?></span>
                /
                <a href="#" id="logout" class="my-navbar-item">ログアウト</a>    
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                <script>
                    document.getElementById('logout').addEventListener('click',function(event){
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                    });
                </script>
            <?php else: ?>
                <a class="my-navbar-item" href="<?php echo e(route('login')); ?>">ログイン</a>
                 /
                <a class="my-navbar-item" href="<?php echo e(route('register')); ?>">会員登録</a>
            <?php endif; ?>
          
        </nav>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html><?php /**PATH C:\MAMP\htdocs\MakeResult\resources\views/layouts/layout.blade.php ENDPATH**/ ?>
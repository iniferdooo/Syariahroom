

<?php $__env->startSection('title', 'Login | Bank Syariah Indonesia - UAE'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-12 col-md-9 col-xl-7 col-xxxl-5 px-8 px-sm-0 pt-64 pb-48">
    <div class="d-flex align-items-center mb-sm-24">
        <a href="" class="auth-back">
            <i class="iconly-Light-ArrowLeft"></i>
        </a>
        <h1 class="mb-0">Login</h1>
    </div>
    <p class="mt-sm-8 mt-sm-0 text-black-60">Welcome back, please login to your account.</p>

    <form class="mt-16 mt-sm-32 mb-8" method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-16">
            <label for="email" class="form-label">Email :</label>
            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-16">
            <label for="password" class="form-label">Password :</label>
            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="row align-items-center justify-content-between mb-16">
            <div class="col hp-flex-none w-auto">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="remember">
                        <?php echo e(__('Remember Me')); ?>

                    </label>
                </div>
            </div>

            <div class="col hp-flex-none w-auto">
                <?php if(Route::has('password.request')): ?>
                <a class="hp-button text-black-80 hp-text-color-dark-40" href="<?php echo e(route('password.request')); ?>">Forgot
                Password?</a>
                <?php endif; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Sign in
        </button>
    </form>

    <div class="col-12 hp-form-info">
        <span class="text-black-80 hp-text-color-dark-40 hp-caption me-4">Don’t you have an
        account?</span>
        <a class="text-primary-1 hp-text-color-dark-primary-2 hp-caption" href="<?php echo e(route('register')); ?>">Create an
        account</a>
    </div>

    


<div class="col-12 hp-other-links mt-24">
    <a href="javascript:;" class="text-black-80 hp-text-color-dark-40">Privacy Policy</a>
    <a href="javascript:;" class="text-black-80 hp-text-color-dark-40">Term of use</a>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Syariahroom\resources\views/auth/login.blade.php ENDPATH**/ ?>
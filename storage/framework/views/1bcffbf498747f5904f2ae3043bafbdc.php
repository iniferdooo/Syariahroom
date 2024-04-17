<ul>
    <li>
        <div class="menu-title">MAIN</div>
        <ul>
            <li>
                <a href="<?php echo e(route('dashboard.index')); ?>"
                    class="<?php echo e(\App\Helper\Url::url(route('dashboard.index')) ? 'active' : ''); ?>">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Dashboard" aria-label="Dashboard"></div>
                    <span>
                        <i class="iconly-Curved-Home"></i>
                        <span>Dashboard</span>
                    </span>
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transaction-index')): ?>
                <li>
                    <a href="<?php echo e(route('dashboard.transaction.index')); ?>"
                        class="<?php echo e(\App\Helper\Url::url(route('dashboard.transaction.index')) ? 'active' : ''); ?>">
                        <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="" data-bs-original-title="Transaksi" aria-label="Transaksi"></div>
                        <span>
                            <i class="iconly-Light-Paper"></i>
                            <span>Histori Transaksi</span>
                        </span>
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <div class="menu-title">Setting</div>
                <ul>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-index')): ?>
                        <li>
                            <a href="<?php echo e(route('dashboard.user.index')); ?>"
                                class="<?php echo e(\App\Helper\Url::url(route('dashboard.user.index')) ? 'active' : ''); ?>">
                                <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="" data-bs-original-title="User" aria-label="User"></div>
                                <span>
                                    <i class="iconly-Curved-People"></i>
                                    <span>User</span>
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('membership-index')): ?>
                        <li>
                            <a href="<?php echo e(route('dashboard.membership.index')); ?>"
                                class="<?php echo e(\App\Helper\Url::url(route('dashboard.membership.index')) ? 'active' : ''); ?>">
                                <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="" data-bs-original-title="Membership" aria-label="Membership"></div>
                                <span>
                                    <i class="iconly-Light-Category"></i>
                                    <span>Membership</span>
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-index')): ?>
                        <li>
                            <a href="<?php echo e(route('dashboard.role.index')); ?>"
                                class="<?php echo e(\App\Helper\Url::url(route('dashboard.role.index')) ? 'active' : ''); ?>">
                                <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="" data-bs-original-title="Role & Permission"
                                    aria-label="Role & Permission"></div>
                                <span>
                                    <i class="iconly-Light-Lock"></i>
                                    <span>Role & Permission</span>
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
<?php /**PATH C:\xampp\htdocs\Syariahroom\resources\views/master/partials/dashboard/sidebar.blade.php ENDPATH**/ ?>
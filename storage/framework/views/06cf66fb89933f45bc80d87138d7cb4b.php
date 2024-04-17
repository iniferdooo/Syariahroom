

<?php $__env->startSection('title', 'Dashboard | syariahrooms'); ?>

<?php $__env->startSection('content'); ?>
    <h3 class="my-16">Dashboard</h3>
    <div class="col-12">
        <h5>Filter Pencapaian & Transaksi</h5>
        <div class="row mb-10">
            <form action="<?php echo e(route('dashboard.index')); ?>" method="GET">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="">bulan</label>
                        <select class="form-control" name="bulan">
                            <option value="">None</option>
                            <?php for($i = 1; $i <= 12; $i++): ?>
                                <option value="<?php echo e($i); ?>">
                                    <?php echo e(date('F', mktime(0, 0, 0, $i, 1))); ?>

                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">tahun</label>
                        <select class="form-control" name="tahun">
                            <option value="">None</option>
                            <?php for($year = date('Y'); $year >= 2020; $year--): ?>
                                <option value="<?php echo e($year); ?>">
                                    <?php echo e($year); ?>

                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">membership</label>
                        <select class="form-control" name="membership">
                            <option value="">None</option>
                            <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($m->name); ?>"><?php echo e($m->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mt-10">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
        <h5>Data Pencapaian</h5>
        <div class="row mb-18">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Pemasukan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($totalTransactions); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas iconly-Broken-Wallet fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5>Data Transaksi</h5>
        <div class="row mb-18">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Sukses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($dataTransaksi['success']); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas iconly-Broken-Plus fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-succes shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pending</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($dataTransaksi['pending']); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas iconly-Broken-Show fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-succes shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Gagal</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($dataTransaksi['failed']); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas iconly-Broken-Danger fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-succes shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Member Aktif</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($membershipActive); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas iconly-Broken-TwoUsers fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5>Grafik</h5>
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Grafik Pemasukan</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Rincian Pembelian</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    
    
    <script type="text/javascript">
        var totalTransactionsData = [];

        <?php $__currentLoopData = $membershipTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            totalTransactionsData.push(<?php echo e($transaction['totalTransactions']); ?>);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var ctx = document.getElementById("myPieChart");

        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        '<?php echo e($m->name); ?>',
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                datasets: [{
                    data: totalTransactionsData,
                    backgroundColor: ['#c0c0c0', '#ffd700', '#e5e4e2'],
                    hoverBackgroundColor: ['#808080', '#ffcc00', '#dcdcdc'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>
    <script type="text/javascript">
        var months = [];
        var totalAmounts = [];

        <?php $__currentLoopData = $transactionsPerMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            months.push("<?php echo e(Carbon\Carbon::createFromDate($transaction->year, $transaction->month, 1)->format('F Y')); ?>");
            totalAmounts.push(<?php echo e($transaction->total_amount); ?>);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var ctx = document.getElementById("myAreaChart");

        var myAreaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Total Pemasukan',
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    data: totalAmounts,
                }],
            },
            options: {
                maintainAspectRatio: true,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        suggestedMax: Math.max(...totalAmounts) + 5000,
                        grid: {
                            display: true
                        },
                        ticks: {
                            callback: function(value, index, values) {
                                return 'Rp ' + value
                                    .toLocaleString();
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Total: Rp ' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Syariahroom\resources\views/master/dashboard/index.blade.php ENDPATH**/ ?>
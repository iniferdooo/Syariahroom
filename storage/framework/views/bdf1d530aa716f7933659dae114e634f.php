

<?php $__env->startSection('title', 'User | syariahrooms'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <h3 class="my-16">User / User</h3>
    <div class="col">
        <div class="card card-body">
            <div class="col">
                <div class="row justify-content-between my-10 gap-10 px-0">
                    <div class="row mx-md-0 col-auto mx-auto gap-10">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-store')): ?>
                        <button class="btn btn-primary col col-sm-auto add-user"><i class="ri-add-line remix-icon"></i><span>Tambah User</span></button>
                        <?php endif; ?>
                    </div>
                    <div class="mx-md-0 col-auto mx-auto">
                        <div class="input-group align-items-center">
                            <span class="input-group-text hp-bg-dark-100 border-end-0 pe-0 bg-white">
                                <i class="iconly-Light-Search text-black-80" style="font-size: 16px;"></i>
                            </span>
                            <input class="form-control border-start-0 ps-8" id="search_user" name="search_user" type="text" value="" placeholder="Search User">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="cole">No HP</th>
                                    <th scope="cole">Alamat</th>
                                    <th scope="col">Role</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_user">
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <nav class="col-12 col-sm-auto text-center pagination_user" aria-label="Page navigation example">
                        </nav>
                        <br>
                        <p class="user_entry"></p>
                    </div>
                </div>
            </div>
        </div>
        <?php $__env->startSection('modal'); ?>
        <div class="modal fade" id="modalUser" aria-labelledby="modalUser" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="formUser">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalUserLabel">Tambah User</h5>
                            <button class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" type="button" aria-label="Close">
                                <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                            </button>
                        </div>
                        <div class="modal-body body-user">
                            <input class="user_id" id="user_id" name="id" type="text">
                            <div class="form-group mb-12">
                                <label for="name">Nama</label>
                                <input class="form-control name" id="name" name="name" type="text" placeholder="Nama" required>
                            </div>
                            <div class="form-group mb-12">
                                <label for="email">Email</label>
                                <input class="form-control email" id="email" name="email" type="email" placeholder="Email" required>
                            </div>
                            <div class="form-group mb-12">
                                <label for="noHp">No HP</label>
                                <input class="form-control noHp" id="noHp" name="phone" type="text" placeholder="No HP" required>
                            </div>
                            <div class="form-group mb-12">
                                <label for="address">Alamat</label>
                                <input class="form-control address" id="address" name="address" type="text" placeholder="Alamat" required>
                            </div>
                            <div class="form-group mb-12">
                                <label for="password">Password</label>
                                <input class="form-control password" id="password" name="password" type="password" placeholder="Password" required>
                            </div>
                            <div class="form-group mb-12">
                                <label for="role">Role</label>
                                <select class="form-control select2 role" id="role" name="role">
                                    <option value="" disabled selected>Pilih Role</option>
                                    <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($r->name); ?>"><?php echo e($r->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-store')): ?>
                            <button class="btn btn-primary btn-save-user" type="submit"><i class="icofont icofont-plus"></i> Tambah</button>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-update')): ?>
                            <button class="btn btn-primary btn-edit-user" type="submit"><i class="icofont icofont-pencil"></i> Edit</button>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-destroy')): ?>
                            <button class="btn btn-danger btn-delete-user" type="button" data-id="0"><i class="icofont icofont-trash"></i> Hapus</button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('app-assets/js/pagination/pagination.js')); ?>"></script>
<script type="text/javascript">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['user-store', 'user-update'])): ?>
    $('#formUser').unbind('submit');
    <?php endif; ?>
    $(function() {
        $('.role').select2({
            theme: 'bootstrap4',
            dropdownParent: '#modalUser'
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        loadUser(1)
    })

    function pageUser(totalPages, visiblePages){
        $(".pagination_user").twbsPagination({
            totalPages: totalPages,
            visiblePages: visiblePages,
            paginationClass: 'pagination justify-content-center mr-6',
            pageClass: 'userPageLink',
            onPageClick: function (event, p) {
                loadUser(p)
            }
        })
    }

    function loadUser(page, search){
        search = $('#search_user').val()
        $.ajax({
            type: "get",
            url: "<?php echo e(route('dashboard.user.data')); ?>",
            data: {
                'search': search,
                'page': page
            },
            success: function(res) {
                var entry = `
                Menampilkan ${res.data.from} sampai ${res.data.to} dari ${res.data.total} entri
                `
                $('.user_entry').text(entry)

                if(res.total > 50){
                    pageUser(res.last_page, 5)
                } else {
                    pageUser(res.last_page, res.last_page)
                }
                let data = ''
                if(res.data.data.length > 0){
                    var urutan = (res.data.current_page - 1) * 10
                    $.each(res.data.data, (k, v) => {
                        role = ''
                        if(v.roles.length != 0){
                            $.each(v.roles, (rk, rv) => {
                                role += `- ${rv.name} `   
                            })
                        } else {
                            role = 'Unset'
                        }
                        action = `<button class="btn btn-sm btn-primary detail-user" title="Detail" data-id="${v.id}"><i class="icofont icofont-gear"></i></button>`
                        data += `<tr>
                        <td scope="row">${urutan+(++k)}</td>
                        <td>${v.name}</td>
                        <td>${v.email}</td>
                        <td>${v.phone}</td>
                        <td>${v.address}</td>
                        <td>${role}</td>
                        <td class="text-center">
                        ${action}
                        </td>
                        </tr>`
                    })
                    $('#tbody_user').html(data)
                } else {
                    data = `
                    <tr>
                    <td class="text-center" colspan="${$('#thead_crud th').length}">Data Kosong</td>
                    </tr>
                    `
                    $('#tbody_user').html(data)
                    $('.user_entry').empty()
                }
            },
            error: function(request, status, error) {
                let errorData = JSON.parse(request.responseText)
            }
        })
    }

    $('#search_user').keyup(delay(function (e) {
        let search_user = $(this).val()
        $(".pagination_user").twbsPagination('destroy')
        loadUser(1, search_user)
    }, 250))

    $('.add-user').on('click', function() {
        $('#modalUserLabel').html('Tambah User')
        $('.btn-save-user').show()
        $('.btn-edit-user').hide()
        $('.btn-delete-user').attr('data-id', 0)
        $('.btn-delete-user').hide()
        $('#formUser').trigger('reset')
        $('.select2').val('').trigger('change')
        $('.password').attr('required', true)
        $('#modalUserLabel').html('Tambah User')
        $('#modalUser').modal('show')
    })

    var deleteUserId;

    $('body').on('click', '.detail-user', function () {
        var id = $(this).data('id')
        $.get("<?php echo e(route('dashboard.user.show', ':id')); ?>".replace(':id', id), function (data) {
            $('#modalUserLabel').html('Atur User')
            $('.user_id').val(data.data.id)
            $('.name').val(data.data.name)
            $('.email').val(data.data.email)
            $('.noHp').val(data.data.phone)
            $('.address').val(data.data.address)
            if(data.data.roles.length == 0){
                $('.role').val('').trigger('change')
            } else {
                $('.role').val(data.data.roles[0].name).trigger('change')   
            }
            $('.password').attr('required', false)
            $('.btn-save-user').hide()
            deleteUserId = data.data.id;
            $('.btn-edit-user').show()
            $('.btn-delete-user').show()
            $('#modalUserLabel').html('Edit Role')
            $('#modalUser').modal('show')
        })
    })

    $('#formUser').on('submit', function(e){
        e.preventDefault()
        var formData = $(this).serialize();
    
    console.log(formData);
        $.ajax({
            data: formData,
            url: "<?php echo e(route('dashboard.user.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $(this).trigger("reset")
                $('#modalUser').modal('hide')
                swal("Success...", data.message, "success")
                loadUser(1)
            },
            error: function (xhr, status, error) {
                // swal("Error...", data.message, "error")
                var errorMessage = xhr.responseJSON.message;
                swal("Error...", errorMessage, "error");
            }
        })
    })

    $('.btn-delete-user').on('click', function(){
        var id = deleteUserId;
        swal({
                title: "Apakah Anda yakin?",
                text: "Anda tidak akan dapat mengembalikan tindakan ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "DELETE",
                        url: "<?php echo e(route('dashboard.user.destroy', ':id')); ?>".replace(':id',
                            id),
                        success: function(data) {
                            $('#modalUser').modal('hide');
                            swal("Success...", data.message, "success");
                            loadUser(1);
                        },
                        error: function(xhr, status, error) {
                            var errorMessage = xhr.responseJSON.message;
                            swal("Error...", errorMessage, "error");
                        }
                    });
                } else {
                    swal("Penghapusan dibatalkan.", {
                        icon: "info",
                    });
                }
            });
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Syariahroom\resources\views/master/dashboard/user/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Админ панель')); ?></div>

                <h2>Категории</h2>

                <form action="<?php echo e(route('addCategory')); ?>" method="post" class="row g-3">
                    <?php echo csrf_field(); ?>
                    <div class="col-12">
                        <label for="name_category" class="form-label">Название категории</label>
                        <input type="text" class="form-control" id="name_category" name="name_category" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
                <h2  class="card-title">Кадровый учет</h2></div>
                <a class="nav-link" href="<?php echo e(route('admin2')); ?>"><?php echo e(__('Кадровый учет')); ?></a>


            </div>
                    <H2>Заказы</H2>
                    <div class="col-12">

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">

                        <form action="<?php echo e(route('admins')); ?>" method="POST" class="row g-3">
                            <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($order->address); ?> </h5>
                            <p class="card-text"><?php echo e($order->date); ?>  <?php echo e($order->time); ?> </p>
                            <p class="card-text">вес товара - <?php echo e($order->weight); ?> </p>
                            <p class="card-text">адрес доставки - <?php echo e($order->address); ?> </p>
                            <input type="hidden" name="id_order"  value="<?php echo e($order->id_order); ?>">
                            <input type="hidden" name="id_user"  value="<?php echo e($order->id_user); ?>">
                            <input type="hidden" name="weight"  value="<?php echo e($order->weight); ?>">
                            <input type="hidden" name="id_category"  value="<?php echo e($order->id_category); ?>">
                            <div class="col-md-4">
                                <label for="id_driver" class="form-label">Выберите водителя</label>
                                <select id="id_driver" class="form-select" name="id_driver" required>
                                    <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($driver->id_worker); ?>"><?php echo e($driver->surname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Одобрить заказ</button>

                        </div>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin.blade.php ENDPATH**/ ?>
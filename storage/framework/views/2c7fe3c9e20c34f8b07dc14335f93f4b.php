<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
<h1>My To-Do List</h1>

<?php if($errors->any()): ?>
    <div>
        <p>Please fix the following issues:</p>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/tasks" method="POST">
    <?php echo csrf_field(); ?>
    <div>
        <label for="title">Task Title</label>
        <input id="title" type="text" name="title" value="<?php echo e(old('title')); ?>" required />
    </div>

    <div>
        <label for="description">Description (optional)</label>
        <textarea id="description" name="description"><?php echo e(old('description')); ?></textarea>
    </div>

    <button type="submit">Add Task</button>
</form>

<?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div>
        <?php if(isset($editingTask) && $editingTask->id === $task->id): ?>
            <form action="/tasks/<?php echo e($task->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div>
                    <label for="edit_title_<?php echo e($task->id); ?>">Task Title</label>
                    <input id="edit_title_<?php echo e($task->id); ?>" type="text" name="title" value="<?php echo e(old('title', $task->title)); ?>" required />
                </div>
                <div>
                    <label for="edit_description_<?php echo e($task->id); ?>">Description (optional)</label>
                    <textarea id="edit_description_<?php echo e($task->id); ?>" name="description"><?php echo e(old('description', $task->description)); ?></textarea>
                </div>
                <button type="submit">Update Task</button>
                <a href="/">Cancel</a>
            </form>
        <?php else: ?>
            <p><strong><?php echo e($task->title); ?></strong></p>
            <?php if($task->description): ?>
                <p><?php echo e($task->description); ?></p>
            <?php endif; ?>
            <p>Status: <?php echo e(ucfirst($task->status)); ?></p>
            <a href="/tasks/<?php echo e($task->id); ?>/edit">Edit</a>
            <form action="/tasks/<?php echo e($task->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit">Delete</button>
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>No tasks yet.</p>
<?php endif; ?>
</body>
</html>

<?php /**PATH C:\To-Do List Application New\resources\views/tasks/index.blade.php ENDPATH**/ ?>
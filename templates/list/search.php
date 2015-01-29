<h2><?php echo f('controller.name') ?></h2>

<!-- <div class="button round"> -->
    <a class="button round" href="<?php echo f('controller.url', '/null/create') ?>" style="margin-bottom:15px;">Create</a>
<!-- </div> -->

<div class="table-container">

    <table class="table nowrap stripped hover">
        <thead>
            <tr>
                <?php if (f('app')->controller->schema()): ?>
                <?php foreach(f('app')->controller->schema() as $name => $field): ?>

                    <th><?php echo $field->label(true) ?></th>

                <?php endforeach ?>
                <?php else: ?>
                    <th>Data</th>
                <?php endif ?>

            </tr>
        </thead>
        <tbody>

            <?php if (count($entries)): ?>
            <?php foreach($entries as $entry): ?>

            <tr>
                <?php if (f('app')->controller->schema()): ?>
                <?php foreach(f('app')->controller->schema() as $name => $field): ?>

                <td>
                    <a style="color:#4043C3" href="<?php echo f('controller.url', '/'.$entry['$id']) ?>">
                    <?php echo $entry[$name] ?>
                    </a>
                </td>

                <?php endforeach ?>
                <?php else: ?>
                <td><?php echo reset($entry) ?></td>
                <?php endif ?>

            </tr>

            <?php endforeach ?>
            <?php else: ?>

            <tr>
                <td colspan="100">no record!</td>
            </tr>

            <?php endif ?>

        </tbody>
    </table>
</div>
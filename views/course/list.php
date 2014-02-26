<form method="POST" action="<?= $editAction?>">
    <?php if($countModified > 0):?>
     <?= MessageBox::success(_(sprintf("%d Veranstaltungen wurden bearbeitet",$countModified)),$modified)?>
    <?php else:?>
     <?= MessageBox::info(_(sprintf("%d Veranstaltungen gefunden",$countCourses)))?>
    <?php endif;?>
   
    <table class="default">
        <thead>
            <tr>
                <th width="50%"><?= _('Veranstaltungstitel Deutsch') ?></th>
                <th><?= _('Veranstaltungstitel Englisch') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
                <?php 
                $germanName = htmlReady($course->germanName);
                $id = htmlReady($course->id);
                $englishName = htmlReady($course->englishName);
                ?>
                <td><?= $germanName ?></td>
                <td><input type="hidden" name="courses[<?= $id?>][courseId]" value="<?= $id?>"><input type="text" name="courses[<?= $id ?>][englishName]" style="width: 99%" value="<?= $englishName ?>"></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <hr>
    <input type="hidden" name="semesterName" value="<?= $semesterName ?>">
    <input type="submit" class="button" value="Speichern">
</form>
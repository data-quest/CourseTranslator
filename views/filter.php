<form id="translator-filter" method="POST" action="<?= $filterAction ?>">
    <input name="courseName" type="text" value="<?= $courseName ?>">

    <select name="instituteName">

        <?php foreach ($institutions as $institute): ?>
            <?php $class         = ((bool) $institute['is_fak']) ? ' class="faculty"' : ''; ?>
            <?php $selected      = ($institute['Name'] === $selectedInstitute) ? ' selected="selected"' : ''; ?>
            <?php $instituteName = htmlReady($institute['Name']); ?>
            <option value="<?= $instituteName ?>"<?= $class ?><?= $selected ?>>
                <?= $instituteName ?> 
            </option>
        <?php endforeach; ?>
    </select>
    <select name="semesterName">
        <?php foreach ($semester as $semesterInfo): ?>
            <?php $selected     = ($semesterInfo['name'] === $selectedSemester) ? ' selected="selected"' : '' ?>
            <?php $semesterName = htmlReady($semesterName); ?>
            <option value="<?= $semesterName ?>"<?= $selected ?>><?= $semesterName ?></option>
        <?php endforeach; ?>
    </select>
    <div>
        <?php $checked = $notTranslated ? 'checked="checked"' : ''; ?>
        <input type="checkbox" name="notTranslated"<?= $checked ?>><?= _('Übersetzte Veranstaltungen ausblenden?') ?></div>
    <input type="submit" value="<?= _('Suche') ?>">
</form>


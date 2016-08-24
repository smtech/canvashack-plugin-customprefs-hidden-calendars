<?php

$response = $customPrefs->query("
    SELECT *
        FROM `courses`
        WHERE
            `calendar-visible` = '0'
");

?>
 var canvashack = {
    hideCalendar: function (id) {
        /* look to see if that calendar is currently enabled */
        if ($('#context-list li[data-context="' + id + '"] checked').length != 0) {
            /* click toggle box to hide (a persistent setting -- should only happen once) */
            $('#context-list li[data-context="' + id + '"] .context-list-toggle-box').click();
        }

        /* hide calendar so that it can't be re-enabled -- and won't count against limit of 10 */
        $('#context-list li[data-context="' + id + '"]').remove();
    },

    hideCalendars: function () {
        <?php

        while (($course = $response->fetch_assoc()) !== false) {
            echo "hideCalendar({$course['id']});" . PHP_EOL;
        }

        ?>
    }
};

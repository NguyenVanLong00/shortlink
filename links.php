<?php
require_once('./_private/bundle.php');
require_once(HEADER);
?>
<div id="links">
    <table>
        <tr>
            <td>Link</td>
            <td>Shortlink</td>
            <td>Created at</td>
            <td>Visits</td>
        </tr>
    </table>
    
    <div>  
        <img id="before" alt="" src="<?= HOME . '/assets/images/arrow.svg' ?>" />
        <div>0</div>
        <img id="next" alt="" src="<?= HOME . '/assets/images/arrow.svg' ?>" />
    </div>
</div>
<?php
require_once(FOOTER);

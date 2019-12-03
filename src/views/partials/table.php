<?php

$table = [
    ["col1" => "entry1", "col2" => "entry2", "col3" => "entry2"],
    ["col1" => "entry3", "col2" => "entry4", "col3" => "entry2"],
    ["col1" => "entry5", "col2" => "entry6", "col3" => "entry2"],
]

?>

<h1>table view</h1>

<section class="table-responsive">
<table class="table">
    <tr>
        <thead>    
        <?php foreach (array_keys($table[0]) as $key => $headline) : 
        ?>
            <th scope="col"><?= $headline; ?></th>
                            
        <?php endforeach; ?>
        </thead>
    </tr>

    <?php foreach ($table as $key => $row) : 
    ?>
    <tr>
        <?php foreach ($row as $cell) : 
        ?>
            <td><?= $cell; ?></td>
                            
        <?php endforeach; ?>
    </tr>
                        
    <?php endforeach; ?>
</table>
</section>

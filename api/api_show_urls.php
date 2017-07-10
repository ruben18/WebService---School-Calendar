<style>
    table{ 
        margin:0 auto;
        border-collapse: collapse;
        text-align:center;
        min-width:50%;
    }
    table, tr, td{
        border:1px solid black;
       
    }
</style>
<?php
$urls=[
    ["New task",'/api/api_add_task.php',"POST", "auth, key, value, date"],
    ["All tasks",'/api/api_all_tasks.php', "POST", "auth, key"],
    ["Edit task",'/api/api_update_task.php',"POST", "auth, key, id, value, date"],
    ["Get task",'/api/api_get_task.php', "POST", "auth, key, id"],
    ["Delete task",'/api/api_delete_task.php',"POST", "auth, key, id"]
   ];
echo "<table>";
    echo "<thead>";
        echo "<tr>";
            echo "<th>Action</th>";
            echo "<th>URL</th>";
            echo "<th>Method</th>";
            echo "<th>Parameters(JSON String)</th>";
    echo "</thead>";
    echo "<tbody>";
    foreach($urls as $url){
        echo "<tr>";
            echo "<td>".$url[0]."</td>";
            echo "<td>".$url[1]."</td>";
            echo "<td>".$url[2]."</td>";
            echo "<td>".$url[3]."</td>";
        echo "</tr>";
    }
    echo "</tbody>";
echo "</table>";
?>
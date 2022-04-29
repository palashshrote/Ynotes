<?php
<table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">S_no</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    $sql = "SELECT * FROM `note`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                       
                        echo "<tr>
                        <th scope='row'>". $row['s_no']. "</th>
                        <td>" . $row['title'] . "</td>
                        <td>" . $row['desc'] . "</td>
                        <td> Actions </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
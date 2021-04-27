<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file"><br>
        <button name="upload">Upload</button>
    </form>

    <div class="output">
        <h2>Output</h2>
        <?php
            if (isset($_POST['send'])){
                
                $test_results = [];
                $content_split = explode("\n", $_POST['content']);
                $q_num = -1;
                        
                for ($i = 0; $i < count($content_split); $i++){
                    if (substr($content_split[$i], 0, 3) == "!~!") 
                        $q_num++;
                    else if (substr($content_split[$i], 2 , 3) == "!+!"){
                        $cur = [ str_split($content_split[$i])[0], $_POST[$q_num] ]; 
                        array_push($test_results, $cur);
                    }
                }
                create_test($_POST['content'], $test_results);
            }
        
            else if (isset($_POST['upload'])){
                $file = $_FILES['file'];
                move_uploaded_file($file['tmp_name'], $file['name']);
                $content = fopen($file['name'], 'r');
                $content = fread($content, filesize($file['name']));
                create_test($content);
        }

        function create_test($content, $test_results = false){
            $total_correct = [0, count($test_results)];
            $content_split = explode("\n", $content);
            $content_split = array_values($content_split);
            $question_num = -1;
            echo "<form method='post'>";
                for ($i = 0; $i < count($content_split); $i++){
                    if (substr($content_split[$i], 0, 3) == "!~!") {
                        echo "<p>" . substr($content_split[$i], 3) . "</p>";
                        $question_num++;
                    }
                    else if (!empty(trim($content_split[$i]))){
                        $value = str_split($content_split[$i])[0];
                        $question = $content_split[$i];
                        
                        if (substr($content_split[$i], 2 , 3) == "!+!"){
                            $question = str_replace("!+!", "", $content_split[$i]);
                        };

                        if (!$test_results){
                            $id = substr($content_split[$i], 0, 1);
                            $input = "<input type='radio' name=$question_num id=$id$i value=$value>";
                            $label = "<label for=$id$i class='option'> $question </label> <br>";
                        }
                        
                        else {
                            $correct_answer = "";
                            $your_answer = "";
                            $checked = "";
                            if (str_split($content_split[$i])[0] == $test_results[$question_num][0]){
                                $correct_answer = " - correct answer";
                                if (str_split($content_split[$i])[0] == $test_results[$question_num][1]){
                                    $total_correct[0]++;
                                    $checked = "checked";
                                }
                            }
                            else if (str_split($content_split[$i])[0] == $test_results[$question_num][1]){
                                    $checked = "checked";
                            }
                                
                            $input = "<input type='radio' disabled $checked>";
                            $label = "<label class='option'> $question $correct_answer$your_answer</label> <br>";
                        }
                        echo $input . $label;
                    }
                }
                echo "total score: $total_correct[0] / $total_correct[1]";
                echo "<input type='hidden' value='$content' name='content'>";
                echo "<button name='send'> Submit </button>";
            echo "</form>";
        }

        ?>
                    
        
    </div>
</body>
</html>
<?php
header('Content-Type: application/json');

$question = strtolower($_POST['question'] ?? '');
$knowledge = json_decode(file_get_contents('knowledge.json'), true);

$answer = "Sorry, I don't know the answer to that question.";

foreach($knowledge as $item){
    foreach($item['keywords'] as $keyword){
        if(str_contains($question, strtolower($keyword))){
            $answer = $item['answer'];
            break 2; 
        }
    }
}

echo json_encode(['answer' => $answer]);
?>

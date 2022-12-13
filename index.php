<!DOCTYPE html>
<html>
<head>
<style>
.questiondiv {
  border: 1px outset red;
  background-color: lightblue;    
  text-align: left;
  width: 50%;
}
</style>
</head>
<body><form action="" method="post">
    Question:
    <input type="text" name="question" id="question" size="85" value="<?php echo $_POST['question'];?>">
    <input type="submit" value="Ask Question" name="submit">
</form>
<br>
<?php
error_reporting(0);
require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
$question = $_POST['question'];
$open_ai_key = 'yourapicode';
$open_ai = new OpenAi($open_ai_key);
$result = $open_ai->completion([
    "model" => "text-davinci-003",
    "prompt" => $question,
    'temperature' => 0.5,
   'max_tokens' => 750
]);

$arr  = (array) json_decode($result, true);
echo '<div class="questiondiv">';
echo $arr['choices']['0']['text'];
echo '</div>';
}
?>

</body>
</html>

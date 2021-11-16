<?php

use App\PHPBasics\TextAnalyzer;

require 'TextAnalyzer.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Analyzer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="" method="post">
    <input placeholder="Input here your text" class="text" type="text" name="text">
    <input type="submit">
</form>

<?php
$class = 'none';
if (isset($_POST['text'])) {
    $text = $_POST['text'];
    $analyzer = new TextAnalyzer($text);
    $data = $analyzer->analyze();
    $class = 'flex';
}
?>

<div class="data-container" style="display: <?php echo $class ?>">
    <ul>
        <h4><b>General</b></h4>
        <li><b>Start: </b><?php echo $data['start'] ?></li>
        <li><b>Time: </b><?php echo $data['time'] ?></li>
        <li><b>Reversed: </b><?php echo $data['reversed'] ?></li>
        <li><b>Reversed partial: </b><?php echo $data['reversedPartial'] ?></li>
        <li><b>Is palindrome: </b><?php echo $data['isPalindrome'] ?></li>
    </ul>

    <ul>
        <h4><b>Sentences</b></h4>

        <li><b>Number of sentences: </b><?php echo $data['sentences']['number'] ?></li>
        <li><b>The average number of words in a sentence: </b>
            <?php echo $data['sentences']['averageSentencesLength'] ?>
        </li>
        <li><b>Top 10 longest sentences: </b>
            <ol>
                <?php foreach ($data['sentences']['longest'] as $sentence) {
                    echo "<li>{$sentence}</li>";
                } ?>
            </ol>
        </li>
        <li><b>Top 10 shortest sentences: </b>
            <ol>
                <?php foreach ($data['sentences']['shortest'] as $sentence) {
                    echo "<li>{$sentence}</li>";
                } ?>
            </ol>
        </li>
    </ul>

    <ul>
        <h4><b>Words</b></h4>
        <li><b>Number of words: </b><?php echo $data['words']['number'] ?></li>
        <li><b>Average word length: </b>
            <?php echo $data['words']['averageWordLength'] ?>
        </li>
        <li><b>Number of palindrome words: </b>
            <?php echo $data['words']['palindromesNumber'] ?>
        </li>
        <li><b>Top 10 longest palindrome words: </b>
            <ol>
                <?php foreach ($data['words']['topPalindromes'] as $key => $sentence) {
                    echo "<li>{$key}</li>";
                } ?>
            </ol>
        </li>
        <li><b>Top 10 most used words: </b>
            <ol>
                <?php foreach ($data['words']['popular'] as $key => $sentence) {
                    echo "<li>{$key}</li>";
                } ?>
            </ol>
        </li>
        <li><b>Top 10 longest words: </b>
            <ol>
                <?php foreach ($data['words']['longest'] as $sentence) {
                    echo "<li>{$sentence}</li>";
                } ?>
            </ol>
        </li>
        <li><b>Top 10 shortest words: </b>
            <ol>
                <?php foreach ($data['words']['shortest'] as $sentence) {
                    echo "<li>{$sentence}</li>";
                } ?>
            </ol>
        </li>
    </ul>

    <ul>
        <h4><b>Characters</b></h4>
        <li><b>Number of characters: </b><?php echo $data['characters']['number'] ?></li>
        <li><b>Characters info: </b>
            <ol>
                <?php foreach ($data['characters']['characterInfo'] as $key => $info) {
                    echo "<li>  <b>({$key})</b>   (Frequency: {$info['number']} Percentage of total: {$info['percentage']})</li>";
                } ?>
            </ol>
        </li>
    </ul>

</div>
</body>
</html>
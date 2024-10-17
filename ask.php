<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pregnancy Information Form</title>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <!-- Basic Information -->
    <div>
        <label for="date">Date:</label>
        <input class="input" type="text" name="date" id="date" readonly>
    </div>

    <div>
        <label for="time">Time:</label>
        <input class="input" type="text" name="time" id="time" readonly>
    </div>

    <!-- Other basic information fields -->
    <!-- Add the rest of your basic information fields here -->

    <!-- First "Yes/No" question -->
    <div>
        <label for="whr1">Is the Pregnant woman identified as a High Risk (Question 1)?</label><br>
        <select class="input" id="whr1" name="whr1" required onchange="showHighRiskFields('1')">
            <option value="">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
    </div>

    <!-- First set of additional fields for High Risk (Initially hidden) -->
    <div id="highRiskFields1" style="display: none;">
        <h3>Additional Questions for "Yes" of Question 1:</h3>
        <label for="question1">Question 1:</label><br>
        <input type="text" id="question1" name="question1"><br>
        <label for="question2">Question 2:</label><br>
        <input type="text" id="question2" name="question2"><br>
        <!-- Add more questions as needed -->
    </div>

    <!-- Second "Yes/No" question -->
    <div>
        <label for="whr2">Is the Pregnant woman identified as a High Risk (Question 2)?</label><br>
        <select class="input" id="whr2" name="whr2" required onchange="showHighRiskFields('2')">
            <option value="">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
    </div>

    <!-- Second set of additional fields for High Risk (Initially hidden) -->
    <div id="highRiskFields2" style="display: none;">
        <h3>Additional Questions for "Yes" of Question 2:</h3>
        <label for="question3">Question 3:</label><br>
        <input type="text" id="question3" name="question3"><br>
        <label for="question4">Question 4:</label><br>
        <input type="text" id="question4" name="question4"><br>
        <!-- Add more questions as needed -->
    </div>

    <input type="submit" value="Submit">
</form>

<!-- JavaScript to show/hide high risk fields -->
<script>
    function showHighRiskFields(questionNumber) {
        var whr = document.getElementById('whr' + questionNumber).value;
        var highRiskFields = document.getElementById('highRiskFields' + questionNumber);

        if (whr === 'yes') {
            highRiskFields.style.display = 'block';
        } else {
            highRiskFields.style.display = 'none';
        }
    }
</script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>EDD Calculator</title>
    <script>
        function calculateDates() {
            var lastMenstruationDate = document.getElementById("lastMenstruationDate").value;
            
            // Calculate EDD
            var eddDate = new Date(lastMenstruationDate);
            eddDate.setDate(eddDate.getDate() + 280); // Adding 280 days (40 weeks)
            var eddDay = eddDate.getDate();
            var eddMonth = eddDate.getMonth() + 1; // Months are zero-indexed, so adding 1
            var eddYear = eddDate.getFullYear();
            var eddDateString = formatTwoDigits(eddDay) + '-' + formatTwoDigits(eddMonth) + '-' + eddYear;

            // Calculate Gestation Week
            var today = new Date();
            var daysPassed = Math.floor((today - new Date(lastMenstruationDate)) / (24 * 60 * 60 * 1000));
            var gestationWeek = Math.floor(daysPassed / 7);
            var gestationDays = daysPassed % 7;

            // Set the values in the input fields
            document.getElementById("edd").value = eddDateString;
            document.getElementById("gestationWeek").value = gestationWeek + " weeks, " + gestationDays + " days";
        }

        // Helper function to format single digits to have leading zero
        function formatTwoDigits(num) {
            return (num < 10 ? '0' : '') + num;
        }
    </script>
</head>
<body>
    <h2>Estimated Due Date (EDD) and Gestation Week Calculator</h2>
    <form>
	     
        <label for="lastMenstruationDate">Enter Last Menstruation Date:</label><br>
        <input type="date" id="lastMenstruationDate" name="lastMenstruationDate" onchange="calculateDates()" required><br><br>
        
        <label for="edd">Estimated Due Date (EDD):</label><br>
        <input type="text" id="edd" name="edd" readonly><br><br>
        
        <label for="gestationWeek">Gestation Week:</label><br>
        <input type="text" id="gestationWeek" name="gestationWeek" readonly><br><br>
    </form>
</body>
</html>

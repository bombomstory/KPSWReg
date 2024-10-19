<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Option with Ajax</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h2>Select an Option</h2>
    <select id="mySelect">
        <option value="">Select an option</option>
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
    </select>

    <div id="result"></div>

    <script>
        $(document).ready(function(){
            $('#mySelect').on('change', function(){
                var selectedValue = $(this).val();

                if(selectedValue) {
                    $.ajax({
                        url: "getData.php",
                        method: "POST",
                        data: { value: selectedValue },
                        success: function(response) {
                            $('#result').html(response);
                        }
                    });
                } else {
                    $('#result').html("");
                }
            });
        });
    </script>

</body>
</html>

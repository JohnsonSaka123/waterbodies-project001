<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./styles/feedback.css">
</head>
<body>

<div class="container">
    <h1>Feedback Form</h1>
    <form method="post" action="submit_feedback.php">
        <div class="input-group">
            <label for="name">Name <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="input-group">
            <label for="email">Email <span style="color: red;">*</span></label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="rating">Rating <span style="color: red;">*</span></label>
            <select id="rating" name="rating" required>
                <option value="" disabled selected>Select your rating</option>
                <option value="1">1 - Very Poor</option>
                <option value="2">2 - Poor</option>
                <option value="3">3 - Average</option>
                <option value="4">4 - Good</option>
                <option value="5">5 - Excellent</option>
            </select>
        </div>
        <div class="input-group">
            <label for="feedback">Feedback <span style="color: red;">*</span></label>
            <textarea id="feedback" name="feedback" rows="5" required></textarea>
        </div>
        <input type="submit" class="btn" name="submit"></input>
    </form>
</div>

</body>
</html>
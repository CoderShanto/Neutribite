<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Food Experience</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        button {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Share Your Food Experience</h1>
    <button onclick="shareOnFacebook()">Share on Facebook</button>
    <button onclick="shareOnInstagram()">Share on Instagram</button>
    <button onclick="shareOnTwitter()">Share on Twitter</button>
    <button onclick="goToProfile()">Back to Profile</button>
</div>

<script>
    function shareOnFacebook() {
        var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=https://your-website.com/food-experience-page';
        window.open(shareUrl, '_blank');
    }

    function shareOnInstagram() {
        var shareUrl = 'https://www.instagram.com/';
        window.open(shareUrl, '_blank');
    }

    function shareOnTwitter() {
        var shareText = 'Check out my delicious food experience!';
        var shareUrl = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(shareText);
        window.open(shareUrl, '_blank');
    }

    function goToProfile() {
        window.location.href = 'profile.php';
    }
</script>

</body>
</html>

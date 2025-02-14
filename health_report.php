<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age-based Eating Plan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 30px 0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .section-title {
            text-align: center;
            font-size: 1.8em;
            margin-bottom: 20px;
        }
        .age-group {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .age-group h3 {
            margin: 0;
        }
        .age-group p {
            margin: 5px 0;
        }
        .age-group-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .age-group-btn:hover {
            background-color: #45a049;
        }
        .diet-plan {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
            display: none;
        }
        .diet-plan ul {
            list-style-type: none;
            padding: 0;
        }
        .diet-plan li {
            padding: 5px 0;
        }
        .diet-plan h4 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>Age-Based Eating Plan</h1>
    <p>Choose your age group and get a personalized eating plan</p>
</header>

<div class="container">
    <div class="section-title">Select Your Age Group</div>

    <!-- Age Group Section -->
    <div class="age-group">
        <div>
            <h3>16 - 18 Years</h3>
            <p>Diet focused on energy and growth.</p>
        </div>
        <button class="age-group-btn" onclick="showDietPlan('16-18')">View Plan</button>
    </div>
    
    <div class="age-group">
        <div>
            <h3>19 - 25 Years</h3>
            <p>Diet focused on fitness, energy, and muscle growth.</p>
        </div>
        <button class="age-group-btn" onclick="showDietPlan('19-25')">View Plan</button>
    </div>

    <div class="age-group">
        <div>
            <h3>26 - 30 Years</h3>
            <p>Diet focused on metabolism, fitness, and healthy lifestyle.</p>
        </div>
        <button class="age-group-btn" onclick="showDietPlan('26-30')">View Plan</button>
    </div>

    <div class="age-group">
        <div>
            <h3>31 - 35 Years</h3>
            <p>Diet focused on weight management and energy.</p>
        </div>
        <button class="age-group-btn" onclick="showDietPlan('31-35')">View Plan</button>
    </div>

    <div class="age-group">
        <div>
            <h3>36 - 40 Years</h3>
            <p>Diet focused on maintaining health, joint support, and heart health.</p>
        </div>
        <button class="age-group-btn" onclick="showDietPlan('36-40')">View Plan</button>
    </div>

    <div class="age-group">
        <div>
            <h3>41 - 45 Years</h3>
            <p>Diet focused on bone health, weight management, and metabolic support.</p>
        </div>
        <button class="age-group-btn" onclick="showDietPlan('41-45')">View Plan</button>
    </div>

    <div class="age-group">
        <div>
            <h3>46 - 50 Years</h3>
            <p>Diet focused on reducing inflammation, heart health, and digestive health.</p>
        </div>
        <button class="age-group-btn" onclick="showDietPlan('46-50')">View Plan</button>
    </div>

   <!-- Diet Plan Display -->
<div id="diet-16-18" class="diet-plan">
    <h4>Eating Plan for 16 - 18 Years</h4>
    <ul>
        <li><strong>Breakfast:</strong> Whole grain cereal, eggs, fruit, chia seeds</li>
        <li><strong>Lunch:</strong> Grilled chicken with quinoa, avocado, and salad</li>
        <li><strong>Dinner:</strong> Grilled salmon with steamed broccoli, sweet potatoes</li>
        <li><strong>Snacks:</strong> Mixed nuts, yogurt, protein shakes, apple slices with almond butter</li>
    </ul>
</div>

<div id="diet-19-25" class="diet-plan">
    <h4>Eating Plan for 19 - 25 Years</h4>
    <ul>
        <li><strong>Breakfast:</strong> Oats with berries, nuts, milk, and flax seeds</li>
        <li><strong>Lunch:</strong> Grilled chicken with brown rice, vegetables, and hummus</li>
        <li><strong>Dinner:</strong> Salmon with roasted vegetables, quinoa, and olive oil</li>
        <li><strong>Snacks:</strong> Almonds, protein bars, fruit, Greek yogurt with honey</li>
    </ul>
</div>

<div id="diet-26-30" class="diet-plan">
    <h4>Eating Plan for 26 - 30 Years</h4>
    <ul>
        <li><strong>Breakfast:</strong> Greek yogurt with honey, granola, and pumpkin seeds</li>
        <li><strong>Lunch:</strong> Chicken breast with steamed broccoli, rice, and avocado</li>
        <li><strong>Dinner:</strong> Grilled shrimp with avocado, leafy salad, and olive oil</li>
        <li><strong>Snacks:</strong> Carrot sticks, hummus, mixed nuts, protein shake</li>
    </ul>
</div>

<div id="diet-31-35" class="diet-plan">
    <h4>Eating Plan for 31 - 35 Years</h4>
    <ul>
        <li><strong>Breakfast:</strong> Scrambled eggs with spinach, avocado, and whole grain toast</li>
        <li><strong>Lunch:</strong> Grilled turkey with quinoa, steamed vegetables, and olive oil</li>
        <li><strong>Dinner:</strong> Grilled fish with steamed asparagus, leafy greens</li>
        <li><strong>Snacks:</strong> Greek yogurt, nuts, fruits, chia pudding</li>
    </ul>
</div>

<div id="diet-36-40" class="diet-plan">
    <h4>Eating Plan for 36 - 40 Years</h4>
    <ul>
        <li><strong>Breakfast:</strong> Oats with chia seeds, honey, berries, and flax seeds</li>
        <li><strong>Lunch:</strong> Salad with lean protein (chicken or tofu), healthy fats (avocado, olive oil)</li>
        <li><strong>Dinner:</strong> Steamed fish with leafy greens and quinoa</li>
        <li><strong>Snacks:</strong> Seeds, nuts, fruits, hummus, apple slices with peanut butter</li>
    </ul>
</div>

<div id="diet-41-45" class="diet-plan">
    <h4>Eating Plan for 41 - 45 Years</h4>
    <ul>
        <li><strong>Breakfast:</strong> Scrambled eggs with spinach, whole grain toast, and avocado</li>
        <li><strong>Lunch:</strong> Grilled chicken with roasted vegetables, quinoa, and kale</li>
        <li><strong>Dinner:</strong> Salmon with sweet potatoes, steamed broccoli, and greens</li>
        <li><strong>Snacks:</strong> Almonds, fruit, protein shakes, celery with almond butter</li>
    </ul>
</div>

<div id="diet-46-50" class="diet-plan">
    <h4>Eating Plan for 46 - 50 Years</h4>
    <ul>
        <li><strong>Breakfast:</strong> Whole grain cereal, mixed berries, low-fat milk, and flax seeds</li>
        <li><strong>Lunch:</strong> Chicken salad with leafy greens, olive oil, and nuts</li>
        <li><strong>Dinner:</strong> Grilled tofu with mixed vegetables, quinoa</li>
        <li><strong>Snacks:</strong> Nuts, mixed fruit, yogurt, and carrot sticks</li>
    </ul>
</div>

<script>
    function showDietPlan(ageGroup) {
        // Hide all diet plans first
        const dietPlans = document.querySelectorAll('.diet-plan');
        dietPlans.forEach(plan => plan.style.display = 'none');

        // Show the selected diet plan
        const selectedDiet = document.getElementById('diet-' + ageGroup);
        if (selectedDiet) {
            selectedDiet.style.display = 'block';
        }
    }
</script>

</body>
</html>

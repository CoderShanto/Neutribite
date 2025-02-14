<?php
header('Content-Type: application/json');

// Get the command from the POST request
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['command'])) {
    $command = strtolower($input['command']);
    $response = '';
    $url = '';

    // Simple command processing for a food website
    switch ($command) {
        case 'hello':
            $response = 'Hello! Welcome to neautritionbite. How can I assist you today?';
            break;
        case 'what is your name':
            $response = 'I am your personal assistant, sara.';
            break;
        case 'what is the time':
            $response = 'The current time is ' . date('h:i A');
            break;
        case 'what is the date':
            $response = 'Today\'s date is ' . date('Y-m-d');
            break;
        case 'recommend a dish':
            $response = 'How about trying our chef\'s special pasta? It\'s a customer favorite!';
            break;
        case 'what are today\'s specials':
            $response = 'Today\'s specials are grilled salmon with lemon butter sauce and chocolate lava cake for dessert.';
            break;
        case 'what is the soup of the day':
            $response = 'Today\'s soup of the day is creamy tomato basil soup.';
            break;
        case 'do you have vegan options':
            $response = 'Yes, we have a variety of vegan options including a vegan burger and a quinoa salad.';
            break;
        case 'can i see the menu':
            $response = 'Navigating to the menu page.';
            $url = 'index.php'; // URL to the menu page
            break;
            case 'go to my profile page':
                $response = 'Navigating to the profile page.';
                $url = './users_area/profile.php'; // URL to the menu page
                break;
                case 'show me my orders':
                    $response = 'Navigating to your order page.';
                    $url = './users_area/profile.php?my_orders'; // URL to the menu page
                    break;  
                    case 'show me all products':
                    $response = 'Navigating to the product page.';
                    $url = 'display_all.php'; // URL to the menu page
                    break;      
        case 'how can i order':
            $response = 'You can order through our website or call us at 123-456-7890.';
            break;
        case 'what are your hours':
            $response = 'We are open from 10 AM to 10 PM every day.';
            break;
            case 'do you have any mango':
                $response = 'Yes, we have Mango Smoothie available! It contains 150 calories, 2g protein, 35g carbs, and 1g fat. Would you like to order one?';
                break;
            
            case 'which food has 200 calories':
                $response = 'Our Avocado Toast has exactly 200 calories. It also includes 5g protein, 20g carbs, and 10g fat. Would you like more details or place an order?';
                break;
            
            case 'what is your location':
                $response = 'We are located at 456 Nutrition Street, Health City.';
                break;
            
            case 'what is the nutrition in a chicken salad':
                $response = 'Our Chicken Salad contains 250 calories, 30g protein, 15g carbs, and 5g fat. It is a perfect healthy option!';
                break;
            
            case 'tell me about mango benefits':
                $response = 'Mangoes are rich in vitamin C and A, good for boosting immunity, improving skin health, and aiding digestion.';
                break;
            
           
        case 'where are you located':
            $response = 'We are located at 123 Foodie Lane, Culinary City.';
            break;
        case 'tell me a food fact':
            $response = 'Did you know? Honey never spoils. Archaeologists have found pots of honey in ancient Egyptian tombs that are over 3000 years old and still edible.';
            break;
        case 'what is your best seller':
            $response = 'Our best seller is the BBQ chicken pizza.';
            break;
        case 'can i make a reservation':
            $response = 'Navigating to the reservation page.';
            $url = 'reservation.php'; // URL to the reservation page
            break;
        case 'do you offer delivery':
            $response = 'Yes, we offer delivery through our website and popular delivery apps.';
            break;
        case 'do you have gluten-free options':
            $response = 'Yes, we have several gluten-free dishes including gluten-free pasta and pizza.';
            break;
        case 'what desserts do you have':
            $response = 'Our dessert menu includes cheesecake, chocolate lava cake, and tiramisu.';
            break;
        case 'what drinks do you serve':
            $response = 'We serve a variety of drinks including soft drinks, coffee, tea, and a selection of wines and beers.';
            break;
        case 'go to home page':
            $response = 'Navigating to the home page.';
            $url = 'index.php'; // URL to the home page
            break;
        case 'go to contact page':
            $response = 'Navigating to the contact page.';
            $url = 'contact.php'; // URL to the contact page
            break;
        case 'what are your breakfast options':
            $response = 'Our breakfast options include pancakes, omelettes, and fresh fruit smoothies.';
            break;
        case 'do you have kids meals':
            $response = 'Yes, we offer a kids menu with items like mini burgers, chicken tenders, and mac and cheese.';
            break;
        case 'can i customize my order':
            $response = 'Absolutely! You can customize your order to your liking. Please specify your preferences when ordering.';
            break;
        case 'what are your payment options':
            $response = 'We accept cash, credit cards, and mobile payment options like Apple Pay and Google Wallet.';
            break;
        case 'do you have a loyalty program':
            $response = 'Yes, we have a loyalty program. Sign up on our website to earn points with every purchase.';
            break;
        case 'what is your return policy':
            $response = 'If you are not satisfied with your order, please contact us within 24 hours for a refund or replacement.';
            break;
        case 'can i cancel my order':
            $response = 'You can cancel your order within 10 minutes of placing it. Please call us immediately to cancel.';
            break;
        case 'do you cater events':
            $response = 'Yes, we offer catering services for events. Contact us for more details and to make arrangements.';
            break;
        case 'do you have seasonal dishes':
            $response = 'Yes, we have seasonal dishes that change throughout the year. Check our menu for current offerings.';
            break;
        default:
            $response = 'I did not understand that command. Please try again.';
    }

    echo json_encode(['response' => $response, 'url' => $url]);
} else {
    echo json_encode(['response' => 'No command received.']);
}
?>

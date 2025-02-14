<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // KNN Dataset
    $knn_data = [
        ["Fever", ["high temperature", "hot body"], "It seems like you have a fever. Suggestions:\n• Stay hydrated with plenty of water and electrolytes.\n• Rest as much as possible.\n• Use a thermometer to monitor your temperature regularly.\n• Take paracetamol if the fever is high and consult a doctor if it persists."],
        ["Headache", ["head pain", "migraine","head pull"], "It looks like you are experiencing a headache. Suggestions:\n• Rest in a quiet and dark room.\n• Apply a cold or warm compress to your head or neck.\n• Stay hydrated and avoid stress.\n• Over-the-counter pain relievers may help. See a doctor if the pain is severe or frequent."],
        ["Cough", ["throat irritation", "dry cough"], "You might have a cough. Suggestions:\n• Stay hydrated with warm drinks like tea or soup.\n• Use a humidifier to keep your throat moist.\n• Over-the-counter cough syrups or lozenges may help.\n• If the cough is persistent, consult a healthcare provider."],
        ["Sore throat", ["throat pain", "difficulty swallowing"], "A sore throat can be managed as follows:\n• Gargle with warm salt water to ease the pain.\n• Drink warm liquids and avoid very cold beverages.\n• Use throat lozenges or sprays for relief.\n• Consult a doctor if symptoms persist for more than a few days."],
        ["Fatigue", ["tiredness", "low energy"], "You might be experiencing fatigue. Suggestions:\n• Ensure you are getting enough sleep (7-9 hours daily).\n• Eat a balanced diet and avoid junk food.\n• Engage in light physical activities to boost energy levels.\n• Consult a doctor if the fatigue is persistent or accompanied by other symptoms."],
        ["Stomach pain", ["abdominal pain", "belly ache"], "Stomach pain could have various causes. Suggestions:\n• Stay hydrated with water or clear fluids.\n• Eat light, bland meals like rice or bananas.\n• Avoid greasy or spicy foods.\n• Over-the-counter antacids may help, but consult a doctor if the pain is severe or persists."],
        ["Shortness of breath and chest pain", ["difficulty breathing", "tight chest", "heart pain", "breathing issues"], "Breathing issues and chest pain can be serious. Please seek immediate medical attention. Suggestions:\n• Rest and avoid any strenuous activity.\n• Stay calm and avoid stress.\n• If pain persists or worsens, call emergency services immediately."],
        ["Extreme tiredness and joint pain", ["fatigue", "low energy", "stiff joints", "joint ache"], "You may be experiencing fatigue and joint pain due to overexertion, arthritis, or inflammation. Suggestions:\n• Rest is essential.\n• Include anti-inflammatory foods in your diet, such as turmeric and ginger.\n• Apply a warm compress to the joints.\n• Consult a doctor if the pain persists."],
        ["Rash and itchy skin", ["skin spots", "itchy patches", "skin irritation", "pruritus"], "A rash and itchy skin might indicate an allergy or skin condition. Suggestions:\n• Avoid irritants and allergens.\n• Keep the affected area clean and dry.\n• Consider using antihistamines or a mild steroid cream.\n• Consult a dermatologist if the symptoms worsen."]
    ];

    $user_input = strtolower($_POST['message'] ?? '');
    $matches = [];

    foreach ($knn_data as $data) {
        $symptoms = array_merge([strtolower($data[0])], array_map('strtolower', $data[1]));
        $response = $data[2];
        $match_found = false;

        foreach ($symptoms as $symptom) {
            if (stripos($user_input, $symptom) !== false) {
                $match_found = true;
                break;
            }
        }

        if ($match_found) {
            $matches[] = $response;
        }
    }

    if (empty($matches)) {
        echo json_encode(["response" => "Sorry, I couldn't identify your health issue. Please provide more details or consult a doctor."]);
    } else {
        $reply = "Based on your symptoms, here are some suggestions:\n";
        foreach ($matches as $response) {
            $reply .= "\n$response\n";
        }
        echo json_encode(["response" => $reply]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(9, 10, 10);
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-top: 20px;
        }
        #chat-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        #chat-box {
            height: 400px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            padding: 10px;
        }
        .message {
            margin-bottom: 10px;
            max-width: 80%;
        }
        .message.user {
            align-self: flex-end;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 10px 0 10px 10px;
        }
        .message.bot {
            align-self: flex-start;
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 0 10px 10px 10px;
        }
        #input-container {
            display: flex;
            margin-top: 10px;
        }
        #input-container input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #input-container button {
            padding: 10px 15px;
            margin-left: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Health Chatbot</h1>
    <div id="chat-container">
        <div id="chat-box"></div>
        <div id="input-container">
            <input type="text" id="user-message" placeholder="Describe your symptoms..." />
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
    <script>
        function sendMessage() {
            const messageInput = document.getElementById('user-message');
            const userMessage = messageInput.value.trim();
            if (!userMessage) return;

            appendMessage('user', userMessage);
            messageInput.value = '';

            fetch('', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `message=${encodeURIComponent(userMessage)}`
            })
            .then(response => response.json())
            .then(data => {
                appendMessage('bot', data.response);
            })
            .catch(error => {
                console.error('Error:', error);
                appendMessage('bot', 'Sorry, something went wrong. Try again later.');
            });
        }

        function appendMessage(sender, text) {
            const chatBox = document.getElementById('chat-box');
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', sender);
            messageDiv.textContent = text;
            chatBox.appendChild(messageDiv);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>
</html>

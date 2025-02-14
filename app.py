from flask import Flask, request, jsonify
from model import train_model, predict_health_chart

app = Flask(__name__)

# Route to train the model
@app.route('/train', methods=['POST'])
def train():
    train_model()
    return jsonify({"message": "Model trained successfully!"})

# Route to generate health chart
@app.route('/generate_chart', methods=['POST'])
def generate_chart():
    try:
        # Get user data from request
        user_data = request.json
        age = int(user_data.get('age'))
        weight = int(user_data.get('weight'))
        exercise = int(user_data.get('exercise'))
        diet = int(user_data.get('diet'))

        # Predict weekly and monthly health charts
        result = predict_health_chart(age, weight, exercise, diet)
        return jsonify(result)
    except Exception as e:
        return jsonify({"error": str(e)}), 400

if __name__ == '__main__':
    app.run(debug=True)

import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.tree import DecisionTreeClassifier
import pickle

# Global model variable
model_file = 'health_model.pkl'

def train_model():
    # Load the dataset
    data = pd.read_csv('data.csv')

    # Split features and labels
    X = data[['Age', 'Weight', 'Exercise', 'Diet']]
    y = data['Health_Score']

    # Split data into training and testing sets
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

    # Train the model (Decision Tree)
    model = DecisionTreeClassifier()
    model.fit(X_train, y_train)

    # Save the trained model
    with open(model_file, 'wb') as file:
        pickle.dump(model, file)
    print("Model trained and saved!")

def predict_health_chart(age, weight, exercise, diet):
    # Load the trained model
    with open(model_file, 'rb') as file:
        model = pickle.load(file)

    # Make a prediction
    user_input = np.array([[age, weight, exercise, diet]])
    prediction = model.predict(user_input)[0]

    # Generate weekly and monthly health charts
    weekly_chart = {"Calories Burned": exercise * 500, "Health Score": prediction}
    monthly_chart = {"Calories Burned": exercise * 500 * 4, "Health Score": prediction}

    return {"weekly": weekly_chart, "monthly": monthly_chart}

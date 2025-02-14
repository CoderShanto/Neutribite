import cv2
import numpy as np
import tensorflow as tf
from tensorflow.keras.models import load_model
from sklearn.preprocessing import Normalizer
import os

# Load a pre-trained face detection model (Haar cascade or similar)
face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + "haarcascade_frontalface_default.xml")

# Load pre-trained deep learning face recognition model (e.g., FaceNet, or your custom model)
model = load_model('face_recognition_model.h5')  # Ensure the model is in the current directory

# Function to extract faces from an image
def extract_faces(image):
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.1, minNeighbors=5, minSize=(30, 30))
    face_images = []
    for (x, y, w, h) in faces:
        face = image[y:y + h, x:x + w]
        face = cv2.resize(face, (160, 160))  # Resize for the model input
        face_images.append(face)
    return face_images

# Preprocess image for the model
def preprocess_image(image):
    image = image.astype('float32')
    image = image / 255.0  # Normalize pixel values
    return np.expand_dims(image, axis=0)

# Function to encode a face image
def get_embedding(model, face):
    face = preprocess_image(face)
    embedding = model.predict(face)
    return embedding

# Compare embeddings
def is_match(embedding1, embedding2, threshold=0.5):
    distance = np.linalg.norm(embedding1 - embedding2)
    return distance < threshold

# Load known faces and their embeddings
def load_database(database_path):
    database = {}
    normalizer = Normalizer(norm='l2')
    for file in os.listdir(database_path):
        if file.endswith('.jpg') or file.endswith('.png'):
            image_path = os.path.join(database_path, file)
            image = cv2.imread(image_path)
            face_images = extract_faces(image)
            if face_images:
                embedding = get_embedding(model, face_images[0])
                embedding = normalizer.transform(embedding)
                database[file.split('.')[0]] = embedding
    return database

# Main function for face recognition
def recognize_face(user_image_path, database):
    user_image = cv2.imread(user_image_path)
    faces = extract_faces(user_image)
    if not faces:
        return "No face detected in the image."

    normalizer = Normalizer(norm='l2')
    user_embedding = get_embedding(model, faces[0])
    user_embedding = normalizer.transform(user_embedding)

    for name, db_embedding in database.items():
        if is_match(user_embedding, db_embedding):
            return f"Valid: Match found with {name}."

    return "Invalid: No match found."

# Example usage
def main():
    # Load the face database (Ensure you have a folder named 'database' with images of known faces)
    database_path = 'database'  # Folder containing known face images
    database = load_database(database_path)

    # Provide a user image to check
    user_image_path = 'user_image.jpg'  # Replace with the path to the user's photo
    result = recognize_face(user_image_path, database)
    print(result)

if __name__ == "__main__":
    main()

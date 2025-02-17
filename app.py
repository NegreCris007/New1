from flask import Flask, request, jsonify
from transformers import pipeline

app = Flask(__name__)

# Carga el pipeline de generación de texto usando GPT-2.
generator = pipeline('text-generation', model='gpt2')

@app.route('/generate', methods=['POST'])
def generate_story():
    data = request.get_json()
    
    # Validar que se envíe el campo "words" y que sea una lista.
    if not data or 'words' not in data:
        return jsonify({'error': 'Por favor, envía una lista de palabras en el campo "words".'}), 400
    words = data['words']
    if not isinstance(words, list):
        return jsonify({'error': 'El campo "words" debe ser una lista de palabras.'}), 400
    
    # Crear un prompt que incluya las palabras proporcionadas.
    prompt = f"Escribe un cuento creativo y original que incluya las siguientes palabras: {', '.join(words)}. "
    
    try:
        # Genera el texto utilizando el modelo local.
        generated = generator(prompt, max_length=200, num_return_sequences=1)
        story = generated[0]['generated_text']
        return jsonify({'story': story})
    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True, port=5000)

from flask import Flask, request, jsonify
import pandas as pd
import joblib
from flask_cors import CORS



app = Flask(__name__)
CORS(app)

# Load the DT model 
model = joblib.load('decision_tree_model.joblib')

@app.route('/predict', methods=['POST'])
def predict():
     test_cases = pd.read_csv('data.csv')
     #test_cases = pd.read_csv('test_data_4_students.csv', delimiter='\t', encoding='ISO-8859-1')
     
     bag_of_words_bot = r'bot|b0t|cannabis|tweet me|mishear|follow me|updates every|gorilla|yes_ofc|forget' \
                    r'expos|kill|clit|bbb|butt|fuck|XXX|sex|truthe|fake|anony|free|virus|funky|RNA|kuck|jargon' \
                    r'nerd|swag|jack|bang|bonsai|chick|prison|paper|pokem|xx|freak|ffd|dunia|clone|genie|bbb' \
                    r'ffd|onlyman|emoji|joke|troll|droop|free|every|wow|cheese|yeah|bio|magic|wizard|face'
     test_cases['screen_name_binary'] = test_cases.screen_name.str.contains(bag_of_words_bot, case=False, na=False)
     test_cases['name_binary'] = test_cases.name.str.contains(bag_of_words_bot, case=False, na=False)
     test_cases['description_binary'] = test_cases.description.str.contains(bag_of_words_bot, case=False, na=False)
     test_cases['status_binary'] = test_cases.status.str.contains(bag_of_words_bot, case=False, na=False)
     test_cases['listed_count_binary'] = (test_cases.listed_count>20000)==False

     # Convert numeric features from strings to numbers
     test_cases['followers_count'] = pd.to_numeric(test_cases['followers_count'])
     test_cases['friends_count'] = pd.to_numeric(test_cases['friends_count'])
     test_cases['statuses_count'] = pd.to_numeric(test_cases['statuses_count'])

     features = ['screen_name_binary', 'name_binary', 'description_binary', 'status_binary', 'verified', 
            'followers_count', 'friends_count', 'statuses_count', 'listed_count_binary', 'bot']
     
     test_data = test_cases[features].iloc[:,:-1]

     # Fill NaN values in numeric columns with 0 or a suitable placeholder
     test_data['followers_count'] = pd.to_numeric(test_data['followers_count'], errors='coerce').fillna(0)
     test_data['friends_count'] = pd.to_numeric(test_data['friends_count'], errors='coerce').fillna(0)
     test_data['statuses_count'] = pd.to_numeric(test_data['statuses_count'], errors='coerce').fillna(0)

     # For binary columns, consider what makes sense - here I'm filling with the most conservative option (False)
     test_data['screen_name_binary'] = test_data['screen_name_binary'].fillna(False)
     test_data['name_binary'] = test_data['name_binary'].fillna(False)
     test_data['description_binary'] = test_data['description_binary'].fillna(False)
     test_data['status_binary'] = test_data['status_binary'].fillna(False)
     test_data['listed_count_binary'] = test_data['listed_count_binary'].fillna(False)

    # Verified might need special handling - if 'verified' is a boolean, we can assume False for missing values
     test_data['verified'] = test_data['verified'].fillna(False)
     
     predictions = model.predict(test_data)
     print(predictions)
    
     # Convert numpy array to list for JSON serialization
     result_list = predictions.tolist()
    
     return jsonify(result_list)
     
 
if __name__ == '__main__':
    app.run(debug=True, port=5000)  # Adjust the port if needed
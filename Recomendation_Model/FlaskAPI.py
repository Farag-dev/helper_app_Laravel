from flask import *


app = Flask(__name__)



def recommend_items(picked_userid):
  

    return ranked_item_score.head(m).to_dict()


@app.route('/recommend', methods=['GET'])
def recommend():
    user_id = request.args.get('user_id', type=int)

    if user_id is None:
        return jsonify({'error': 'user_id is required'}), 400

    recommended_items = recommend_items(user_id)
    return jsonify(recommended_items)



app.run(debug=True)